<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_model extends CI_Model {


	public function buku() {
		$q = $this->db->query("SELECT * FROM mst_buku 
								LEFT JOIN mst_kategori ON mst_buku.id_kategori = mst_kategori.id_kategori 
								LEFT JOIN mst_sumber ON mst_buku.id_sumber = mst_sumber.id_sumber
								ORDER BY id_buku DESC");
		return $q;
	}

	public function kategori() {
		$q = $this->db->query("SELECT * FROM mst_kategori ORDER BY id_kategori DESC");
		return $q;
	}

	public function sumber() {
		$q = $this->db->query("SELECT * FROM mst_sumber ORDER BY id_sumber DESC");
		return $q;
	}

	public function pengunjung_today() {
		$tgl_awal = date("Y-m-d");
		$tgl_akhir = date("Y-m-d");
		$q = $this->db->query("SELECT * FROM pengunjung_perpus 
								INNER JOIN mst_siswa ON pengunjung_perpus.nis = mst_siswa.nis 
								INNER JOIN mst_kelas ON pengunjung_perpus.id_kelas = mst_kelas.id_kelas  WHERE date(tanggal) between date('$tgl_awal') and date('$tgl_akhir') ORDER BY tanggal DESC");
		return $q;
	}


	public function book() {
		$q = $this->db->query("SELECT * FROM mst_book  
								LEFT JOIN mst_kategori ON mst_book.id_kategori = mst_kategori.id_kategori 
								LEFT JOIN mst_sumber ON mst_book.id_sumber = mst_sumber.id_sumber ");
		return $q;
	}

}