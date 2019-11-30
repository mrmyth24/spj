<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SPJ extends CI_Controller
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
        $data['title'] = 'SPJ';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // $data['spj'] = $this->SPJ->getspj();

        $data['spj'] = $this->SPJ->getspjacc();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('SPJ/index', $data);
        $this->load->view('templates/footer', $data);
    }


    public function downloadmail($id)
    {

        $this->load->helper('download');
        $data['spj'] = $this->SPJ->getspjacc($id);
        if ($data['spj']) {
            $surat   = file_get_contents('./assets/upload/suratmasuk/' . $data['pdl']['bukti']);
        }
        $name   = $data['pdl']['bukti'];
        force_download($name, $surat);
    }

    public function viewbuktisurat($id)
    {
        $data['pdl'] = $this->PDL->getdetailpdl($id);

        $file = $data['pdl']['bukti'];

        $filename = "./assets/upload/suratmasuk/" . $file;
        header("Content-type: application/pdf");
        header("Content-Length: " . filesize($filename));
        readfile($filename);
    }

    public function addmail($id)
    {

        $data['title'] = 'SPJ';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['spj'] = $this->SPJ->getdetailspj($id);
        $data['pdl_rombongan'] = $this->PDL->getRombongan($id);
        $data['karyawan'] = $this->SPJ->getkaryawan();

        $this->form_validation->set_rules('nomor', 'Nomor', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required');
        $this->form_validation->set_rules('keperluan', 'Keperluan', 'required');
        $this->form_validation->set_rules('tanggal_berangkat', 'Tanggal_Berangkat', 'required');
        $this->form_validation->set_rules('tanggal_kembali', 'Tanggal_Kembali', 'required');
        $this->form_validation->set_rules('ditujukan_kepada', 'Ditujukan_Kepada', 'required');
        $this->form_validation->set_rules('jabatan_penandatanganan', 'Jabatan_Penandatanganan', 'required');
        $this->form_validation->set_rules('nomor_spj', 'Nomor_SPJ', 'required');
        $this->form_validation->set_rules('tanggal_spj', 'Tanggal_SPJ', 'required');
        $this->form_validation->set_rules('tipe_keperluan', 'Tipe_Keperluan', 'required');
        $this->form_validation->set_rules('jenis_kendaraan', 'Jenis_Kendaraan', 'required');
        $this->form_validation->set_rules('no_polis', 'No_Polis', 'required');
        $this->form_validation->set_rules('pengemudi', 'Jabatan_Penandatanganan', 'required');
        $this->form_validation->set_rules('ditanggung_perusahaan', 'Ditanggung_Perusahaan', 'required');
        $this->form_validation->set_rules('lain_lain', 'Lain-Lain', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('SPJ/addmail', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->db->where('id', $id);
            $this->db->update('pdl', [

                'nomor' => $this->input->post('nomor'),
                'tanggal' => $this->input->post('tanggal'),
                'tujuan' => $this->input->post('tujuan'),
                'keperluan' => $this->input->post('keperluan'),
                'tanggal_berangkat' => $this->input->post('tanggal_berangkat'),
                'tanggal_kembali' => $this->input->post('tanggal_kembali'),
                'ditujukan_kepada' => $this->input->post('ditujukan_kepada'),
                'jabatan_penandatanganan' => $this->input->post('jabatan_penandatanganan'),
                'nomor_spj' => $this->input->post('nomor_spj'),
                'tanggal_spj' => $this->input->post('tanggal_spj'),
                'tipe_keperluan' => $this->input->post('tipe_keperluan'),
                'jenis_kendaraan' => $this->input->post('jenis_kendaraan'),
                'no_polis' => $this->input->post('no_polis'),
                'pengemudi' => $this->input->post('pengemudi'),
                'ditanggung_perusahaan' => $this->input->post('ditanggung_perusahaan'),
                'lain_lain' => $this->input->post('lain_lain'),
                'status' => '3'

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
            redirect('SPJ');
        }
    }

    public function getJabatan()
    {
        $nama = $this->input->post('nama');
        $data = $this->SPJ->getJabatan($nama);
        echo json_encode($data);
    }
    public function getGolongan()
    {
        $nama = $this->input->post('nama');
        $data = $this->PDL->getGolongan($nama);
        echo json_encode($data);
    }
    public function getJabatanPenandatanganan()
    {
        $nama = $this->input->post('ditunjukkan_kepada');
        $data = $this->SPJ->getJabatanPenandatanganan($nama);
        echo json_encode($data);
    }

    public function getJabatanPenandatangananspj()
    {
        $nama = $this->input->post('penandatangan_spj');
        $data = $this->SPJ->getJabatanPenandatangananspj($nama);
        echo json_encode($data);
    }
    public function getJabatanRombongan()
    {
        $nama = $this->input->post('nama_rombongan');
        $data = $this->SPJ->getJabatanPenandatangananspj($nama);
        echo json_encode($data);
    }

    public function pdlspj($id)
    {
        $data['title'] = 'SPJ';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['spj'] = $this->SPJ->getspj($id);

        $this->db->set('status', '4');
        $this->db->where('id', $id);
        $this->db->update('pdl');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your mail has been sent to Direksi!</div>');
        redirect('SPJ');
    }

    public function pdlspjbukti($id)
    {
        $data['title'] = 'SPJ';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['spj'] = $this->SPJ->getspj($id);

        $this->db->set('status', '7');
        $this->db->where('id', $id);
        $this->db->update('pdl');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> SPJ Sudah Di ACC!</div>');
        redirect('SPJ');
    }

    public function search()
    {
        $text = $this->input->get('t');
        $searchText = $this->input->post('query');
        $query = "SELECT * FROM karyawan WHERE nama LIKE '$searchText%'";
        $result = $this->db->query($query);

        // var_dump($result->result_array());
        // die();

        if ($result->num_rows() > 0) {
            $row['isi'] = $result->result_array();
            foreach ($row['isi'] as $nama) {
                echo "<option>" . $nama['nama'] . "</option>";
            }
            echo '<br/>';
        } else {
            echo "null";
        }
    }
}
