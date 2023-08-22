<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alumni_model extends CI_Model {


	public function alumin() {
		$q = $this->db->query("SELECT * FROM mst_alumni WHERE status_aktif = '0' ORDER BY id_alumni DESC");
		return $q;
    }
}