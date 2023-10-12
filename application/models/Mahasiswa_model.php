<?php

class Mahasiswa_model extends CI_Model
{

    public function getAllMahasiswa()
    {
        return  $this->db->get('mahasiswa')->result_array();
    }

    public function getAllJurusan()
    {
        return $this->db->get('jurusan')->result_array();
    }

    public function getAllProgram()
    {
        return $this->db->get('program')->result_array();
    }

    public function tambahDataJurusan()
    {
        $data = [
            "jurusan" => $this->input->post('jurusan', true),
            "program" => $this->input->post('program', true)
        ];
        $this->db->insert('jurusan', $data);
    }

    public function tambahDataMahasiswa()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "alamat" => $this->input->post('alamat', true),
            "nrp" => $this->input->post('nrp', true),
            "email" => $this->input->post('email', true),
            "jurusan" => $this->input->post('jurusan'),
            "program" => $this->input->post('program')
        ];
        $this->db->insert('mahasiswa', $data);
    }

    public function getMahasiswa($limit, $start)
    {
        return  $this->db->get('mahasiswa', $limit, $start)->result_array();
    }

    public function get_mahasiswa_data()
    {
        $query = $this->db->get('mahasiswa');
        return $query->num_rows();
    }

    public function get_jurusan_data()
    {
        $query = $this->db->get('jurusan');
        return $query->num_rows();
    }

    public function countAllMahasiswa()
    {
        return  $this->db->get('mahasiswa')->num_rows();
    }

    public function hapusDataMahasiswa($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('mahasiswa');
    }

    public function getMahasiswaById($id)
    {
        return $this->db->get_where('mahasiswa', ['id' => $id])->row_array();
    }

    public function getJurusanById($id)
    {
        return $this->db->get_where('jurusan', ['id' => $id])->row_array();
    }

    public function ubahDataMahasiswa($id)
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "nrp" => $this->input->post('nrp', true),
            "email" => $this->input->post('email', true),
            "jurusan" => $this->input->post('jurusan')
        ];
        $this->db->where('id', $id); // use $id in the where clause
        $this->db->update('mahasiswa', $data);
    }

    public function cariDataMahasiswa()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);
        $this->db->or_like('nrp', $keyword);
        $this->db->or_like('jurusan', $keyword);
        $this->db->or_like('email', $keyword);
        return $this->db->get('mahasiswa')->result_array();
    }
}
