<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        user_level();
        $this->load->model('Mahasiswa_model');
        $this->load->model('Repository_model');
        $this->load->model('User_model');
        $this->load->model('Tugas_model');
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
        $this->load->view('user/dashboard', $data);
        $this->load->view('template/footer');
    }

    public function blocked()
    {
        $data['title'] = 'Blocked';
        $this->load->view('auth/block_dosen');
    }

    public function daftar_tugas_dosen()
    {
        $data['title'] = 'Daftar Tugas';
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $email = $this->session->userdata('email');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        $role_id_dosen = 2;

        $user_id = $this->session->userdata('user_id');

        $user_id = $user['id'];

        $data['user'] = $user;
        // Cek apakah user yang sedang login adalah dosen
        if ($this->session->userdata('role_id') != $role_id_dosen) {
            redirect('user/blocked');
        }

        // Ambil daftar tugas yang harus diapprove oleh dosen berdasarkan user_id
        $data['daftar_tugas'] = $this->Tugas_model->getTugasByDosen($user_id);

        // Load view untuk menampilkan daftar tugas untuk dosen
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('user/data_tugas', $data);
        $this->load->view('template/footer');
    }

    public function detail_tugas($tugas_id)
    {
        $data['title'] = 'Detail Tugas';
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $email = $this->session->userdata('email');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        $role_id_dosen = 2;

        $user_id = $this->session->userdata('user_id');

        $user_id = $user['id'];

        $data['user'] = $user;

        // Cek apakah role_id yang dikirimkan benar untuk dosen
        if ($this->session->userdata('role_id') != $role_id_dosen) {
            redirect('user/blocked');
        }

        // Ambil data tugas berdasarkan tugas_id
        $data['tugas'] = $this->Tugas_model->getTugasById($tugas_id);

        // Load view untuk menampilkan detail tugas
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('user/detail_tugas', $data);
        $this->load->view('template/footer');
    }


    public function approve($tugas_id, $status)
    {
        $role_id_dosen = 2;

        // Cek apakah role_id yang dikirimkan benar untuk dosen
        if ($this->session->userdata('role_id') != $role_id_dosen) {
            redirect('user/blocked');
        }

        // Konversi status approval menjadi int (approve: 1, reject: 2)
        $status_int = ($status == 'approve') ? 1 : 2;

        if ($status_int == 2) {
            // Jika tugas ditolak, ambil catatan penolakan dari form
            $catatan_penolakan = $this->input->post('catatan_penolakan');
            $data = array(
                'status' => 2,
                'catatan_penolakan' => $catatan_penolakan
            );
        } else {
            // Jika tugas ditolak, ambil catatan penolakan dari form
            $nilai = $this->input->post('nilai');
            $data = array(
                'status' => 1,
                'nilai' => $nilai
            );
        }

        // Update status tugas
        $this->db->where('id', $tugas_id);
        $this->db->update('tugas_mhs', $data);

        // Set flashdata untuk menampilkan pesan approval berhasil atau penolakan berhasil
        if ($status_int == 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tugas berhasil diapprove!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tugas berhasil direject!</div>');
        }

        redirect('user/daftar_tugas_dosen/' . $this->session->userdata('id'));
    }


    public function reject($tugas_id)
    {
        $role_id_dosen = 2;

        // Cek apakah role_id yang dikirimkan benar untuk dosen
        if ($this->session->userdata('role_id') != $role_id_dosen) {
            redirect('halaman_tidak_tersedia');
        }

        // Update status tugas menjadi reject (status: 2)
        $data = array('status' => 2);
        $this->db->where('id', $tugas_id);
        $this->db->update('tugas_mhs', $data);

        // Set flashdata untuk menampilkan pesan tugas berhasil direject
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tugas berhasil direject!</div>');

        redirect('user/daftar_tugas_dosen/' . $this->session->userdata('id'));
    }

    public function upload_tugas_dosen()
    {
        $data['title'] = 'Tambah Tugas';
        $data['jurusan'] = $this->Mahasiswa_model->getAllJurusan();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $email = $this->session->userdata('email');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        $role_id_dosen = 2;

        $user_id = $this->session->userdata('user_id');
        $user_id = $user['id'];

        $data['user'] = $user;

        // Cek apakah role_id yang dikirimkan benar untuk dosen
        if ($this->session->userdata('role_id') != $role_id_dosen) {
            redirect('user/blocked');
        }

        $this->form_validation->set_rules('judul', 'Judul Tugas', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Tugas', 'required');
        $this->form_validation->set_rules('tgl_akhir', 'Tanggal', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('user/tambah_tugas', $data);
            $this->load->view('template/footer');
        } else {
            if (!empty($_FILES['file']['name'])) {
                $config['upload_path'] = './assets/file/tugas_dosen';
                $config['allowed_types'] = 'pdf|doc|docx';
                $config['max_size'] = 10240; // in kilobytes
                $config['encrypt_name'] = false;

                $this->upload->initialize($config);
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    // Upload success
                    $file_data = $this->upload->data();
                    $file_path = $file_data['file_name'];
                    $data_insert['file'] = $file_path;

                    $this->Tugas_model->upload_tugas_dosen($user_id, $data_insert);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat, data berhasil ditambahkan!</div>');
                    redirect('user/daftar_tugas');
                } else {
                    // Upload failed
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
                    redirect('user/upload_tugas_dosen');
                }
            } else {
                // Jika file tidak dipilih
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pilih file untuk diunggah.</div>');
                redirect('user/upload_tugas_dosen');
            }
        }
    }


    public function daftar_tugas()
    {
        $data['title'] = 'Daftar Tugas';
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $email = $this->session->userdata('email');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        $role_id_dosen = 2;

        $user_id = $this->session->userdata('user_id');

        $user_id = $user['id'];

        $data['user'] = $user;
        // Cek apakah user yang sedang login adalah dosen
        if ($this->session->userdata('role_id') != $role_id_dosen) {
            redirect('user/blocked');
        }

        // Ambil daftar tugas yang harus diapprove oleh dosen berdasarkan user_id
        $data['daftar_tugas_dosen'] = $this->Tugas_model->getTugasDosenByDosen($user_id);
        // Load view untuk menampilkan daftar tugas untuk dosen
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar');
        $this->load->view('user/daftar_tugas', $data);
        $this->load->view('template/footer');
    }

    public function detail_tugas_dosen($tugas_id)
    {
        $data['title'] = 'Detail Tugas';
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $email = $this->session->userdata('email');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        $role_id_dosen = 2;

        $user_id = $this->session->userdata('user_id');

        $user_id = $user['id'];

        $data['user'] = $user;

        // Cek apakah role_id yang dikirimkan benar untuk dosen
        if ($this->session->userdata('role_id') != $role_id_dosen) {
            redirect('user/blocked');
        }

        // Ambil data tugas berdasarkan tugas_id
        $data['tugas'] = $this->Tugas_model->getTugasDosenById($tugas_id);

        // Load view untuk menampilkan detail tugas
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('user/detail_tugas_dosen', $data);
        $this->load->view('template/footer');
    }

    public function edit_tugas_dosen($id)
    {
        // Pastikan hanya role_id_dosen yang dapat mengakses halaman ini
        $role_id_dosen = 2;
        if ($this->session->userdata('role_id') != $role_id_dosen) {
            redirect('user/blocked');
        }

        $data['title'] = 'Edit Tugas';
        $data['jurusan'] = $this->Mahasiswa_model->getAllJurusan();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $email = $this->session->userdata('email');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        $user_id = $this->session->userdata('user_id');
        $user_id = $user['id'];

        $data['user'] = $user;
        $data['tugas'] = $this->Tugas_model->getTugasDosenById($id);


        if (!$data['tugas']) {
            // Tugas dengan ID yang diberikan tidak ditemukan
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tugas not found!</div>');
            redirect('user/daftar_tugas');
        }

        $this->form_validation->set_rules('judul', 'Judul Tugas', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Tugas', 'required');
        $this->form_validation->set_rules('tgl_akhir', 'Tanggal', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('user/edit_tugas', $data);
            $this->load->view('template/footer');
        } else {
            if (!empty($_FILES['file']['name'])) {
                $config['upload_path'] = './assets/file/tugas_dosen';
                $config['allowed_types'] = 'pdf|doc|docx';
                $config['max_size'] = 10240; // in kilobytes
                $config['encrypt_name'] = false;
                $this->upload->initialize($config);
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    // Upload success
                    $file_data = $this->upload->data();
                    $file_path = $file_data['file_name'];
                    $data['file'] = $file_path;
                } else {
                    // Upload failed
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
                    redirect('user/edit_tugas_dosen/' . $id);
                }
            }

            // Ubah data tugas dalam database
            $this->Tugas_model->edit_tugas_dosen($id, $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulations, the data has been changed!</div>');
            redirect('user/daftar_tugas');
        }
    }
}
