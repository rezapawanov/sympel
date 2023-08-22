<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Minyak_masuk_model extends CI_Model {


	public function minyak_masuk($tahun_ajaran) {
		$q = $this->db->query("SELECT * FROM minyak_masuk 
		 ORDER BY id_mm DESC");
		return $q;
	}

	public function minyak_masuk_edit($id) {
		$q = $this->db->query("SELECT * FROM minyak_masuk 
WHERE id_mm = '$id'");
		return $q;
	}

	public function minyak_masuk_id($id_siswa,$tahun_ajaran) {
		$q = $this->db->query("SELECT * FROM dt_minyak_masuk
  ORDER BY id_mm DESC");
return $q;


	}


	public function total($tahun_ajaran) {
		$q = $this->db->query("SELECT * FROM minyak_masuk
  ORDER BY id_mm DESC");
return $q;

}


}