<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SPP extends CI_Controller
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
        $data['title'] = 'SPP';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['pdl'] = $this->SPJ->getspp();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('spp/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function laporan_spp($id)
    {

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['spj'] = $this->SPJ->getdetailspj($id);
        $data['pdl_rombongan'] = $this->PDL->getRombongan($id);

        // var_dump($data['pdl_rombongan']);
        // die;

        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-sp.pdf";
        $this->pdf->load_view('spp/surat', $data);

        return $this->pdf->stream();
        // $this->pdf->stream("laporan-sspp.pdf", array("Attachment" => false));
        // exit(0);
    }
}
