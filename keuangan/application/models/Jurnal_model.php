<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jurnal_model extends CI_Model {

	public function penerimaan() {
		$q = $this->db->query("SELECT * FROM penerimaan ORDER BY id_penerimaan DESC");
		return $q;
	}

	public function penerimaan_edit($id) {
		$q = $this->db->query("SELECT * FROM penerimaan WHERE id_penerimaan = '$id'");
		return $q;
	}

	public function pengeluaran() {
		$q = $this->db->query("SELECT * FROM pengeluaran ORDER BY id_pengeluaran DESC");
		return $q;
	}

	public function pengeluaran_edit($id) {
		$q = $this->db->query("SELECT * FROM pengeluaran WHERE id_pengeluaran = '$id'");
		return $q;
	}
}