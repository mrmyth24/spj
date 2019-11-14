<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Tarif_model', 'tarif');
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}

	public function role()
	{
		$data['title'] = 'Role';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get('user_role')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role', $data);
		$this->load->view('templates/footer');
	}
	public function tarif()
	{
		$data['title'] = 'Tarif';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['tarifspj'] = $this->db->get('tarifspj')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/tarif', $data);
		$this->load->view('templates/footer');
	}

	public function edittarif($id)
	{
		$data['title'] = 'Tarif';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['tarifspj'] = $this->tarif->getdetailtarif($id);

		$this->form_validation->set_rules('jenis_perjalanan', 'Jenis Perjalanan', 'required|trim');
		$this->form_validation->set_rules('kelompok_golongan', 'Kelompok Golongan', 'required|trim');
		$this->form_validation->set_rules('uang_makan', 'Uang Makan', 'required|trim');
		$this->form_validation->set_rules('makan_pagi', 'Makan Pagi', 'required|trim');
		$this->form_validation->set_rules('makan_siang', 'Makan Siang', 'required|trim');
		$this->form_validation->set_rules('makan_malam', 'Makan Malam', 'required|trim');
		$this->form_validation->set_rules('uang_saku', 'Uang Saku', 'required|trim');
		$this->form_validation->set_rules('uang_cucian', 'Uang Cucian', 'required|trim');
		$this->form_validation->set_rules('taxi_bandara', 'Taxi Bandara', 'required|trim');
		$this->form_validation->set_rules('air_port_tax', 'Airport Tax', 'required|trim');
		$this->form_validation->set_rules('transport_lokal', 'Transport Lokal', 'required|trim');
		$this->form_validation->set_rules('penginapan', 'Penginapan', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/edittarif', $data);
			$this->load->view('templates/footer');
		} else {
			$jenis_perjalanan = $this->input->post('jenis_perjalanan');
			$kelompok_golongan = $this->input->post('kelompok_golongan');
			$uang_makan = $this->input->post('uang_makan');
			$makan_pagi = $this->input->post('makan_pagi');
			$makan_siang = $this->input->post('makan_siang');
			$makan_malam = $this->input->post('makan_malam');
			$uang_saku = $this->input->post('uang_saku');
			$uang_cucian = $this->input->post('uang_cucian');
			$taxi_bandara = $this->input->post('taxi_bandara');
			$air_port_tax = $this->input->post('air_port_tax');
			$transport_lokal = $this->input->post('transport_lokal');
			$penginapan = $this->input->post('penginapan');

			$this->db->set('jenis_perjalanan', $jenis_perjalanan);
			$this->db->set('kelompok_golongan', $kelompok_golongan);
			$this->db->set('uang_makan', $uang_makan);
			$this->db->set('makan_pagi', $makan_pagi);
			$this->db->set('makan_siang', $makan_siang);
			$this->db->set('makan_malam', $makan_malam);
			$this->db->set('uang_saku', $uang_saku);
			$this->db->set('uang_cucian', $uang_cucian);
			$this->db->set('taxi_bandara', $taxi_bandara);
			$this->db->set('air_port_tax', $air_port_tax);
			$this->db->set('transport_lokal', $transport_lokal);
			$this->db->set('penginapan', $penginapan);

			$this->db->where('id', $id);
			$this->db->update('tarifspj');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your menu has been updated!</div>');
			redirect('admin/tarif');
		}
	}



	public function addrole()
	{
		$data['title'] = 'Role';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('role', 'Role', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/addrole', $data);
			$this->load->view('templates/footer');
		} else {
			$this->db->insert('user_role', ['role' => $this->input->post('role')]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New role added!</div>');
			redirect('admin/role');
		}
	}

	public function roleaccess($role_id)
	{
		$data['title'] = 'Role Access';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

		$this->db->where('id !=', 1);
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role-access', $data);
		$this->load->view('templates/footer');
	}

	public function changeaccess()
	{
		$role_id = $this->input->post('roleId');
		$menu_id = $this->input->post('menuId');

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('user_access_menu', $data);

		if ($result->num_rows() < 1) {
			$this->db->insert('user_access_menu', $data);
		} else {
			$this->db->delete('user_access_menu', $data);
		}

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Access changed!</div>');
	}
}
