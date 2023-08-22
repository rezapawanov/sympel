<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_model extends CI_Model {


	public function jabatan() {
		$q = $this->db->query("SELECT * FROM mst_jabatan  ORDER BY hak_akses ASC");
		return $q;
	}
}