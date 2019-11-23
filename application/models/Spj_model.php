<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Spj_model extends CI_Model
{
    public function getsppdata($id)
    {
        $query = "SELECT * FROM `pdl` JOIN `rombongan_peserta` on pdl.id = rombongan_peserta.id_pdl JOIN `golongan` ON rombongan_peserta.golongan_rombongan = golongan.golongan JOIN `tarifspj`ON golongan.kelompok_golongan = tarifspj.kelompok_golongan AND pdl.jenis_perjalanan = tarifspj.jenis_perjalanan WHERE pdl.id = $id";
        return $this->db->query($query)->result_array();
    }
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
    public function getspp($limit, $start)
    {
        $query = $this->db->get_where('pdl', array('status' => 7), $limit, $start);
        // $query = "SELECT * FROM pdl WHERE status = 7 ";
        return $query->result_array();
    }
    public function getspjdireksisee()
    {
        $query = "SELECT * FROM pdl WHERE status = 4 ";
        return $this->db->query($query)->row_array();
    }
    public function getspjsee($id)
    {
        $query = "SELECT * FROM pdl WHERE id=$id";
        return $this->db->query($query)->row_array();
    }
    public function insertBiaya($idRombongan, $data)
    {
        $tmp = -1;
        $j = 0;
        for ($i = 0; $i < count($idRombongan); $i++) {
            $array = array(
                'uang_makans' => $data[$tmp += 1],
                'makan_pagis' => $data[$tmp += 1],
                'makan_siangs' => $data[$tmp += 1],
                'makan_malams' => $data[$tmp += 1],
                'uang_sakus' => $data[$tmp += 1],
                'uang_cucians' => $data[$tmp += 1],
                'penginapans' => $data[$tmp += 1],
            );
            $this->db->set($array);
            $this->db->where('id', $idRombongan[$j]);
            $this->db->update('rombongan_peserta');
            $j++;
            return ($this->db->affected_rows() != 1) ? false : true;
        }
    }
}
