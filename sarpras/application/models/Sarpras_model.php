<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sarpras_model extends CI_Model {


	public function sarpras() {
		$q = $this->db->query("SELECT * FROM sarpras 
									INNER JOIN mst_jenis_barang ON sarpras.id_jenis_barang = mst_jenis_barang.id_jenis_barang 
									INNER JOIN mst_ruangan ON sarpras.id_ruangan = mst_ruangan.id_ruangan 
									INNER JOIN mst_lemari ON sarpras.id_lemari = mst_lemari.id_lemari 
									INNER JOIN mst_rak ON sarpras.id_rak = mst_rak.id_rak 
									INNER JOIN mst_box ON sarpras.id_box = mst_box.id_box 
									INNER JOIN mst_map ON sarpras.id_map = mst_map.id_map 
									INNER JOIN mst_urut ON sarpras.id_urut = mst_urut.id_urut ORDER BY id_sarpras DESC");
		return $q;
	}

	public function sarpras_edit($id) {
		$q = $this->db->query("SELECT * FROM sarpras WHERE id_sarpras = '$id'");
		return $q;
	}
}