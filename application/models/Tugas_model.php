<?php

class Tugas_model extends CI_Model
{
    public function getTugasTerkirimByUser($user_id)
    {
        $this->db->select('tugas_mhs.*, user.name as dosen_tujuan');
        $this->db->from('tugas_mhs');
        $this->db->join('user', 'tugas_mhs.dosen_tujuan = user.id');
        $this->db->where('user_id', $user_id);
        return $this->db->get()->result_array();
    }

    public function getTugasById($tugas_id)
    {
        $this->db->where('id', $tugas_id);
        return $this->db->get('tugas_mhs')->row_array();
    }

    public function getEditTugasById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('tugas_mhs')->row_array();
    }

    public function upload_tugas($user_id)
    {
        $data = [
            'user_id' => $user_id,
            'nama' => $this->input->post('nama', true),
            'fakultas' => $this->input->post('fakultas', true),
            'judul' => $this->input->post('judul', true),
            'deskripsi' => $this->input->post('deskripsi', true),
            'dosen_tujuan' => $this->input->post('dosen_tujuan', true),
            "file" => '' // Menginisialisasi path file sebagai string kosong
        ];

        // Konfigurasi unggah file
        $config['upload_path'] = './assets/file/tugas';
        $config['allowed_types'] = 'pdf|doc|docx';
        $config['max_size'] = 10240; // dalam kilobytes
        $config['encrypt_name'] = true; // Setel ke true untuk keamanan tambahan

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('file')) {
            // Unggah berhasil
            $file_data = $this->upload->data();
            $file_path = $file_data['file_name'];
            $data['file'] = $file_path;

            $this->db->insert('tugas_mhs', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat, data berhasil ditambahkan!</div>');
            redirect('user_mahasiswa/daftar_tugas');
        } else {
            // Unggah gagal
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
            redirect('user_mahasiswa/tugas');
        }
    }

    public function upload_tugas_dosen($user_id)
    {
        $data = [
            'user_id' => $user_id,
            'nama' => $this->input->post('nama', true),
            'fakultas' => $this->input->post('fakultas', true),
            'tgl_mulai' => $this->input->post('tgl_mulai', true),
            'tgl_akhir' => $this->input->post('tgl_akhir', true),
            'judul' => $this->input->post('judul', true),
            'deskripsi' => $this->input->post('deskripsi', true),
            "file" => ''
        ];

        // Konfigurasi unggah file
        $config['upload_path'] = './assets/file/tugas_dosen';
        $config['allowed_types'] = 'pdf|doc|docx';
        $config['max_size'] = 10240;
        $config['encrypt_name'] = false;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!empty($_FILES['file']['name'])) {
            if ($this->upload->do_upload('file')) {
                // Unggah berhasil
                $file_data = $this->upload->data();
                $file_path = $file_data['file_name'];
                $data['file'] = $file_path;
            } else {
                // Unggah gagal
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
                redirect('user/upload_tugas_dosen');
            }
        } else {
            // Jika file tidak dipilih, set file ke kosong (atau sesuai kebutuhan)
            $data['file'] = '';
        }

        $this->db->insert('tugas_dosen', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat, data berhasil ditambahkan!</div>');
        redirect('user/daftar_tugas');
    }


    public function hapusDataTugas($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tugas_mhs');
    }

    public function getTugasByDosen($dosen_id)
    {
        $this->db->where('dosen_tujuan', $dosen_id);
        return $this->db->get('tugas_mhs')->result_array();
    }

    public function edit_tugas($id, $data)
    {
        $data = [
            'nama' => $this->input->post('nama', true),
            'fakultas' => $this->input->post('fakultas', true),
            'judul' => $this->input->post('judul', true),
            'deskripsi' => $this->input->post('deskripsi', true),
            'dosen_tujuan' => $this->input->post('dosen_tujuan', true),
        ];

        // Cek apakah ada file baru yang diupload
        if (!empty($_FILES['file']['name'])) {
            $config['upload_path'] = './assets/file/tugas';
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
                redirect('user_mahasiswa/edit_tugas');
            }
        }

        $this->db->where('id', $id);
        $this->db->update('tugas_mhs', $data);
    }

    public function getTugasDosenByDosen($user_id)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->get('tugas_dosen')->result_array();
    }

    public function getTugasDosen()
    {
        $this->db->select('*');
        $this->db->from('tugas_dosen');

        $query = $this->db->get();
        return $query->result_array();
    }


    public function getTugasDosenById($tugas_id)
    {
        $this->db->where('id', $tugas_id);
        return $this->db->get('tugas_dosen')->row_array();
    }

    public function edit_tugas_dosen($id, $data_insert)
    {
        $data = [
            'nama' => $this->input->post('nama', true),
            'fakultas' => $this->input->post('fakultas', true),
            'tgl_mulai' => $this->input->post('tgl_mulai', true),
            'tgl_akhir' => $this->input->post('tgl_akhir', true),
            'judul' => $this->input->post('judul', true),
            'deskripsi' => $this->input->post('deskripsi', true),
            "file" => ''
        ];

        // Cek apakah ada file baru yang diupload
        if (!empty($_FILES['file']['name'])) {
            $config['upload_path'] = './assets/file/tugas_dosen';
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
            } else {
                // Upload failed
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
                redirect('user/edit_tugas_dosen/' . $id);
            }
        }

        $this->db->where('id', $id);
        $this->db->update('tugas_dosen', $data);
    }
}
