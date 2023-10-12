<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        user_level();
        $this->load->model('Mahasiswa_model');
        $this->load->model('Artikel_model');
        $this->load->model('Repository_model');
        $this->load->library('phpmailer_lib');
        $this->load->model('User_model');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Dashboard';
        $mahasiswa_data = $this->Mahasiswa_model->get_mahasiswa_data();
        $repository_data = $this->Repository_model->get_repository_bar_data();
        $total_data = $this->Repository_model->get_total_data();
        $jurusan_data = $this->Mahasiswa_model->get_jurusan_data();
        $repository_labels = array();
        $repository_values = array();

        foreach ($repository_data as $row) {
            $repository_labels[] = $row->fakultas;
            $repository_values[] = $row->total;
        }


        $data['total_data'] = $total_data;
        $data['repository_labels'] = json_encode($repository_labels);
        $data['repository_values'] = json_encode($repository_values);
        $data['jurusan_data'] = $jurusan_data;

        $data['mahasiswa_data'] = $mahasiswa_data;
        $data['total_data'] = $total_data;
        $data['jurusan_data'] = $jurusan_data;

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template/footer');
    }

    public function users()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'User List';
        $data['users'] = $this->User_model->getAllUser();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/user', $data);
        $this->load->view('template/footer');
    }

    public function approve($user_id)
    {
        if (!$this->session->userdata('email')) {
            redirect('auth');
        } else {
            $user = $this->User_model->getUserById($user_id);
            if ($user) {
                $this->User_model->approveUser($user_id);

                $token = $this->User_model->getUserTokenByEmail($user['email']);

                if ($token) {
                    $this->_sendApproveEmail($user['email'], $token['token']);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User approved successfully!</div>');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed to send approval email. Token not found!</div>');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User not found!</div>');
            }
            redirect('admin/users');
        }
    }

    private function _sendApproveEmail($email, $token)
    {
        $this->load->model('User_model');
        $tokenData = $this->User_model->getUserTokenByEmail($email, $token);

        if ($tokenData) {
            $to = $email;
            $subject = 'Account Approval';
            $message = 'Your account has been approved by the admin. <br> Click this link to activate your account: <a href="' . base_url() . 'auth/verify?email=' . urlencode($to) . '&token=' . urlencode($token) . '">Activate</a>';

            $this->load->library('phpmailer_lib');
            $this->phpmailer_lib->sendEmail($email, $subject, $message, $token);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User token not found.</div>');
        }
        redirect('admin/users');
    }

    private function _sendRejectEmail($email)
    {
        $subject = 'Account Rejection Notification';
        $message = 'Sorry, we cannot approve your account registration, because your info number is not registered at our university..';

        $this->load->library('phpmailer_lib');
        $this->phpmailer_lib->sendEmail($email, $subject, $message);
    }

    public function reject($user_id)
    {
        $user = $this->User_model->getUserById($user_id);

        if ($user) {
            $this->User_model->rejectUser($user_id);
            $this->_sendRejectEmail($user['email']); // Mengirim email notifikasi penolakan
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User has been rejected.</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User not found.</div>');
        }
        redirect('admin/users');
    }

    public function role()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Role';
        $data['role'] = $this->db->get('role')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('template/footer');
    }
    public function roleAccess($role_id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Role';
        $data['role'] = $this->db->get_where('role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/role_access', $data);
        $this->load->view('template/footer');
    }

    public function deleteUser($id)
    {
        $this->User_model->hapusDataUser($id);
        $this->session->set_flashdata('message', ' <div class="alert alert-danger" role="alert">Data has been deleted!</div>');
        redirect('admin/users');
    }

    public function hapus($id)
    {
        $this->User_model->hapusDataRole($id);
        $this->session->set_flashdata('message', ' <div class="alert alert-danger" role="alert">Data has been deleted!</div>');
        redirect('admin/role');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access changed!</div>');
        redirect('admin/roleAccess/' . $role_id);
    }

    public function artikel()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Artikel ';
        $data['artikel'] = $this->Artikel_model->getAllArtikel();

        if ($this->input->post('keyword')) {
            $data['artikel'] = $this->Artikel_model->cariDataArtikel();
        }

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/artikel', $data);
        $this->load->view('template/footer');
    }
    public function tambahArtikel()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Tambah Artikel';
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('ringkasan_berita', 'Ringkasan Berita', 'required');
        $this->form_validation->set_rules('isi_berita', 'Isi Berita', 'required');



        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/add_artikel', $data);
            $this->load->view('template/footer');
        } else {
            // Check if an image is uploaded
            if (!empty($_FILES['image']['name'])) {
                $config['upload_path'] = './assets/img/artikel';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 5024; // in kilobytes
                $config['encrypt_name'] = true;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('image')) {
                    // Upload success
                    $image_data = $this->upload->data();
                    $image_path = $image_data['file_name'];
                    $this->db->set('image', $image_path);
                } else {
                    // Upload failed
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
                    redirect('admin/tambahArtikel');
                }
            }

            // Simpan artikel ke model
            $this->Artikel_model->tambahDataArtikel();


            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Artikel berhasil ditambahkan!</div>');
            redirect('admin/artikel');
        }
    }

    public function editArtikel($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Edit Artikel';
        $data['artikel'] = $this->Artikel_model->getArtikelById($id);

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('ringkasan_berita', 'Ringkasan Berita', 'required');
        $this->form_validation->set_rules('isi_berita', 'Isi Berita', 'required');
        $this->form_validation->set_rules('editor', 'Editor', 'required');
        $this->form_validation->set_rules('oleh', 'Oleh', 'required');
        $this->form_validation->set_rules('reporter', 'Reporter', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/edit_artikel', $data);
            $this->load->view('template/footer');
        } else {
            // Check if an image is uploaded
            if (!empty($_FILES['image']['name'])) {
                $config['upload_path'] = './assets/img/artikel';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 5024; // in kilobytes
                $config['encrypt_name'] = true;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('image')) {
                    // Upload success
                    $image_data = $this->upload->data();
                    $image_path = $image_data['file_name'];
                    $this->db->set('image', $image_path);
                } else {
                    // Upload failed
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
                    redirect('admin/editArtikel');
                }
            }

            // Simpan artikel ke model
            $this->Artikel_model->editDataArtikel($id);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Artikel berhasil diedit!</div>');
            redirect('admin/artikel');
        }
    }

    public function detailArtikel($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Detail Artikel';

        $data['artikel'] = $this->Artikel_model->getArtikelById($id);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/detail_artikel', $data);
        $this->load->view('template/footer');
    }

    public function hapusArtikel($id)
    {
        $this->Artikel_model->hapusDataArtikel($id);
        $this->session->set_flashdata('message', ' <div class="alert alert-danger" role="alert">Data has been deleted!</div>');
        redirect('admin/artikel');
    }
}
