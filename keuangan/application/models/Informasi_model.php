<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Informasi_model extends CI_Model {


	public function informasi_keuangan() {
		$q = $this->db->query("SELECT * FROM mst_informasi_keuangan ORDER BY id_informasi DESC");
		return $q;
    }
}