<?php

class Profile_model extends CI_Model
{
    public function getAllProfile()
    {
        return $this->db->get('profile')->row_array();
    }


    public function editProfile()
    {
        $data = [
            "univ_name" => $this->input->post('univ_name', true),
            "ig" => $this->input->post('ig', true),
            "fb" => $this->input->post('fb', true),
            "wa" => $this->input->post('wa', true),
            "twitter" => $this->input->post('twitter', true),
            "yt" => $this->input->post('yt', true),
            "alamat" => $this->input->post('alamat', true),
            "email" => $this->input->post('email', true),
            "no_tel" => $this->input->post('no_tel', true)
        ];

        // Check if profile image is uploaded
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

        $email = $data['email'];
        unset($data['email']);

        $this->db->where('email', $email);
        $this->db->update('profile', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat, data profil berhasil diubah!</div>');
        redirect('profile');
    }
}
