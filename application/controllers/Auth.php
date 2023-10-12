<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        $this->load->library('phpmailer_lib');
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Login ';
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('template/auth_footer');
        } else {
            $this->_login();
            redirect('auth');
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // Retrieve the user from the database based on the provided email
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            // Check if the user is active
            if ($user['is_active'] == 1) {
                // Verify the provided password against the hashed password in the database
                if (password_verify($password, $user['password'])) {
                    // Set user data in session
                    $data = [
                        'user_id' => $user['user_id'],
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                        // Redirect to the admin dashboard
                    } else if ($user['role_id'] == 2) {
                        redirect('user');
                        // Redirect to the user dashboard
                    } else if ($user['role_id'] == 3) {
                        redirect('user_mahasiswa');
                        // Redirect to the mahasiswa dashboard or home page
                    }
                } else {
                    // Password does not match
                    $this->session->set_flashdata('message', ' <div class="alert alert-danger" role="alert">Wrong password!</div>');
                }
            } else {
                // User is not active
                $this->session->set_flashdata('message', ' <div class="alert alert-danger" role="alert">This email has not been activated</div>');
            }
        } else {
            // User does not exist
            $this->session->set_flashdata('message', ' <div class="alert alert-danger" role="alert">This email has not been registered</div>');
        }
    }


    public function registration()
    {
        $data['title'] = 'Registration';
        $data['jurusan'] = $this->Mahasiswa_model->getAllJurusan();
        $data['role'] = $this->User_model->getAllRole();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('nomor_induk', 'Registration number', 'required|numeric');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|is_unique[user.email]',
            ['is_unique' => 'This email has already been registered!']
        );
        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[5]|matches[password2]',
            ['matches' => 'Password dont match!', 'min_length' => 'Password too short!'],
        );
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('template/auth_footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'nomor_induk' => htmlspecialchars($this->input->post('nomor_induk', true)),
                'jurusan' => htmlspecialchars($this->input->post('jurusan', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role_id', true),
                'is_active' => 0,
                'date_created' => time()
            ];

            // Cek apakah peran pengguna dapat diapprove oleh admin
            $role = $this->getRoleById($data['role_id']);
            if ($role['can_approve'] == 1) {
                // Jika peran dapat diapprove, set is_approved = 1 (approved)
                $data['is_approved'] = 1;
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'user_id' => $user_id,
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];
                $this->db->insert('user_token', $user_token);
                $this->db->insert('user', $data);
                $user_id = $this->db->insert_id();

                $this->db->set('is_approved', 1);
                $this->db->where('email', $email);
                $this->db->update('user');

                $this->_sendEmail($token, 'verify');
            } else {
                // Jika peran tidak dapat diapprove, set is_approved = 0 (pending)
                $data['is_approved'] = 0;
                $this->db->insert('user', $data);
                $user_id = $this->db->insert_id();

                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'user_id' => $user_id,
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];
                $this->db->insert('user_token', $user_token);

                $this->_sendEmail($token, 'no-verify');
            }

            $this->session->set_flashdata('message', ' <div class="alert alert-success" role="alert">Congratulations, the account has been successfully created. Please wait for admin approval!</div>');
            redirect('auth');
        }
    }

    private function getRoleById($role_id)
    {
        $this->db->select('role');
        $this->db->from('role');
        $this->db->where('id', $role_id);
        $query = $this->db->get();
        return $query->row_array();
    }


    private function _sendEmail($token, $type)
    {
        $to = $this->input->post('email');
        $subject = '';
        $message = '';

        if ($type == 'verify') {
            $subject = 'Account Verification';
            $message = 'Click this link to verify your account: <a href="' . base_url() . 'auth/verify?email=' . urlencode($to) . '&token=' . urlencode($token) . '">Activate</a>';
        } elseif ($type == 'forgot') {
            $subject = 'Reset Password';
            $message = 'Click this link to reset your password: <a href="' . base_url() . 'auth/resetpassword?email=' . $to . '&token=' . urlencode($token) . '">Reset Password</a>';
        } elseif ($type == 'no-verify') {
            $subject = 'Account Information';
            $message = 'Your account is being checked by the admin, please wait for the next email message.';
        }

        if ($this->phpmailer_lib->sendEmail($to, $subject, $message)) {
            return true;
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email sending failed!</div>');
            redirect('auth');
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' has been activated! Please Login.</div>');

                    redirect('auth');
                } else {
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', ' <div class="alert alert-danger" role="alert">Account activation failed! Token expired.</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', ' <div class="alert alert-danger" role="alert">Account activation failed! Invalid Token.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', ' <div class="alert alert-danger" role="alert">Account activation failed! Wrong Email.</div>');
            redirect('auth');
        }
    }

    public function forgotPassword()
    {
        $data['title'] = 'Forgot Password';
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/forgot-password');
            $this->load->view('template/auth_footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();
            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', ' <div class="alert alert-success" role="alert">Please check your email to reset your password!</div>');
                redirect('auth/forgotpassword');
            } else {
                $this->session->set_flashdata('message', ' <div class="alert alert-danger" role="alert">Email is not registered or activated!</div>');
                redirect('auth/forgotpassword');
            }
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', ' <div class="alert alert-danger" role="alert">Reset password failed! Invalid token.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', ' <div class="alert alert-danger" role="alert">Reset password failed! Wrong email.</div>');
            redirect('auth');
        }
    }

    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[5]|matches[password2]',
            ['matches' => 'Password dont match!', 'min_length' => 'Password too short!'],
        );
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password';
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/change-password');
            $this->load->view('template/auth_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email, $email');
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('message', ' <div class="alert alert-success" role="alert">Password has been changed! Please login</div>');
            redirect('auth');
        }
    }

    public function blocked()
    {
        $data['title'] = 'Blocked';
        $this->load->view('auth/blocked');
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', ' <div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('auth');
    }
}
