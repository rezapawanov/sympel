<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengguna_model extends CI_Model {


	public function guru() {
		$q = $this->db->query("SELECT * FROM mst_guru");
		return $q;
	}

	
	public function guru_detail($nip) {
		$q = $this->db->query("SELECT * FROM mst_guru WHERE nip = '$nip'");
		return $q;
	}
	
	public function guru_edit($id_guru) {
		$q = $this->db->query("SELECT * FROM mst_guru WHERE id_guru = '$id_guru'");
		return $q;
	}

	public function kepala_sekolah() {
		$q = $this->db->query("SELECT * FROM mst_kepala_sekolah");
		return $q;
	}

	public function kepala_sekolah_detail($nip) {
		$q = $this->db->query("SELECT * FROM mst_kepala_sekolah WHERE nip = '$nip'");
		return $q;
	}

	public function kepala_sekolah_edit($id_kepala_sekolah) {
		$q = $this->db->query("SELECT * FROM mst_kepala_sekolah WHERE id_kepala_sekolah = '$id_kepala_sekolah'");
		return $q;
	}

	public function staff() {
		$q = $this->db->query("SELECT * FROM mst_staff");
		return $q;
	}

	
	public function staff_detail($nip) {
		$q = $this->db->query("SELECT * FROM mst_staff WHERE nip = '$nip'");
		return $q;
	}
	
	public function staff_edit($id_staff) {
		$q = $this->db->query("SELECT * FROM mst_staff WHERE id_staff = '$id_staff'");
		return $q;
	}
}