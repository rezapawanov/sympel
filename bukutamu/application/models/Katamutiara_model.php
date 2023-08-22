<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class katamutiara_model extends CI_Model {

	public function katamutiara() {
		$q = $this->db->query("SELECT * FROM katamutiara ORDER BY id_katamutiara DESC");
		return $q;
	}

	public function katamutiara_edit($id) {
		$q = $this->db->query("SELECT * FROM katamutiara WHERE id_katamutiara = '$id'");
		return $q;
	}
}