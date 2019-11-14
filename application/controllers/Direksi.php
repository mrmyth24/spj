<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Direksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Pdl_model', 'PDL');
        $this->load->model('Spj_model', 'SPJ');
    }

    public function index()
    {
        $data['title'] = 'Direksi';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['pdl'] = $this->SPJ->getspjdireksi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('direksi/index', $data);
        $this->load->view('templates/footer', $data);
    }



    public function pdldireksi($id)
    {
        $data['title'] = 'Direksi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pdl'] = $this->PDL->getdetailpdl($id);

        $this->db->set('status', '5');
        $this->db->where('id', $id);
        $this->db->update('pdl');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Thanks For acc SPJ!</div>');
        redirect('direksi');
    }

    public function lihatpdl($id)
    {
        $data['title'] = 'Direksi';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['pdl'] = $this->SPJ->getspjdireksisee();
        $data['pdl_rombongan'] = $this->PDL->getRombongan($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('direksi/lihatspj', $data);
        $this->load->view('templates/footer', $data);
    }
    public function pdltolakdireksi($id)
    {
        $data['title'] = 'Penanggung Jawab';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pdl'] = $this->PDL->getdetailpdl($id);

        $this->db->set('status', '10');
        $this->db->where('id', $id);
        $this->db->update('pdl');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Anda Telah Menolak Surat!</div>');
        redirect('direksi/index');
    }
}
