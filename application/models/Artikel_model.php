<?php

class Artikel_model extends CI_Model
{

    public function getAllArtikel()
    {
        return  $this->db->get('artikel')->result_array();
    }

    public function getArtikelById($id)
    {
        return $this->db->get_where('artikel', ['id' => $id])->row_array();
    }

    public function tambahDataArtikel()
    {
        $data = [
            "judul" => $this->input->post('judul', true),
            "ringkasan_berita" => $this->input->post('ringkasan_berita', true),
            "isi_berita" => $this->input->post('isi_berita', true),
            "editor" => $this->input->post('editor', true),
            "oleh" => $this->input->post('oleh', true),
            "reporter" => $this->input->post('reporter', true),
            'image' => 'default.jpg'
        ];

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
                $data['image'] = $image_path;
            } else {
                // Upload failed
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
                redirect('admin/tambahArtikel');
            }
        }

        $this->db->insert('artikel', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat, data artikel berhasil ditambahkan!</div>');
        redirect('admin/artikel');
    }

    public function editDataArtikel($id)
    {
        $data = [
            "judul" => $this->input->post('judul', true),
            "ringkasan_berita" => $this->input->post('ringkasan_berita', true),
            "isi_berita" => $this->input->post('isi_berita', true),
            "editor" => $this->input->post('editor', true),
            "oleh" => $this->input->post('oleh', true),
            "reporter" => $this->input->post('reporter', true),
            'image' => 'default.jpg'
        ];

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
                $data['image'] = $image_path;
            } else {
                // Upload failed
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
                redirect('admin/tambahArtikel');
            }
        }

        $this->db->where('id', $id);
        $this->db->update('artikel', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat, data artikel berhasil diubah!</div>');
        redirect('admin/artikel');
    }

    public function hapusDataArtikel($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('artikel');
    }

    public function cariDataArtikel()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('judul', $keyword);
        $this->db->or_like('ringkasan_berita', $keyword);
        $this->db->or_like('editor', $keyword);
        $this->db->or_like('isi_berita', $keyword);
        return $this->db->get('artikel')->result_array();
    }
}
