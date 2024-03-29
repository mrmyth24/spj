<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Menu_model', 'menu');
	}

	public function index()
	{
		$data['title'] = 'Menu Management';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['menu'] = $this->menu->getmenu();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('menu/index', $data);
		$this->load->view('templates/footer');
	}

	public function addmenu(){

		$data['title'] = 'Menu Management';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
//		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('menu', 'Menu', 'required');

		if($this->form_validation->run() == false ){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/addmenu', $data);
			$this->load->view('templates/footer');
		}else{
			$this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New menu added!</div>');
			redirect('menu');
		}

	}

	public function editmenu($id)
	{
		$data['title'] = 'Menu Management';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['menu'] = $this->menu->getdetailmenu($id);

		$this->form_validation->set_rules('menu', 'Menu', 'required|trim');

		if ($this->form_validation->run() == false ){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/editmenu', $data);
			$this->load->view('templates/footer');
		}else{
			$menu = $this->input->post('menu');

			$this->db->set('menu', $menu);
			$this->db->where('id', $id);
			$this->db->update('user_menu');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your menu has been updated!</div>');
			redirect('menu');
		}

	}

	public function deletemenu($id)
	{
		$data['title'] = 'Menu Management';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['menu'] = $this->menu->getdetailmenu($id);

//			$this->load->view('templates/header', $data);
//			$this->load->view('templates/sidebar', $data);
//			$this->load->view('templates/topbar', $data);
//			$this->load->view('menu/editmenu', $data);
//			$this->load->view('templates/footer');

			$this->db->where('id', $id);
			$this->db->delete('user_menu');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your menu has been deleted!</div>');
			redirect('menu');


	}


	public function submenu()
	{
		$data['title'] = 'SubMenu Management';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['submenu'] = $this->menu->getsubmenu();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('menu/submenu', $data);
		$this->load->view('templates/footer');
	}

	public function addsubmenu(){

		$data['title'] = 'SubMenu Management';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['menu'] = $this->menu->getmenu();

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
		$this->form_validation->set_rules('url', 'Url', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');

		if($this->form_validation->run() == false ){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/addsubmenu', $data);
			$this->load->view('templates/footer');
		}else{
			$data =[
				'title' => $this->input->post('title'),
				'menu_id' => $this->input->post('menu_id'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'is_active' => $this->input->post('is_active')

			];

			$this->db->insert('user_sub_menu', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New sub menu added!</div>');
			redirect('menu/submenu');
		}

	}

	public function editsubmenu($id)
	{
		$data['title'] = 'SubMenu Management';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['submenu'] = $this->menu->getdetailsubmenu($id);
		$data['menu'] = $this->menu->getmenu();

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
		$this->form_validation->set_rules('url', 'Url', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');

		if ($this->form_validation->run() == false ){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/editsubmenu', $data);
			$this->load->view('templates/footer');
		}else{
			$title = $this->input->post('title');
			$menu_id = $this->input->post('menu_id');
			$url = $this->input->post('url');
			$icon = $this->input->post('icon');
			$is_active = $this->input->post('is_active');

			$this->db->set('title', $title);
			$this->db->set('menu_id', $menu_id);
			$this->db->set('url', $url);
			$this->db->set('menu_id', $menu_id);
			$this->db->set('icon', $icon);
			$this->db->set('is_active', $is_active);
			$this->db->where('id', $id);
			$this->db->update('user_sub_menu');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your submenu has been updated!</div>');
			redirect('menu/submenu');
		}

	}

	public function deletesubmenu($id)
	{
		$data['title'] = 'SubMenu Management';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['submenu'] = $this->menu->getdetailsubmenu($id);

//		$this->load->view('templates/header', $data);
//		$this->load->view('templates/sidebar', $data);
//		$this->load->view('templates/topbar', $data);
//		$this->load->view('menu/deletesubmenu', $data);
//		$this->load->view('templates/footer');

		$this->db->where('id', $id);
		$this->db->delete('user_sub_menu');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your menu has been deleted!</div>');
		redirect('menu/submenu');


	}


}
