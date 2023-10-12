<?php

class Repository extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        user_level();
        $this->load->model('Repository_model');
        $this->load->model('Fakultas_model');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->load->library('upload');
        $this->load->helper('Pdf_helper');
        $this->load->helper('excel_helper');
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Repository Data';
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['repository'] = $this->Repository_model->getAllRepository();


        // Pagination config
        $config['base_url'] = base_url('repository/index');
        $config['total_rows'] = $this->Repository_model->countAllRepository();
        $config['per_page'] = 10;
        $config['num_links'] = 3;
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
        $data['start'] = $this->uri->segment(3);
        $data['repository'] = $this->Repository_model->getRepository($config['per_page'], $data['start']);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('repository/index');
        $this->load->view('template/footer', $data);
    }

    public function tambah()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Repository Data';
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $data['repository'] = $this->Repository_model->getAllRepository();
        $data['fakultas'] = $this->Fakultas_model->getAllFakultas();
        $data['program'] = $this->Repository_model->getAllProgram();
        $data['jurusan'] = $this->Repository_model->getAllJurusan();

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
            $this->load->view('repository/tambah', $data);
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
                $data['file'] = $file_path;

                // Panggil model dan tambahkan data ke database
                $this->Repository_model->tambah($data);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat, data berhasil ditambahkan!</div>');
                redirect('repository');
            } else {
                // Upload failed
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
                redirect('repository');
            }
        }
    }

    public function hapus($id)
    {
        $this->Repository_model->hapusDataRepository($id);
        $this->session->set_flashdata('message', ' <div class="alert alert-danger" role="alert">Data has been deleted!</div>');
        redirect('repository');
    }

    public function detail($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Repository Data';

        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['repository'] = $this->Repository_model->getRepositoryById($id);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('repository/detail', $data);
        $this->load->view('template/footer');
    }

    public function ubah($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Change repository data';

        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['repository'] = $this->Repository_model->getAllRepository();
        $data['repository'] = $this->Repository_model->getRepositoryById($id);
        $data['fakultas'] = $this->Fakultas_model->getAllFakultas();
        $data['program'] = $this->Repository_model->getAllProgram();
        $data['jurusan'] = $this->Repository_model->getAllJurusan();

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
            // Perbarui informasi repository dengan data baru
            $data = [
                "nama" => $this->input->post('nama', true),
                "judul" => $this->input->post('judul', true),
                // Tambahkan field lainnya sesuai kebutuhan
            ];

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
                    redirect('repository/ubah/' . $id);
                }
            }

            $this->Repository_model->ubahDataRepository($id, $data);

            $this->session->set_flashdata('message', ' <div class="alert alert-success" role="alert">Congratulations, the data has been changed!</div>');
            redirect('repository');
        }
    }

    public function exportPDF()
    {
        // Mengambil data repository dari model
        $data['repository'] = $this->Repository_model->getAllRepository();

        // Memuat helper 'pdf'
        $this->load->helper('pdf');

        // Nama file PDF yang dihasilkan
        $filename = 'Report_Data_Repository.pdf';

        // Memanggil fungsi exportDataToPDF untuk menghasilkan file PDF
        exportDataToPDF($data['repository'], $filename);
    }

    public function exportExcel()
    {

        // Mendapatkan data dari database
        $data['repository'] = $this->Repository_model->getAllRepository();

        // Load Excel helper
        $this->load->helper('excel');

        // Set filename
        $filename = 'data_export.xlsx';

        // Export data to Excel
        export_to_excel($data['repository'], $filename);

        // Set headers to download the file
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Output the file
        readfile($filename);
    }
}
