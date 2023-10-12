<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        user_level();
    }
    public function index()
    {

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Menu Management';

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('template/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', ' <div class="alert alert-success" role="alert">New menu added!</div>');
            redirect('menu');
        }
    }

    public function editmenu($id)
    {
        $this->load->model('Menu_model', 'menu_model');

        $this->form_validation->set_rules('menu', 'Menu', 'required');
        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = 'Edit Menu';
            $data['menu'] = $this->db->get('user_menu')->result_array();
            $data['user_menu'] = $this->menu_model->getMenuById($id);

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('menu/edit_menu', $data);
            $this->load->view('template/footer');
        } else {
            $menu = $this->input->post('menu');

            $this->db->where('id', $id);
            $this->db->update('user_menu', ['menu' => $menu]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu updated!</div>');
            redirect('menu');
        }
    }

    public function deletemenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub Menu deleted!</div>');
        redirect('menu');
    }


    public function submenu()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Sub Menu Management';
        $this->load->model('Menu_model', 'menu_model');
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['subMenu'] = $this->menu_model->getSubMenu();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'level' => $this->input->post('level'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active'),
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', ' <div class="alert alert-success" role="alert">New Sub Menu added!</div>');
            redirect('menu/submenu');
        }
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub Menu deleted!</div>');
        redirect('menu/submenu');
    }



    public function edit($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Edit';
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->model('Menu_model', 'menu_model');
        $data['subMenu'] = $this->menu_model->getSubMenu();
        $data['user_sub_menu'] = $this->menu_model->getSubMenuById($id);

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('menu/edit', $data);
            $this->load->view('template/footer');
        } else {
            $update_data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'level' => $this->input->post('level'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active'),
            ];
            $this->db->where('id', $id);
            $this->db->update('user_sub_menu', $update_data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub Menu updated!</div>');
            redirect('menu/submenu');
        }
    }
}
