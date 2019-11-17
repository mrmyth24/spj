<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Spj_model extends CI_Model
{
    public function getspj()
    {
        $query = "SELECT * FROM pdl WHERE status = 3";
        return $this->db->query($query)->result_array();
    }
    public function getspjacc()
    {
        $query = "SELECT * FROM pdl WHERE status = 3 OR status = 6";
        return $this->db->query($query)->result_array();
    }
    public function getspjbyname($nama)
    {
        $query = "SELECT * FROM `pdl` LEFT JOIN `user` ON user.name = pdl.ditujukan_kepada WHERE user.name ='$nama'";
        return $this->db->query($query)->result_array();
    }
    public function getdetailspj($id)
    {
        $query = "SELECT * FROM pdl WHERE id = $id ";
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

    public function getJabatanPenandatangananspj($penandatangan_spj)
    {
        $hasil = $this->db->query("SELECT * FROM karyawan WHERE nama='$penandatangan_spj'");
        return $hasil->result();
    }
    public function getJabatanRombongan($nama_rombongan)
    {
        $hasil = $this->db->query("SELECT * FROM karyawan WHERE nama='$nama_rombongan'");
        return $hasil->result();
    }
    public function getspjdireksi()
    {
        $query = "SELECT * FROM pdl WHERE status = 4 ";
        return $this->db->query($query)->result_array();
    }
    public function getspp()
    {
        $query = "SELECT * FROM pdl WHERE status = 7 ";
        return $this->db->query($query)->result_array();
    }
    public function getspjdireksisee()
    {
        $query = "SELECT * FROM pdl WHERE status = 4 ";
        return $this->db->query($query)->row_array();
    }
    public function getspjsee()
    {
        $query = "SELECT * FROM pdl";
        return $this->db->query($query)->row_array();
    }
}
