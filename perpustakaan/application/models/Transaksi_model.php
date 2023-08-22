<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi_model extends CI_Model {


	public function peminjaman_dt($id_siswa) {
		$q = $this->db->query("SELECT * FROM peminjaman_buku_dt 
								INNER JOIN peminjaman_buku ON peminjaman_buku_dt.id_peminjaman = peminjaman_buku.id_peminjaman
								INNER JOIN mst_buku ON peminjaman_buku_dt.id_buku = mst_buku.id_buku WHERE id_siswa = '$id_siswa' AND peminjaman_buku.status_input != 1 ORDER BY id_peminjaman_dt DESC");
		return $q;
	}


	public function pengembalian_dt($id_siswa) {
		$q = $this->db->query("SELECT * FROM peminjaman_buku_dt 
								INNER JOIN peminjaman_buku ON peminjaman_buku_dt.id_peminjaman = peminjaman_buku.id_peminjaman
								INNER JOIN mst_buku ON peminjaman_buku_dt.id_buku = mst_buku.id_buku WHERE id_siswa = '$id_siswa' AND peminjaman_buku.status_input = 1 ORDER BY id_peminjaman_dt DESC");
		return $q;
	}


	public function peminjaman() {
		$q = $this->db->query("SELECT * FROM peminjaman_buku_dt 
		INNER JOIN peminjaman_buku ON peminjaman_buku_dt.id_peminjaman = peminjaman_buku.id_peminjaman 
		INNER JOIN mst_siswa ON peminjaman_buku.id_siswa = mst_siswa.id_siswa
		INNER JOIN mst_buku ON peminjaman_buku_dt.id_buku = mst_buku.id_buku WHERE  peminjaman_buku.status_input = 1  ORDER BY id_peminjaman_dt DESC");
		return $q;
	}

	public function peminjaman_denda() {
		$q = $this->db->query("SELECT * FROM peminjaman_buku_dt 
		INNER JOIN peminjaman_buku ON peminjaman_buku_dt.id_peminjaman = peminjaman_buku.id_peminjaman 
		INNER JOIN mst_siswa ON peminjaman_buku.id_siswa = mst_siswa.id_siswa
		INNER JOIN mst_buku ON peminjaman_buku_dt.id_buku = mst_buku.id_buku WHERE  peminjaman_buku.status_input = 1 AND telat > 0 ORDER BY id_peminjaman_dt DESC");
		return $q;
	}
}