<?php

class User_mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        user_level();
        $this->load->model('Repo_mhs_model');
        $this->load->model('Fakultas_model');
        $this->load->model('Mahasiswa_model');
        $this->load->model('User_model');
        $this->load->model('Tugas_model');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->load->library('upload');
        $this->load->helper('pdf_helper');
        $this->load->helper('excel_helper');
    }

    public function index()
    {
        $data['title'] = 'Repository Data';
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $email = $this->session->userdata('email');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // Ambil id user dari data user
        $user_id = $user['id'];

        // Data yang akan dikirimkan ke view
        $data['user'] = $user;

        // Panggil method di model dengan user_id sebagai parameter
        $data['repository'] = $this->Repo_mhs_model->getAllRepositoryByUserId($user_id);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('repo_mhs/index', $data); // Ganti 'repo_mhs/index' dengan view yang sesuai
        $this->load->view('template/footer');
    }


    public function tambah()
    {
        // Ambil data user berdasarkan email dari session
        $email = $this->session->userdata('email');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // Ambil id user dari data user
        $user_id = $user['id'];

        // Data yang akan dikirimkan ke view
        $data['user'] = $user;
        $data['title'] = 'Repository Data';
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['repository'] = $this->Repo_mhs_model->getAllRepository();
        $data['fakultas'] = $this->Fakultas_model->getAllFakultas();
        $data['program'] = $this->Repo_mhs_model->getAllProgram();
        $data['jurusan'] = $this->Repo_mhs_model->getAllJurusan();


        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('nrp', 'NRP', 'required|numeric|min_length[10]');
        $this->form_validation->set_rules('dosen', 'Dosen', 'required');
        $this->form_validation->set_rules('koleksi', 'Koleksi', 'required');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
        $this->form_validation->set_rules('akses', 'Akses', 'required');
        $this->form_validation->set_rules('tgl_input', 'Tanggal Input', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('repo_mhs/tambah', $data);
            $this->load->view('template/footer');
        } else {
            $config['upload_path'] = './assets/file/upload';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 10240; // in kilobytes
            $config['encrypt_name'] = false;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('file')) {
                // Upload success
                $file_data = $this->upload->data();
                $file_path = $file_data['file_name'];
                $data_insert['file'] = $file_path;

                // Panggil model dan tambahkan data ke database
                $user_id['user_id'] = $user_id; // Tambahkan user_id ke data
                $this->Repo_mhs_model->tambah($user_id);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat, data berhasil ditambahkan!</div>');
                redirect('user_mahasiswa');
            } else {
                // Upload failed
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
                redirect('user_mahasiswa');
            }
        }
    }

    public function detail($id)
    {
        // Ambil data user berdasarkan email dari session
        $email = $this->session->userdata('email');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // Data yang akan dikirimkan ke view
        $data['user'] = $user;
        $data['title'] = 'Repository Data';

        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['repository'] = $this->Repo_mhs_model->getRepositoryById($id);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('repo_mhs/detail', $data);
        $this->load->view('template/footer');
    }

    public function edit($id)
    {
        $email = $this->session->userdata('email');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        $data['user'] = $user;
        $data['title'] = 'Edit Data';

        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['repository'] = $this->Repo_mhs_model->getAllRepository();
        $data['repository'] = $this->Repo_mhs_model->getRepositoryById($id);
        $data['fakultas'] = $this->Fakultas_model->getAllFakultas();
        $data['program'] = $this->Repo_mhs_model->getAllProgram();
        $data['jurusan'] = $this->Repo_mhs_model->getAllJurusan();

        $this->form_validation->set_rules('nama', 'Name', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('nrp', 'NRP', 'required|numeric|min_length[10]');
        $this->form_validation->set_rules('dosen', 'Dosen', 'required');
        $this->form_validation->set_rules('koleksi', 'Koleksi', 'required');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
        $this->form_validation->set_rules('tgl_input', 'Tanggal Input', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('repository/ubah', $data);
            $this->load->view('template/footer');
        } else {
            // Cek apakah pengguna memilih file PDF baru atau tidak
            if (!empty($_FILES['file']['name'])) {
                $config['upload_path'] = './assets/file/upload';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = 10240; // in kilobytes
                $config['encrypt_name'] = true;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('file')) {
                    // Upload success
                    $file_data = $this->upload->data();
                    $file_path = $file_data['file_name'];
                    $data['file'] = $file_path;
                } else {
                    // Upload failed
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
                    redirect('user_mahasiswa/edit' . $id);
                }
            }

            $this->Repo_mhs_model->edit($id);

            $this->session->set_flashdata('message', ' <div class="alert alert-success" role="alert">Congratulations, the data has been changed!</div>');
            redirect('user_mahasiswa');
        }
    }

    public function upload_tugas()
    {
        // Ambil data user berdasarkan email dari session
        $email = $this->session->userdata('email');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // Ambil id user dari data user
        $user_id = $user['id'];

        // Data yang akan dikirimkan ke view
        $data['user'] = $user;
        $data['title'] = 'Upload Tugas';
        $data['dosen'] = $this->User_model->getAllDosen();
        $data['jurusan'] = $this->Mahasiswa_model->getAllJurusan();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('judul', 'Judul Tugas', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Tugas', 'required');
        $this->form_validation->set_rules('dosen_tujuan', 'Dosen Tujuan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('repo_mhs/tugas', $data);
            $this->load->view('template/footer');
        } else {
            if (!empty($_FILES['file']['name'])) {
                $config['upload_path'] = './assets/file/tugas';
                $config['allowed_types'] = 'pdf|doc|docx';
                $config['max_size'] = 10240; // in kilobytes
                $config['encrypt_name'] = false; // Set to true for added security

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('file')) {
                    // Upload success
                    $file_data = $this->upload->data();
                    $file_path = $file_data['file_name'];
                    $data_insert['file'] = $file_path;

                    $data_user['user_id'] = $user_id;
                    $this->Tugas_model->upload_tugas($user_id); // Panggil fungsi dari model
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat, data berhasil ditambahkan!</div>');
                    redirect('user_mahasiswa/daftar_tugas');
                } else {
                    // Upload failed
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
                    redirect('user_mahasiswa/upload_tugas');
                }
            } else {
                // Jika file tidak dipilih
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pilih file untuk diunggah.</div>');
                redirect('user_mahasiswa/upload_tugas');
            }
        }
    }

    public function hapus($id)
    {
        $this->Repo_mhs_model->hapusDataRepository($id);
        $this->session->set_flashdata('message', ' <div class="alert alert-danger" role="alert">Data has been deleted!</div>');
        redirect('user_mahasiswa');
    }

    public function daftar_tugas()
    {
        // Ambil data user berdasarkan email dari session
        $data['title'] = 'Daftar Tugas';
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $email = $this->session->userdata('email');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // Ambil id user dari data user
        $user_id = $user['id'];

        $data['user'] = $user;
        // Ambil daftar tugas terkirim dari database berdasarkan user_id
        $data['daftar_tugas'] = $this->Tugas_model->getTugasTerkirimByUser($user_id);

        // Load view untuk menampilkan daftar tugas terkirim
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('repo_mhs/data_tugas', $data);
        $this->load->view('template/footer');
    }

    public function hapus_tugas($id)
    {
        $this->Tugas_model->hapusDataTugas($id);
        $this->session->set_flashdata('message', ' <div class="alert alert-danger" role="alert">Data has been deleted!</div>');
        redirect('user_mahasiswa/daftar_tugas');
    }

    public function edit_tugas($id)
    {
        // Ambil data user berdasarkan email dari session
        $email = $this->session->userdata('email');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // Ambil id user dari data user
        $user_id = $user['id'];

        // Data yang akan dikirimkan ke view
        $data['user'] = $user;
        $data['title'] = 'Edit Tugas';
        $data['dosen'] = $this->User_model->getAllDosen();
        $data['jurusan'] = $this->Mahasiswa_model->getAllJurusan();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['tugas'] = $this->Tugas_model->getEditTugasById($id);

        $this->form_validation->set_rules('judul', 'Judul Tugas', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Tugas', 'required');
        $this->form_validation->set_rules('dosen_tujuan', 'Dosen Tujuan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('repo_mhs/edit_tugas', $data);
            $this->load->view('template/footer');
        } else {
            if (!empty($_FILES['file']['name'])) {
                $config['upload_path'] = './assets/file/tugas';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = 10240;
                $config['encrypt_name'] = true;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('file')) {
                    // Upload success
                    $file_data = $this->upload->data();
                    $file_path = $file_data['file_name'];
                    $data['file'] = $file_path;
                } else {
                    // Upload failed
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
                    redirect('user_mahasiswa/edit_tugas' . $id);
                }
            }
            $this->Tugas_model->edit_tugas($id, $data);

            $this->session->set_flashdata('message', ' <div class="alert alert-success" role="alert">Congratulations, the data has been changed!</div>');
            redirect('user_mahasiswa/daftar_tugas');
        }
    }

    public function daftar_tugas_dosen()
    {
        // Ambil data user berdasarkan email dari session
        $data['title'] = 'Daftar Tugas';
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $email = $this->session->userdata('email');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // Ambil id user dari data user
        $user_id = $user['id'];

        $data['user'] = $user;

        $data['daftar_tugas'] = $this->Tugas_model->getTugasDosen();

        // Load view untuk menampilkan daftar tugas terkirim
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('repo_mhs/daftar_tugas', $data);
        $this->load->view('template/footer');
    }

    public function detail_tugas_dosen($tugas_id)
    {
        // Ambil data user berdasarkan email dari session
        $data['title'] = 'Daftar Tugas';
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $email = $this->session->userdata('email');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // Ambil id user dari data user
        $user_id = $user['id'];

        $data['user'] = $user;

        // Ambil data tugas berdasarkan tugas_id
        $data['tugas'] = $this->Tugas_model->getTugasDosenById($tugas_id);

        // Load view untuk menampilkan detail tugas
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('repo_mhs/detail_tugas', $data);
        $this->load->view('template/footer');
    }
}
