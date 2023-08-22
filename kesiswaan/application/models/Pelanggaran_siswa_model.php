<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pelanggaran_siswa_model extends CI_Model {


	public function pelanggaran_siswa($tahun_ajaran) {
		$q = $this->db->query("SELECT * FROM pelanggaran_siswa 
					INNER JOIN mst_siswa ON pelanggaran_siswa.id_siswa = mst_siswa.id_siswa 
					INNER JOIN mst_kelas ON pelanggaran_siswa.id_kelas = mst_kelas.id_kelas 
					INNER JOIN mst_poin_pelanggaran ON pelanggaran_siswa.id_poin_pelanggaran = mst_poin_pelanggaran.id_poin_pelanggaran 

		WHERE tahun_ajaran = '$tahun_ajaran' ORDER BY id_pelanggaran_siswa DESC");
		return $q;
	}

	public function pelanggaran_siswa_edit($id) {
		$q = $this->db->query("SELECT * FROM pelanggaran_siswa 
		INNER JOIN mst_siswa ON pelanggaran_siswa.id_siswa = mst_siswa.id_siswa 
					INNER JOIN mst_kelas ON pelanggaran_siswa.id_kelas = mst_kelas.id_kelas 
					INNER JOIN mst_poin_pelanggaran ON pelanggaran_siswa.id_poin_pelanggaran = mst_poin_pelanggaran.id_poin_pelanggaran 

WHERE id_pelanggaran_siswa = '$id'");
		return $q;
	}

	public function pelanggaran_siswa_id($id_siswa,$tahun_ajaran) {
		$q = $this->db->query("SELECT * FROM pelanggaran_siswa 
					INNER JOIN mst_kelas ON pelanggaran_siswa.id_kelas = mst_kelas.id_kelas 
					INNER JOIN mst_poin_pelanggaran ON pelanggaran_siswa.id_poin_pelanggaran = mst_poin_pelanggaran.id_poin_pelanggaran 
WHERE id_siswa = '$id_siswa' AND tahun_ajaran = '$tahun_ajaran' ORDER BY id_pelanggaran_siswa DESC");
		return $q;
	}
}