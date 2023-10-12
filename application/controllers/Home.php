<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        $this->load->model('Profile_model');
        $this->load->model('Fakultas_model');
        $this->load->model('Artikel_model');
        $this->load->model('Repository_model');
        $this->load->library('form_validation');
        $this->load->library('pagination');
    }

    public function index()
    {
        $data['title'] = "Universitas B'Sky";
        $data['jurusan'] = $this->Mahasiswa_model->getAllJurusan();
        $data['profile'] = $this->Profile_model->getAllProfile();
        $data['artikel'] = $this->Artikel_model->getAllArtikel();
        $data['repository'] = $this->Repository_model->getAllRepository();

        $this->load->view('template_home/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('template_home/footer', $data);
    }

    public function art_detail($id)
    {
        $data['title'] = "Artikel B'Sky";
        $data['artikel'] = $this->Artikel_model->getArtikelById($id);
        $data['profile'] = $this->Profile_model->getAllProfile();
        $data['artikels'] = $this->Artikel_model->getAllArtikel();
        $this->load->view('template_home/header', $data);
        $this->load->view('artikel/detail_artikel', $data);
        $this->load->view('template_home/footer', $data);
    }

    public function fakultas($id)
    {
        $data['title'] = "Digilib B'Sky";
        $data['profile'] = $this->Profile_model->getAllProfile();
        $data['jurusan'] = $this->Mahasiswa_model->getJurusanById($id);
        $data['repository'] = $this->Repository_model->getAllRepository();
        $data['fakultas'] = $this->Fakultas_model->getAllFakultas();
        $singleFakultas = $this->Fakultas_model->getFakultasById($id);
        $data['singleFakultas'] = $singleFakultas;
        $this->load->view('template_home/header', $data);
        $this->load->view('fakultas/index', $data);
        $this->load->view('template_home/footer', $data);
    }

    public function detail($id)
    {
        $data['title'] = "Digilib B'SKY";
        $data['profile'] = $this->Profile_model->getAllProfile();
        $data['repository'] = $this->Repository_model->getRepositoryById($id);
        $data['repositorys'] = $this->Repository_model->getAllRepository();
        $this->load->view('template_home/header', $data);
        $this->load->view('detail_artikel/index', $data);
        $this->load->view('template_home/footer', $data);
    }

    public function artikel($id)
    {
        $data['title'] = "Digilib B'SKY";
        $data['profile'] = $this->Profile_model->getAllProfile();
        $data['singleFakultas'] = $this->Fakultas_model->getFakultasById($id);
        $data['jurusan'] = $this->Mahasiswa_model->getJurusanById($id);
        $data['repository'] = $this->Repository_model->getAllRepository();
        $data['singleRepository'] = $this->Repository_model->getRepositoryById($id);


        // Pagination config
        $config['base_url'] = base_url('home/artikel/' . $id);
        $config['total_rows'] = $this->Repository_model->countAllRepository();
        $config['per_page'] = 5;
        $config['num_links'] = 1;
        // Styling 
        $config['full_tag_open'] = '<nav"><ul class="pagination justify-content-center"> ';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = ' <li class="page-item">';
        $config['first_tag_close'] = '</li> ';

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
        // Initialize pagination
        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(4);
        $data['repository'] = $this->Repository_model->getRepository($config['per_page'], $data['start']);

        if ($this->input->post('keyword')) {
            $data['repository'] = $this->Repository_model->cariDataRepository();
        }

        $this->load->view('template_home/header', $data);
        $this->load->view('detail_artikel/all_artikel', $data);
        $this->load->view('template_home/footer', $data);
    }

    public function scan_kartu($id)
    {
        $data['title'] = "Kartu Tanda Mahasiswa";
        $data['profile'] = $this->Profile_model->getAllProfile();
        $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);
        $data['jurusan'] = $this->Mahasiswa_model->getAllJurusan();

        $this->load->view('template_home/header', $data);
        $this->load->view('home/kartu_qr', $data);
        $this->load->view('template_home/footer', $data);
    }

    public function portalArtikel()
    {
        $data['title'] = "Universitas B'SKY";
        $data['profile'] = $this->Profile_model->getAllProfile();
        $data['artikel'] = $this->Artikel_model->getAllArtikel();

        $this->load->view('template_home/header', $data);
        $this->load->view('artikel/index', $data);
        $this->load->view('template_home/footer', $data);
    }
}
