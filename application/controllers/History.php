<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Spj_model', 'SPJ');
        $this->load->model('Pdl_model', 'PDL');
    }

    public function index()
    {
        $data['title'] = 'History Surat';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // $data['spj'] = $this->SPJ->getspjbyname($data['user']['name']);

        // $data['rombongan'] = $this->PDL->getpdlbyrombongan($data['user']['name']);
        $data['spj'] = $this->PDL->getpdlbyname($data['user']['name']);


        // var_dump($data['user']['name']);
        // die();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('history/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function lihatpdl($id)
    {
        $data['title'] = 'Lihat Surat';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['pdl'] = $this->SPJ->getspjsee();
        $data['pdl_rombongan'] = $this->PDL->getRombongan($id);

        // var_dump($data['pdl_rombongan']);
        // die();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('history/lihatspj', $data);
        $this->load->view('templates/footer', $data);
    }
}
