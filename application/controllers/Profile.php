<?php
class Profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profile_model');
        $this->load->library('form_validation'); {
            user_level();
        }
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Profile Universitas';
        $data['profile'] = $this->Profile_model->getAllProfile();


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('profile/index', $data);
        $this->load->view('template/footer');
    }

    public function edit()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Edit Profile';
        $data['profile'] = $this->Profile_model->getAllProfile();

        $this->form_validation->set_rules('univ_name', 'Nama Universitas', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('profile/edit', $data);
            $this->load->view('template/footer');
        } else {
            // Check if an image is uploaded
            if (!empty($_FILES['image']['name'])) {
                $config['upload_path'] = './assets/img/profile';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 5024; // in kilobytes
                $config['encrypt_name'] = true;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('image')) {
                    // Upload success
                    $image_data = $this->upload->data();
                    $image_path = $image_data['file_name'];
                    $data['image'] = $image_path;
                } else {
                    // Upload failed
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
                    redirect('profile');
                }
            }

            // Check if fav icon is uploaded
            if (!empty($_FILES['favicon']['name'])) {
                $config['upload_path'] = './assets/img/favicon';
                $config['allowed_types'] = 'ico|jpg|png';
                $config['max_size'] = 2024; // in kilobytes
                $config['encrypt_name'] = true;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('favicon')) {
                    // Upload success
                    $favicon_data = $this->upload->data();
                    $favicon_path = $favicon_data['file_name'];
                    $data['favicon'] = $favicon_path;
                } else {
                    // Upload failed
                    $error = $this->upload->display_errors();
                    // Tambahkan ini untuk mencetak pesan kesalahan ke log
                    error_log($error);
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
                    redirect('profile');
                }
            }

            // Simpan data ke model
            $this->Profile_model->editProfile($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil berhasil diedit!</div>');
            redirect('profile');
        }
    }
}
