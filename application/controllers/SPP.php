<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SPP extends CI_Controller
{

    public $dataSpj;

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Pdl_model', 'PDL');
        $this->load->model('Spj_model', 'SPJ');
    }

    public function index()
    {
        $config['base_url'] = site_url('spp/index'); //site url
        $config['total_rows'] = $this->db->count_all('pdl'); //total row
        $config['per_page'] = 10;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = '&raquo;';
        $config['prev_link']        = '&laquo;';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $this->pagination->initialize($config);

        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['title'] = 'SPP';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $data['pdl'] = $this->SPJ->getspp($config['per_page'], $data['page']);


        $data['pagination'] = $this->pagination->create_links();

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
        $data['spj'] = $this->SPJ->getsppdata($id);
        $data['pdl_rombongan'] = $this->PDL->getRombongan($id);
        $data['karyawan'] = $this->SPJ->getkaryawan();

        $biaya = $this->input->post('biaya');

        $idRombongan = array();


        foreach ($data['pdl_rombongan'] as $dataRombongan) {
            array_push($idRombongan, $dataRombongan['id']);
        }

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

            $this->db->where('id', $id);
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

            foreach ($namaRombongan as $index => $tmpData) {
                $datas = array(
                    'id_pdl' => $id,
                    'nama_peserta' => $tmpData,
                    'jabatan_rombongan' => $jabatanRombongan[$index],
                    'golongan_rombongan' => $golonganRombongan[$index]
                );
            }


            $tmp = -1;
            $tmp2 = -1;
            $tmp3 = 0;
            $j = 0;
            $k = 0;

            for ($i = 0; $i < count($idRombongan); $i++) {
                $array = array(
                    'uang_makans' => $biaya[$tmp += 1],
                    'makan_pagis' => $biaya[$tmp += 1],
                    'makan_siangs' => $biaya[$tmp += 1],
                    'makan_malams' => $biaya[$tmp += 1],
                    'uang_sakus' => $biaya[$tmp += 1],
                    'uang_cucians' => $biaya[$tmp += 1],
                    'penginapans' => $biaya[$tmp += 1],
                );
                // foreach ($array as $a) {
                //     echo 'Total = ' . $tmp2 += $a;
                // }
                $this->db->set($array);
                $this->db->where('id', $idRombongan[$j]);
                $this->db->update('rombongan_peserta');
                $j++;
            }
            foreach ($data['spj'] as $p) {

                $date1 = strtotime($p['tanggal_berangkat']);
                $date2 = strtotime($p['tanggal_kembali']);
                if ($date1 > $date2) {
                    $days = 0;
                    $denda = 0;
                } else {


                    // Formulate the Difference between two dates
                    $diff = abs($date2 - $date1);
                    // To get the year divide the resultant date into
                    // total seconds in a year (365*60*60*24)
                    $years = floor($diff / (365 * 60 * 60 * 24));
                    // To get the month, subtract it with years and
                    // divide the resultant date into
                    // total seconds in a month (30*60*60*24)
                    $months = floor(($diff - $years * 365 * 60 * 60 * 24)
                        / (30 * 60 * 60 * 24));
                    // To get the day, subtract it with years and
                    // months and divide the resultant date into
                    // total seconds in a days (60*60*24)
                    $days = floor(($diff - $years * 365 * 60 * 60 * 24 -
                        $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
                    $denda = (int) $days;
                }
            }


            for ($i = 0; $i < count($idRombongan); $i++) {
                $query =  $this->db->get_where('rombongan_peserta', array('id' => $idRombongan[$k]));
                $dataUangRombongan = $query->result_array();

                if ($data['spj'][0]['jenis_perjalanan'] == 'Luar Daerah') {
                    $uangMakan = $dataUangRombongan[0]['uang_makans'];
                    $penginapan = $dataUangRombongan[0]['penginapans'];
                    $uangCucian = $dataUangRombongan[0]['uang_cucians'];
                    $uangSaku = $dataUangRombongan[0]['uang_sakus'];
                    $tmpTotal =  $uangMakan + $penginapan + $uangCucian + $uangSaku;
                } else if ($data['spj'][0]['jenis_perjalanan'] == 'Dalam Daerah Dalam Mes') {

                    $makanPagi = $dataUangRombongan[0]['makan_pagis'];
                    $makanMalam = $dataUangRombongan[0]['makan_malams'];
                    $uangSaku = $dataUangRombongan[0]['uang_sakus'];
                    $tmpTotal =  $makanPagi + $makanMalam  + ($uangSaku * $denda);
                } else {
                    $makanPagi = $dataUangRombongan[0]['makan_pagis'];
                    $makanSiang = $dataUangRombongan[0]['makan_siangs'];
                    $makanMalam = $dataUangRombongan[0]['makan_malams'];
                    $uangSaku = $dataUangRombongan[0]['uang_sakus'];
                    $tmpTotal = ($makanPagi + $makanMalam  + $uangSaku) * $denda;
                }

                $this->db->set('total', $tmpTotal);
                $this->db->where('id', $idRombongan[$k]);
                $this->db->update('rombongan_peserta');
                $k++;
            }

            // die;

            // if ($this->db->affected_rows() > 0 | $this->SPJ->insertBiaya($idRombongan, $biaya) > 0) {
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your mail has been update!</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Failed to Update your mail!</div>');
            }
            redirect('SPP');
        }
    }

    public function cariRombongan()
    {
        $kategori = $this->input->post('kategori');
        $kodeunit = $this->input->post('kodeunit');
        $tanggal = $this->input->post('tanggal');
        $tanggal2 = $this->input->post('tanggal2');
        $keyword = $this->input->post('keyword');

        // echo $kategori;
        // echo $kodeunit;
        // echo $keyword;
        // die;

        if ($kategori == 'Nama Rombongan') {
            // $query = "SELECT * FROM rombongan_peserta WHERE rombongan_peserta.nama_peserta = $keyword";

            $query = 'SELECT * FROM rombongan_peserta JOIN pdl ON rombongan_peserta.id_pdl = pdl.id WHERE rombongan_peserta.nama_peserta = "' . $keyword . '"';
            $data['pdl'] = $this->db->query($query)->result_array();
            $this->dataSpj = $data['pdl'];

            $this->session->set_userdata(array('kategori' => $kategori));

            // var_dump($this->dataSpj);
            // die;

            /*
             $tmp = $this->db->get_where('rombongan_peserta', array('nama_peserta' => $keyword));
             $data['pdl'] = $tmp->result_array();

            else if ($kategori == 'Tanggal') {
                $this->db->SELECT('*');
                $this->db->FROM('pdl');
                $this->db->JOIN('rombongan_peserta', 'pdl.id = rombongan_peserta.id_pdl', 'left');
                $this->db->where('pdl.tanggal_spj', $keyword);
                $data['pdl'] =  $this->db->get()->result_array();
            } 

            */
        } else {
            /*
            $query = 'SELECT * 
                        FROM rombongan_peserta
                        JOIN pdl 
                        ON rombongan_peserta.id_pdl = pdl.id 
                        JOIN karyawan 
                        ON rombongan_peserta.nama_peserta = karyawan.nama 
                        AND rombongan_peserta.jabatan_rombongan = karyawan.jabatan 
                        WHERE karyawan.kode_unit = "' . $kodeunit . '"' . ' AND pdl.tanggal_spj = "' . $kodeunit . '"';
            */
            $query = "SELECT *
                        FROM pdl 
                        JOIN rombongan_peserta 
                        ON pdl.id = rombongan_peserta.id_pdl 
                        JOIN karyawan 
                        ON rombongan_peserta.nama_peserta = karyawan.nama 
                        AND rombongan_peserta.jabatan_rombongan = karyawan.jabatan 
                        WHERE tanggal_spj >= DATE('$tanggal') AND tanggal_spj <= DATE('$tanggal2') AND karyawan.kode_unit = '$kodeunit'";
            $data['pdl'] = $this->db->query($query)->result_array();
            $this->dataSpj = $data['pdl'];

            $this->session->set_userdata(array('kategori' => $kategori));
        }

        $data['title'] = 'SPP';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('spp/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function cetakRekap()
    {
        $data['pdl'] = $this->session->all_userdata();

        var_dump($data['pdl']);
        die;

        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "Rekap SPJ_" . date('dmY') . " .pdf";
        $this->pdf->load_view('spp/rekap', $data);
    }
}
