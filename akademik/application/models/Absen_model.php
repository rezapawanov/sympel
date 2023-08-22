<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Absen_model extends CI_Model {


	public function absen($tahun_ajaran) {
		$q = $this->db->query("SELECT * FROM absen 
			INNER JOIN mst_siswa ON absen.id_siswa = mst_siswa.id_siswa 
					INNER JOIN mst_kelas ON absen.id_kelas = mst_kelas.id_kelas
		
		WHERE tahun_ajaran = '$tahun_ajaran' ORDER BY tanggal_absen DESC");
		return $q;
    }
}