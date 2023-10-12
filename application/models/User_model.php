<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function getAllUsers()
    {
        $query = "SELECT `user`.*, `role`.`role_id` 
                  FROM `user` 
                  JOIN `role` ON `user`.`role_id` = `role`.`id`";

        $result = $this->db->query($query);

        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    public function getAllDosen()
    {

        $this->db->where('role_id', 2);
        $query = $this->db->get('user');


        if ($query->num_rows() > 0) {

            return $query->result_array();
        } else {

            return array();
        }
    }

    public function getDosenById($dosen_id)
    {

        $role_id_dosen = 2;


        $query = $this->db->get_where('user', ['id' => $dosen_id, 'role_id' => $role_id_dosen]);

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }


    public function getRoleById($id)
    {
        return $this->db->get_where('role', ['id' => $id])->row_array();
    }

    public function getAllUser()
    {
        return $this->db->get('user')->result_array();
    }

    public function getAllRole()
    {
        $this->db->where('id !=', 1);
        return $this->db->get('role')->result_array();
    }

    public function hapusDataRole($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('role');
    }

    public function hapusDataUser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }

    public function getUserById($user_id)
    {
        return $this->db->get_where('user', ['id' => $user_id])->row_array();
    }


    public function approveUser($user_id)
    {
        $this->db->where('id', $user_id);
        $this->db->update('user', ['is_approved' => 1]);
    }


    public function rejectUser($user_id)
    {
        $data = [
            'is_approved' => 2,
        ];
        $this->db->where('id', $user_id);
        $this->db->update('user', $data);
    }

    public function getUserTokenByEmail($email)
    {
        return $this->db->get_where('user_token', ['email' => $email])->row_array();
    }

    public function getUserByEmail($email)
    {
        return $this->db->get_where('user', ['email' => $email])->row_array();
    }

    public function deleteUser($email)
    {
        $this->db->where('email', $email);
        $this->db->delete('user');
    }
}
