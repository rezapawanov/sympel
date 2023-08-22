<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kelulusan_model extends CI_Model {

	public function kelulusan() {
		$q = $this->db->query("SELECT * FROM ppdb_kelulusan ORDER BY id_kelulusan DESC");
		return $q;
	}
}