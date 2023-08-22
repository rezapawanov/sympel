<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_model extends CI_Model {

	public function siswa($id_kelas) {
		$q = $this->db->query("SELECT * FROM mst_siswa  
		INNER JOIN mst_kelas ON mst_siswa.id_kelas = mst_kelas.id_kelas
ORDER BY nama_siswa ASC");
		return $q;
	}

	public function siswa_detail($nis) {
		$q = $this->db->query("SELECT * FROM mst_siswa
				INNER JOIN mst_kelas ON mst_siswa.id_kelas = mst_kelas.id_kelas

		
		 WHERE nis = '$nis'");
		return $q;
	}

	public function peminjaman($tgl_awal, $tgl_akhir) {
		$q = $this->db->query("SELECT * FROM peminjaman_buku_dt 
								INNER JOIN peminjaman_buku ON peminjaman_buku_dt.id_peminjaman = peminjaman_buku.id_peminjaman 
								INNER JOIN mst_siswa ON peminjaman_buku.id_siswa = mst_siswa.id_siswa
								INNER JOIN mst_buku ON peminjaman_buku_dt.id_buku = mst_buku.id_buku WHERE  peminjaman_buku.status_input = 1 AND tanggal_pinjam >= '$tgl_awal' AND tanggal_pinjam <= '$tgl_akhir' ORDER BY id_peminjaman_dt DESC");
		return $q;
	}

	public function buku() {
		$q = $this->db->query("SELECT * FROM mst_buku 
								LEFT JOIN mst_kategori ON mst_buku.id_kategori = mst_kategori.id_kategori 
								LEFT JOIN mst_sumber ON mst_buku.id_sumber = mst_sumber.id_sumber ORDER BY id_buku DESC");
		return $q;
	}

	public function pengunjung($tgl_awal, $tgl_akhir, $keperluan) {
		if($keperluan == 'all' || $keperluan == '') {
			$param1 = "";
		} else {
			$param1 = "AND keperluan = '$keperluan'";
		}
		$q = $this->db->query("SELECT * FROM pengunjung_perpus 
								INNER JOIN mst_siswa ON pengunjung_perpus.nis = mst_siswa.nis 
								INNER JOIN mst_kelas ON pengunjung_perpus.id_kelas = mst_kelas.id_kelas  WHERE date(tanggal) between date('$tgl_awal') and date('$tgl_akhir') $param1 ORDER BY tanggal DESC");
		return $q;
	}

}