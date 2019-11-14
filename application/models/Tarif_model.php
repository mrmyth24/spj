<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tarif_model extends CI_Model
{
    public function gettarif()
    {
        $query = "SELECT * FROM tarifspj";
        return $this->db->query($query)->result_array();
    }

    public function getdetailtarif($id)
    {
        $query = "SELECT * FROM tarifspj WHERE id = $id ";
        return $this->db->query($query)->row_array();
    }
}
