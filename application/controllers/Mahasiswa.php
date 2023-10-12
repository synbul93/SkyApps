<?php

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        $this->load->library('form_validation');
        $this->load->helper('Cetak_helper');
        $this->load->helper('pdf');
        $this->load->library('pagination'); {
            user_level();
        }
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Student Data';

        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['mahasiswa'] = $this->Mahasiswa_model->getAllMahasiswa();
        // config
        $config['base_url'] = 'http://localhost/skyapps/mahasiswa/index';
        $config['total_rows'] = $this->Mahasiswa_model->countAllMahasiswa();
        $config['per_page'] = 10;
        $config['num_links'] = 5;
        //styling 
        $config['full_tag_open'] = '<nav"><ul class="pagination justify-content-center"> ';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['fisrt_tag_open'] = ' <li class="page-item">';
        $config['fisrt_tag_close'] = '</li> ';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = ' <li class="page-item">';
        $config['last_tag_close'] = '</li> ';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = ' <li class="page-item">';
        $config['next_tag_close'] = '</li> ';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = ' <li class="page-item">';
        $config['prev_tag_close'] = '</li> ';

        $config['cur_tag_open'] = ' <li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = ' <li class="page-item">';
        $config['num_tag_close'] = '</li> ';

        $config['attributes'] = array('class' => 'page-link');
        //initialize
        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);
        $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswa($config['per_page'], $data['start']);

        if ($this->input->post('keyword')) {
            $data['mahasiswa'] = $this->Mahasiswa_model->cariDataMahasiswa();
        }

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('mahasiswa/index');
        $this->load->view('template/footer', $data);
    }

    public function tambah()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Add student data';

        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['jurusan'] = $this->Mahasiswa_model->getAllJurusan();
        $data['program'] = $this->Mahasiswa_model->getAllProgram();

        $this->form_validation->set_rules('nama', 'Name', 'required');
        $this->form_validation->set_rules('alamat', 'Address', 'required');
        $this->form_validation->set_rules('nrp', 'NRP', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);;
            $this->load->view('mahasiswa/tambah');
            $this->load->view('template/footer');
        } else {
            $this->Mahasiswa_model->tambahDataMahasiswa();
            $this->session->set_flashdata('message', ' <div class="alert alert-success" role="alert">Congratulations, the data has been added!</div>');
            redirect('mahasiswa');
        }
    }

    public function tambahDataJurusan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Add Faculty Data';
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('jurusan', 'Departement', 'required');
        $this->form_validation->set_rules('program', 'Studi Program', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);;
            $this->load->view('mahasiswa/tambah_jurusan');
            $this->load->view('template/footer');
        } else {
            $this->Mahasiswa_model->tambahDataJurusan();
            $this->session->set_flashdata('message', ' <div class="alert alert-success" role="alert">Congratulations, the data has been added!</div>');
            redirect('mahasiswa/jurusan');
        }
    }

    public function jurusan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Faculty Data';

        $data['jurusan'] = $this->Mahasiswa_model->getAllJurusan();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('mahasiswa/jurusan');
        $this->load->view('template/footer', $data);
    }

    public function hapus($id)
    {
        $this->Mahasiswa_model->hapusDataMahasiswa($id);
        $this->session->set_flashdata('message', ' <div class="alert alert-danger" role="alert">Data has been deleted!</div>');
        redirect('mahasiswa');
    }

    public function detail($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Student details';

        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('mahasiswa/detail', $data);
        $this->load->view('template/footer');
    }

    public function ubah($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Change student data';

        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);
        $data['jurusan'] = $this->Mahasiswa_model->getAllJurusan();

        $this->form_validation->set_rules('nama', 'Name', 'required');
        $this->form_validation->set_rules('nrp', 'NRP', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('mahasiswa/ubah', $data);
            $this->load->view('template/footer');
        } else {
            $this->Mahasiswa_model->ubahDataMahasiswa($id);
            $this->session->set_flashdata('message', ' <div class="alert alert-success" role="alert">Congratulations, the data has been changed!</div>');
            redirect('mahasiswa');
        }
    }

    public function cetak_kartu($id)
    {
        $data['title'] = 'Kartu Mahasiswa';
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);
        $data['jurusan'] = $this->Mahasiswa_model->getAllJurusan();
        $data['qrCode'] = generate_qr_code($data['mahasiswa']['id']);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('mahasiswa/kartu_pdf', $data);
        $this->load->view('template/footer');
    }

    public function download_kartu($id)
    {
        $mahasiswa = $this->Mahasiswa_model->getMahasiswaById($id);

        download_kartu_pdf($mahasiswa);
    }
}
