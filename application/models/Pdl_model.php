<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pdl_model extends CI_Model
{
    public function getpdl()
    {
        $query = "SELECT * FROM pdl ";
        return $this->db->query($query)->result_array();
    }
    public function getpdlbaru()
    {
        $query = "SELECT * FROM pdl WHERE status = 0 ";
        return $this->db->query($query)->result_array();
    }
    public function getpdlbyname($nama)
    {
        $query = "SELECT * FROM `pdl` LEFT JOIN `rombongan_peserta` ON pdl.id = rombongan_peserta.id_pdl WHERE rombongan_peserta.nama_peserta = '$nama'";
        // $query = "SELECT * FROM `pdl` LEFT JOIN `rombongan_peserta` ON pdl.id = rombongan_peserta.id_pdl WHERE pdl.nama = '$nama'";
        return $this->db->query($query)->result_array();
    }
    public function getpdlbyrombongan($nama)
    {
        $query = "SELECT * FROM `pdl` LEFT JOIN `rombongan_peserta` ON pdl.id = rombongan_peserta.id_pdl WHERE rombongan_peserta.nama_peserta = '$nama'";
        return $this->db->query($query)->result_array();
    }
    public function getpdlpjsbyname($nama)
    {
        $query = "SELECT * FROM `pdl` LEFT JOIN `user` ON user.name = pdl.ditujukan_kepada WHERE status = 1 AND user.name ='$nama'";
        return $this->db->query($query)->result_array();
    }

    public function getpdlpjs()
    {
        $query = "SELECT * FROM `pdl` WHERE status = 1";
        return $this->db->query($query)->result_array();
    }

    public function getpdldirut()
    {
        $query = "SELECT * FROM pdl WHERE status = 2 ";
        return $this->db->query($query)->result_array();
    }


    public function getpdlseedirut()
    {
        $query = "SELECT * FROM pdl WHERE status = 2 ";
        return $this->db->query($query)->row_array();
    }

    public function getpdlsee()
    {
        $query = "SELECT * FROM pdl WHERE status = 1 ";
        return $this->db->query($query)->row_array();
    }


    public function getdetailpdl($id)
    {
        $query = "SELECT * FROM pdl WHERE id = $id";
        return $this->db->query($query)->row_array();
    }
    public function getdetailpeserta($id)
    {
        $query = "SELECT * FROM rombongan_peserta WHERE id = $id ";
        return $this->db->query($query)->row_array();
    }

    public function getkaryawan()
    {
        $query = "SELECT * FROM karyawan ";
        return $this->db->query($query)->result_array();
    }

    public function getJabatan($nama)
    {
        $hasil = $this->db->query("SELECT * FROM karyawan WHERE nama='$nama'");
        return $hasil->result();
    }
    public function getGolongan($nama)
    {
        $hasil = $this->db->query("SELECT * FROM karyawan WHERE nama='$nama'");
        return $hasil->result();
    }
    public function getJabatanPenandatanganan($ditunjukkan_kepada)
    {
        $hasil = $this->db->query("SELECT * FROM karyawan WHERE nama='$ditunjukkan_kepada'");
        return $hasil->result();
    }
    public function getDataByName($nama)
    {
        $hasil = $this->db->query("SELECT * FROM karyawan WHERE nama='$nama'");
        return $hasil->result();
    }

    public function getRombongan($id)
    {
        $hasil = $this->db->query("SELECT * FROM rombongan_peserta WHERE id_pdl = $id");
        return $hasil->result_array();
    }
}
