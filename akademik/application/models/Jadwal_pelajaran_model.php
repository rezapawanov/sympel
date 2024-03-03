<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class jadwal_pelajaran_model extends CI_Model {


	public function jadwal_pelajaran($tahun_ajaran = null, $id_kelas = null) {
		$q = $this->db->select('*');
		$q = $this->db->from('jadwal_pelajaran');  
		$q = $this->db->join('mst_mapel', 'jadwal_pelajaran.id_mapel = mst_mapel.id_mapel', 'left');
		$q = $this->db->join('mst_guru', 'jadwal_pelajaran.id_guru = mst_guru.id_guru', 'left');
		$q = $this->db->join('mst_kelas', 'jadwal_pelajaran.id_kelas = mst_kelas.id_kelas', 'left');
		$q = $this->db->join('mst_tahun_ajaran', 'jadwal_pelajaran.id_tahun_ajaran = mst_tahun_ajaran.id_tahun_ajaran', 'left');

		if($id_kelas != null){
			$q = $this->db->where('jadwal_pelajaran.id_kelas', $id_kelas);
		}

		if ($tahun_ajaran != null) {
			$q = $this->db->where('mst_tahun_ajaran.id_tahun_ajaran', $tahun_ajaran);
		}

		$q = $this->db->order_by('id_jadwal_pelajaran', 'DESC');
		return $q->get();
	}

	
	public function jadwal_pelajaran_edit($id_jadwal) {
		$q = $this->db->query("SELECT * FROM jadwal_pelajaran WHERE id_jadwal_pelajaran = $id_jadwal");
		return $q;
	}
}