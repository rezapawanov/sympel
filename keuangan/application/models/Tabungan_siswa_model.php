<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tabungan_siswa_model extends CI_Model {


	public function tabungan_siswa($tahun_ajaran) {
		$q = $this->db->query("SELECT * FROM tabungan_siswa 
					INNER JOIN mst_siswa ON tabungan_siswa.id_siswa = mst_siswa.id_siswa 
					INNER JOIN mst_kelas ON tabungan_siswa.id_kelas = mst_kelas.id_kelas 

		WHERE tahun_ajaran = '$tahun_ajaran' ORDER BY id_tabungan_siswa DESC");
		return $q;
	}

	public function tabungan_siswa_edit($id) {
		$q = $this->db->query("SELECT * FROM tabungan_siswa 
		INNER JOIN mst_siswa ON tabungan_siswa.id_siswa = mst_siswa.id_siswa 
					INNER JOIN mst_kelas ON tabungan_siswa.id_kelas = mst_kelas.id_kelas 

WHERE id_tabungan_siswa = '$id'");
		return $q;
	}

	public function tabungan_siswa_id($id_siswa,$tahun_ajaran) {
		$q = $this->db->query("SELECT * FROM dt_tabungan_siswa
				INNER JOIN mst_siswa ON dt_tabungan_siswa.id_siswa = mst_siswa.id_siswa 
		INNER JOIN mst_kelas ON dt_tabungan_siswa.id_kelas = mst_kelas.id_kelas 
 AND tahun_ajaran = '$tahun_ajaran' ORDER BY id_tabungan_siswa DESC");
return $q;


	}


	public function total($id_siswa,$tahun_ajaran) {
		$q = $this->db->query("SELECT * FROM tabungan_siswa
				INNER JOIN mst_siswa ON tabungan_siswa.id_siswa = mst_siswa.id_siswa 
		INNER JOIN mst_kelas ON tabungan_siswa.id_kelas = mst_kelas.id_kelas 
 AND tahun_ajaran = '$tahun_ajaran' ORDER BY id_tabungan_siswa DESC");
return $q;

}

public function belanja_siswa_id($id_siswa,$tahun_ajaran) {
	$q = $this->db->query("SELECT * FROM belanja_siswa 
					INNER JOIN mst_siswa ON belanja_siswa.id_siswa = mst_siswa.id_siswa 
	INNER JOIN mst_kelas ON belanja_siswa.id_kelas = mst_kelas.id_kelas 
 AND tahun_ajaran = '$tahun_ajaran' ORDER BY id_belanja_siswa DESC");
return $q;
}

}