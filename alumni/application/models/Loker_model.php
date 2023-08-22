<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loker_model extends CI_Model {

	public function loker() {
		$q = $this->db->query("SELECT * FROM mst_loker ORDER BY id_loker DESC");
		return $q;
	}
}