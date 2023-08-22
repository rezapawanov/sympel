<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cetak_model extends CI_Model {


	public function walikelas($id_guru) {
		$q = $this->db->query("SELECT * FROM vw_walikelas WHERE id_guru = '$id_guru' ORDER BY id_walikelas DESC");
		return $q;
	}
		
	public function raport($id_kelas,$id_tahun_ajaran) {
		$q = $this->db->query("SELECT id_nilai_raport, nama_siswa, nis, jenis_kelamin FROM nilai_raport 
                                INNER JOIN jadwal_pelajaran ON nilai_raport.id_jadwal_pelajaran = jadwal_pelajaran.id_jadwal_pelajaran 
                                INNER JOIN mst_siswa ON nilai_raport.id_siswa = mst_siswa.id_siswa WHERE jadwal_pelajaran.id_kelas = '$id_kelas' AND id_tahun_ajaran = '$id_tahun_ajaran' ORDER BY nama_siswa ASC");
		return $q;
    }
    
 
}