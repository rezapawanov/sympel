<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class jadwal_pelajaran_model extends CI_Model {


	public function jadwal_pelajaran($tahun_ajaran) {
		$q = $this->db->query("SELECT * FROM jadwal_pelajaran 
		INNER JOIN mst_mapel ON jadwal_pelajaran.id_mapel = mst_mapel.id_mapel 
		INNER JOIN mst_guru ON jadwal_pelajaran.id_guru = mst_guru.id_guru 
		INNER JOIN mst_kelas ON jadwal_pelajaran.id_kelas = mst_kelas.id_kelas 
		INNER JOIN mst_tahun_ajaran ON jadwal_pelajaran.id_tahun_ajaran = mst_tahun_ajaran.id_tahun_ajaran 

		
		
		 ORDER BY id_jadwal_pelajaran DESC");
		return $q;
	}

	
	public function jadwal_pelajaran_edit($id_jadwal) {
		$q = $this->db->query("SELECT * FROM jadwal_pelajaran WHERE id_jadwal_pelajaran = $id_jadwal");
		return $q;
	}
}