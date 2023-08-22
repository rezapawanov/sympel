<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_model extends CI_Model {

	public function lemari() {
		$q = $this->db->query("SELECT * FROM mst_lemari ORDER BY id_lemari DESC");
		return $q;
	}

	public function lemari_edit($id) {
		$q = $this->db->query("SELECT * FROM mst_lemari WHERE id_lemari = '$id'");
		return $q;
	}
	
	public function jenis_dokumen() {
		$q = $this->db->query("SELECT * FROM mst_jenis_dokumen ORDER BY id_jenis_dokumen DESC");
		return $q;
	}

	public function jenis_dokumen_edit($id) {
		$q = $this->db->query("SELECT * FROM mst_jenis_dokumen WHERE id_jenis_dokumen = '$id'");
		return $q;
	}

	public function ruangan() {
		$q = $this->db->query("SELECT * FROM mst_ruangan ORDER BY id_ruangan DESC");
		return $q;
	}

	public function ruangan_edit($id) {
		$q = $this->db->query("SELECT * FROM mst_ruangan WHERE id_ruangan = '$id'");
		return $q;
	}

	public function rak() {
		$q = $this->db->query("SELECT * FROM mst_rak ORDER BY id_rak DESC");
		return $q;
	}

	public function rak_edit($id) {
		$q = $this->db->query("SELECT * FROM mst_rak WHERE id_rak = '$id'");
		return $q;
	}

	public function box() {
		$q = $this->db->query("SELECT * FROM mst_box ORDER BY id_box DESC");
		return $q;
	}

	public function box_edit($id) {
		$q = $this->db->query("SELECT * FROM mst_box WHERE id_box = '$id'");
		return $q;
	}

	public function map() {
		$q = $this->db->query("SELECT * FROM mst_map ORDER BY id_map DESC");
		return $q;
	}

	public function map_edit($id) {
		$q = $this->db->query("SELECT * FROM mst_map WHERE id_map = '$id'");
		return $q;
	}

	public function urut() {
		$q = $this->db->query("SELECT * FROM mst_urut ORDER BY id_urut DESC");
		return $q;
	}

	public function urut_edit($id) {
		$q = $this->db->query("SELECT * FROM mst_urut WHERE id_urut = '$id'");
		return $q;
	}
}