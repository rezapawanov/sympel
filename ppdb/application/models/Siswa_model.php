<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Siswa_model extends CI_Model {

	public function siswa() {
		$q = $this->db->query("SELECT * FROM ppdb_siswa ORDER BY id_ppdb DESC");
		return $q;
	}
}