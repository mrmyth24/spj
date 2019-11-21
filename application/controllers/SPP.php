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
    public function addmail($id)
    {

        $data['title'] = 'SPJ';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['spj'] = $this->SPJ->getdetailspj($id);
        $data['pdl_rombongan'] = $this->PDL->getRombongan($id);
        $data['karyawan'] = $this->SPJ->getkaryawan();


        $this->form_validation->set_rules('nomor_spp', 'Nomor SPP', 'required');
        $this->form_validation->set_rules('disetujui_spp', 'Disetujui Oleh', 'required');
        $this->form_validation->set_rules('jabatan_penyetuju', 'Jabatan Penyetuju', 'required');
        $this->form_validation->set_rules('diajukan_spp', 'Diajukan Oleh', 'required');
        $this->form_validation->set_rules('jabatan_spp', 'Jabatan pengaju', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('spp/addmail', $data);
            $this->load->view('templates/footer', $data);
        } else {

            $this->db->update('pdl', [


                'nomor_spp' => $this->input->post('nomor_spp'),
                'disetujui_spp' => $this->input->post('disetujui_spp'),
                'jabatan_penyetuju' => $this->input->post('jabatan_penyetuju'),
                'diajukan_spp' => $this->input->post('diajukan_spp'),
                'jabatan_spp' => $this->input->post('jabatan_spp'),


            ]);
            $namaRombongan = $this->input->post('nama_rombongan');
            $jabatanRombongan = $this->input->post('jabatan_rombongan');
            $golonganRombongan = $this->input->post('golongan_rombongan');

            foreach ($namaRombongan as $index => $data) {

                $datas = array(
                    'id_pdl' => $id,
                    'nama_peserta' => $data,
                    'jabatan_rombongan' => $jabatanRombongan[$index],
                    'golongan_rombongan' => $golonganRombongan[$index]
                );
            }

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your mail has been update!</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Failed to Update your mail!</div>');
            }
            redirect('SPP');
        }
    }
}
