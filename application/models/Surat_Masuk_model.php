<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_Masuk_model extends CI_Model
{
	public function getsuratmasuk(){
		$query = "SELECT * FROM surat_masuk WHERE hapus = '0'";
		return $this->db->query($query)->result_array();
	}

	public function gettrash(){
		$query = "SELECT * FROM surat_masuk WHERE hapus = '1'";
		return $this->db->query($query)->result_array();
	}

	public function getdetailsuratmasuk($id){
		$query = "SELECT * FROM surat_masuk WHERE id_surat_masuk = $id ";
		return $this->db->query($query)->row_array();
	}

	public function getsubmenu(){
		$query = "SELECT user_sub_menu.*, user_menu.menu
				FROM user_sub_menu JOIN user_menu
				ON user_sub_menu.menu_id = user_menu.id
				";
		return $this->db->query($query)->result_array();
	}

	public function getdetailsubmenu($id){
		$query = "SELECT user_sub_menu.*, user_menu.menu
				FROM user_sub_menu JOIN user_menu
				ON user_sub_menu.menu_id = user_menu.id
				WHERE user_sub_menu.id = $id
				";
		return $this->db->query($query)->row_array();
	}

}
