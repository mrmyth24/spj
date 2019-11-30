<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PDL extends CI_Controller
{

    public static $idEditmail = 0;
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Pdl_model', 'PDL');
    }


    public function index()
    {
        $data['title'] = 'PDL';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['pdl'] = $this->PDL->getpdlbaru();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('PDL/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function deletemail($id)
    {
        $this->db->delete('pdl', array('id' => $id));
        $this->db->delete('rombongan_peserta', array('id_pdl' => $id));

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your mail has been deleted!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Failed to delete your mail!</div>');
        }
        redirect('PDL/index');
    }
    public function deleterombongan($id)
    {
        $this->db->delete('rombongan_peserta', array('id' => $id));

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your mail has been deleted!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Failed to delete your mail!</div>');
        }
        redirect('PDL/editmail/' . $this->session->userdata('id'));
    }

    public function editmail($id)
    {
        $dataId = [
            'id' => $id
        ];
        $this->session->set_userdata($dataId);

        $data['title'] = 'PDL';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pdl'] = $this->PDL->getdetailpdl($id);
        $data['pdl_rombongan'] = $this->PDL->getRombongan($id);

        $this->form_validation->set_rules('nomor', 'Nomor', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required');
        $this->form_validation->set_rules('jenis_perjalanan', 'Jenis_Perjalanan', 'required');
        $this->form_validation->set_rules('keperluan', 'Keperluan', 'required');
        $this->form_validation->set_rules('tanggal_berangkat', 'Tanggal_Berangkat', 'required');
        $this->form_validation->set_rules('tanggal_kembali', 'Tanggal_Kembali', 'required');
        $this->form_validation->set_rules('ditujukan_kepada', 'Ditujukan_Kepada', 'required');
        $this->form_validation->set_rules('jabatan_penandatanganan', 'Jabatan_Penandatanganan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('PDL/editmail', $data);
            $this->load->view('templates/footer');
        } else {
            $nomor = $this->input->post('nomor');
            $tanggal = $this->input->post('tanggal');
            $tujuan = $this->input->post('tujuan');
            $jenis_perjalanan = $this->input->post('jenis_perjalanan');
            $keperluan = $this->input->post('keperluan');
            $tanggal_berangkat = $this->input->post('tanggal_berangkat');
            $tanggal_kembali = $this->input->post('tanggal_kembali');
            $ditujukan_kepada = $this->input->post('ditujukan_kepada');
            $jabatan_penandatanganan = $this->input->post('jabatan_penandatanganan');

            $this->db->set('nomor', $nomor);
            $this->db->set('tanggal', $tanggal);
            $this->db->set('tujuan', $tujuan);
            $this->db->set('jenis_perjalanan', $jenis_perjalanan);
            $this->db->set('keperluan', $keperluan);
            $this->db->set('tanggal_berangkat', $tanggal_berangkat);
            $this->db->set('tanggal_kembali', $tanggal_kembali);
            $this->db->set('ditujukan_kepada', $ditujukan_kepada);
            $this->db->set('jabatan_penandatanganan', $jabatan_penandatanganan);
            $this->db->where('id', $id);
            $this->db->update('pdl');

            // $lastInsertID = $this->db->insert_id();

            $namaRombongan = $this->input->post('nama_rombongan');
            $jabatanRombongan = $this->input->post('jabatan_rombongan');
            $golonganRombongan = $this->input->post('golongan_rombongan');

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your mail has been update!</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Failed to Update your mail!</div>');
            }
            redirect('PDL');
        }
    }

    public function addmail()
    {

        $data['title'] = 'PDL';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pdl'] = $this->db->get('pdl')->result_array();
        $data['karyawan'] = $this->PDL->getkaryawan();

        $this->form_validation->set_rules('nomor', 'Nomor', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required');
        $this->form_validation->set_rules('jenis_perjalanan', 'Jenis_Perjalanan', 'required');
        $this->form_validation->set_rules('keperluan', 'Keperluan', 'required');
        $this->form_validation->set_rules('tanggal_berangkat', 'Tanggal_Berangkat', 'required');
        $this->form_validation->set_rules('tanggal_kembali', 'Tanggal_Kembali', 'required');
        $this->form_validation->set_rules('ditujukan_kepada', 'Ditujukan_Kepada', 'required');
        $this->form_validation->set_rules('jabatan_penandatanganan', 'Jabatan_Penandatanganan', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('PDL/addmail', $data);
            $this->load->view('templates/footer', $data);
        } else {

            $this->db->insert('pdl', [

                'nomor' => $this->input->post('nomor'),
                'tanggal' => $this->input->post('tanggal'),
                'tujuan' => $this->input->post('tujuan'),
                'jenis_perjalanan' => $this->input->post('jenis_perjalanan'),
                'keperluan' => $this->input->post('keperluan'),
                'tanggal_berangkat' => $this->input->post('tanggal_berangkat'),
                'tanggal_kembali' => $this->input->post('tanggal_kembali'),
                'ditujukan_kepada' => $this->input->post('ditujukan_kepada'),
                'jabatan_penandatanganan' => $this->input->post('jabatan_penandatanganan'),
                'status' => '0'

            ]);
            $lastInsertID = $this->db->insert_id();

            $namaRombongan = $this->input->post('nama_rombongan');
            $jabatanRombongan = $this->input->post('jabatan_rombongan');
            $golonganRombongan = $this->input->post('golongan_rombongan');

            foreach ($namaRombongan as $index => $data) {
                $this->db->insert('rombongan_peserta', array(
                    'id_pdl' => $lastInsertID,
                    'nama_peserta' => $data,
                    'jabatan_rombongan' => $jabatanRombongan[$index],
                    'golongan_rombongan' => $golonganRombongan[$index]
                ));
            }

            // var_dump($dataNamaR);
            // var_dump($dataJabatanR);
            // die();

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New Mail added!</div>');
            redirect('PDL');
        }
    }

    public function getJabatan()
    {
        $nama = $this->input->post('nama');
        $data = $this->PDL->getJabatan($nama);
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
        $data = $this->PDL->getJabatanPenandatanganan($nama);
        echo json_encode($data);
    }

    public function pdlatmi($id)
    {
        $data['title'] = 'PDL';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pdl'] = $this->PDL->getdetailpdl($id);

        $this->db->set('status', '1');
        $this->db->where('id', $id);
        $this->db->update('pdl');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your mail has been sent to KABAG/Penanggung Jawab Sementara!</div>');
        redirect('PDL');
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

    public function getDataKaryawanByName()
    {
        $nama = $this->input->post('nama');
        $data = $this->PDL->getDataByName($nama);
        if ($data) {
            echo json_encode($data);
        } else {
            echo 'null';
        }
    }

    public function tambahRombongan()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $jabatan = $this->input->post('jabatan');
        $golongan = $this->input->post('golongan');

        $this->db->set('id_pdl', $id);
        $this->db->set('nama_peserta', $nama);
        $this->db->set('jabatan_rombongan', $jabatan);
        $this->db->set('golongan_rombongan', $golongan);

        $this->db->insert('rombongan_peserta');
    }
}
