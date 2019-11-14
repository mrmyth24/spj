<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dirut extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Pdl_model', 'PDL');
    }

    public function index()
    {
        $data['title'] = 'Dirut';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['pdl'] = $this->PDL->getpdldirut();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dirut/index', $data);
        $this->load->view('templates/footer', $data);
    }



    public function pdldirut($id)
    {
        $data['title'] = 'Acc PDL';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pdl'] = $this->PDL->getdetailpdl($id);

        $this->db->set('status', '3');
        $this->db->where('id', $id);
        $this->db->update('pdl');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your mail has been sent to Sekretaris Utama!</div>');
        redirect('dirut');
    }

    public function lihatpdl($id)
    {
        $data['title'] = 'Acc PDL';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['pdl'] = $this->PDL->getpdlseedirut();
        $data['pdl_rombongan'] = $this->PDL->getRombongan($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/lihatpdl', $data);
        $this->load->view('templates/footer', $data);
    }

    public function pdltolakdirut($id)
    {
        $data['title'] = 'Penanggung Jawab';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pdl'] = $this->PDL->getdetailpdl($id);

        $this->db->set('status', '9');
        $this->db->where('id', $id);
        $this->db->update('pdl');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Anda Telah Menolak Surat!</div>');
        redirect('dirut/index');
    }
}
