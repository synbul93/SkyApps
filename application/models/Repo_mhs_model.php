<?php

class Repo_mhs_model extends CI_Model
{

    public function getAllRepository()
    {
        return  $this->db->get('repository')->result_array();
    }
    public function getRepositoryById($id)
    {
        return $this->db->get_where('repository', ['id' => $id])->row_array();
    }
    public function getRepository($limit, $start)
    {
        return $this->db->get('repository', $limit, $start)->result_array();
    }

    public function savePdfFilePath($file_path)
    {
        // Simpan file path ke dalam database
        $data = array(
            'file_path' => $file_path
        );
        $this->db->insert('pdf_files', $data);

        // Kembalikan ID file yang baru ditambahkan
        return $this->db->insert_id();
    }

    public function cariDataRepository()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);
        $this->db->or_like('nrp', $keyword);
        $this->db->or_like('penerbit', $keyword);
        $this->db->or_like('fakultas', $keyword);
        $this->db->or_like('jurusan', $keyword);
        $this->db->or_like('koleksi', $keyword);
        return $this->db->get('repository')->result_array();
    }

    public function countAllRepository()
    {
        return $this->db->count_all('repository');
    }

    public function tambah($user_id)
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "judul" => $this->input->post('judul', true),
            "abstrak" => $this->input->post('abstrak', true),
            "dosen" => $this->input->post('dosen', true),
            "nrp" => $this->input->post('nrp', true),
            "koleksi" => $this->input->post('koleksi', true),
            "penerbit" => $this->input->post('penerbit', true),
            "tgl_input" => $this->input->post('tgl_input', true),
            "fakultas" => $this->input->post('fakultas', true),
            "jurusan" => $this->input->post('jurusan', true),
            "program" => $this->input->post('program', true),
            "akses" => $this->input->post('akses', true),
            "user_id" => $user_id,
            "file" => '' // Initialize file path as an empty string
        ];

        // File upload configuration
        $config['upload_path'] = './assets/file/upload';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 10240; // in kilobytes
        $config['encrypt_name'] = false;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('file')) {
            $file_data = $this->upload->data();
            $file_path = $file_data['file_name'];
            $data['file'] = $file_path;
        } else {
            // Upload failed
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
            redirect('user_mahasiswa');
        }


        $this->db->insert('repository', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat, data berhasil ditambahkan!</div>');
        redirect('user_mahasiswa');
    }

    public function hapusDataRepository($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('repository');
    }

    public function getAllRepositoryByUserId($user_id)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->get('repository')->result_array();
    }
    public function edit($id)
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "judul" => $this->input->post('judul', true),
            "abstrak" => $this->input->post('abstrak', true),
            "dosen" => $this->input->post('dosen', true),
            "nrp" => $this->input->post('nrp', true),
            "koleksi" => $this->input->post('koleksi', true),
            "penerbit" => $this->input->post('penerbit', true),
            "tgl_input" => $this->input->post('tgl_input', true),
            "fakultas" => $this->input->post('fakultas', true),
            "jurusan" => $this->input->post('jurusan', true),
            "program" => $this->input->post('program', true),
            "akses" => $this->input->post('akses', true),
        ];

        // Cek apakah ada file baru yang diupload
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
                redirect('user_mahasiswa');
            }
        }

        $this->db->where('id', $id);
        $this->db->update('repository', $data);
    }


    public function getAllJurusan()
    {
        return $this->db->get('jurusan')->result_array();
    }

    public function getAllProgram()
    {
        return $this->db->get('program')->result_array();
    }

    public function get_total_data()
    {
        $query = $this->db->get('repository');
        return $query->num_rows();
    }

    public function get_repository_bar_data()
    {
        $this->db->select('fakultas, COUNT(*) AS total');
        $this->db->from('repository');
        $this->db->group_by('fakultas');
        $query = $this->db->get();
        return $query->result();
    }
}
