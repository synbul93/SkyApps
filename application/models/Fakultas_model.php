<?php

class Fakultas_model extends CI_Model
{
    public function getAllFakultas()
    {
        return $this->db->get('fakultas')->result_array();
    }
    public function getFakultasById($id)
    {
        return $this->db->get_where('fakultas', ['id' => $id])->row_array();
    }
}
