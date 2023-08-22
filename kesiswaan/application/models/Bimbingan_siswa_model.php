<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bimbingan_siswa_model extends CI_Model {


	public function bimbingan_siswa($tahun_ajaran) {
		$q = $this->db->query("SELECT * FROM bimbingan_siswa 
					INNER JOIN mst_siswa ON bimbingan_siswa.id_siswa = mst_siswa.id_siswa 
					INNER JOIN mst_kelas ON bimbingan_siswa.id_kelas = mst_kelas.id_kelas 

		WHERE tahun_ajaran = '$tahun_ajaran' ORDER BY id_bimbingan_siswa DESC");
		return $q;
	}

	public function bimbingan_siswa_edit($id) {
		$q = $this->db->query("SELECT * FROM bimbingan_siswa 
		INNER JOIN mst_siswa ON bimbingan_siswa.id_siswa = mst_siswa.id_siswa 
					INNER JOIN mst_kelas ON bimbingan_siswa.id_kelas = mst_kelas.id_kelas 

WHERE id_bimbingan_siswa = '$id'");
		return $q;
	}

	public function bimbingan_siswa_id($id_siswa,$tahun_ajaran) {
		$q = $this->db->query("SELECT * FROM bimbingan_siswa 
		INNER JOIN mst_kelas ON bimbingan_siswa.id_kelas = mst_kelas.id_kelas 
WHERE id_siswa = '$id_siswa' AND tahun_ajaran = '$tahun_ajaran' ORDER BY id_bimbingan_siswa DESC");
return $q;
	}
}