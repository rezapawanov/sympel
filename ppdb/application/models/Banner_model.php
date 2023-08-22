<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banner_model extends CI_Model {

	public function banner() {
		$q = $this->db->query("SELECT * FROM ppdb_banner ORDER BY id_banner DESC");
		return $q;
	}

}