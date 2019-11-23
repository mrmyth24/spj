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

        $this->form_validation->set_rules('bukti', 'Bukti', 'required');

        if (!isset($_POST['submit'])) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('history/index', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $config['upload_path'] = './assets/upload/suratmasuk';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 0;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('bukti')) {
                echo $this->upload->display_errors();
            } else {
                $file = $this->upload->data('file_name');
            }

            $id = $this->input->post('id_tujuan');
            // var_dump($id);
            // die;

            $datas = array(
                'bukti' => $file,
                'status' => '6'
            );

            $this->db->where('id', $id);
            $this->db->update('pdl', $datas);

            // var_dump($_POST['submit']);
            // var_dump($datas);
            // die();

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New Mail added!</div>');
            redirect('history');
        }
    }
    public function lihatspj($id)
    {
        $data['title'] = 'Lihat Surat';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['spj'] = $this->SPJ->getspjsee($id);
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
