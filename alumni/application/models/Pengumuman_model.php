<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengumuman_model extends CI_Model {

	public function pengumuman() {
		$q = $this->db->query("SELECT * FROM mst_pengumuman_alumni ORDER BY id_pengumuman DESC");
		return $q;
	}
}