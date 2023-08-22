<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_model extends CI_Model {


	public function jurusan() {
		$q = $this->db->query("SELECT * FROM mst_jurusan ORDER BY id_jurusan DESC");
		return $q;
	}

	public function jurusan_edit($id) {
		$q = $this->db->query("SELECT * FROM mst_jurusan WHERE id_jurusan = '$id'");
		return $q;
	}

	public function tahun_ajaran() {
		$q = $this->db->query("SELECT * FROM mst_tahun_ajaran ORDER BY id_tahun_ajaran DESC");
		return $q;
	}

	public function tahun_ajaran_edit($id) {
		$q = $this->db->query("SELECT * FROM mst_tahun_ajaran WHERE id_tahun_ajaran = '$id'");
		return $q;
	}

	public function kelas() {
		$q = $this->db->query("SELECT * FROM mst_kelas ORDER BY id_kelas DESC");
		return $q;
	}

	public function kelas_edit($id) {
		$q = $this->db->query("SELECT * FROM mst_kelas WHERE id_kelas = '$id'");
		return $q;
	}

	public function kelompok_pelajaran() {
		$q = $this->db->query("SELECT * FROM mst_kelompok_pelajaran ORDER BY id_kelompok_pelajaran DESC");
		return $q;
	}

	public function kelompok_pelajaran_edit($id) {
		$q = $this->db->query("SELECT * FROM mst_kelompok_pelajaran WHERE id_kelompok_pelajaran = '$id'");
		return $q;
	}

	public function mapel() {
		$q = $this->db->query("SELECT * FROM mst_mapel
				INNER JOIN mst_kelompok_pelajaran ON mst_mapel.id_kelompok_pelajaran = mst_kelompok_pelajaran.id_kelompok_pelajaran 

		
		");
		return $q;
	}

	public function mapel_edit($id) {
		$q = $this->db->query("SELECT * FROM mst_mapel 
		INNER JOIN mst_kelompok_pelajaran ON mst_mapel.id_kelompok_pelajaran = mst_kelompok_pelajaran.id_kelompok_pelajaran 

		
		WHERE id_mapel = '$id'");
		return $q;
	}

	public function predikat() {
		$q = $this->db->query("SELECT * FROM mst_predikat ORDER BY id_predikat ASC");
		return $q;
	}

	public function walikelas($tahun_ajaran) {
		$q = $this->db->query("SELECT * FROM mst_walikelas 
		INNER JOIN mst_kelas ON mst_walikelas.id_kelas = mst_kelas.id_kelas
		INNER JOIN mst_guru ON mst_walikelas.id_guru = mst_guru.id_guru

		WHERE tahun_ajaran = '$tahun_ajaran' ORDER BY id_walikelas DESC");
		return $q;
	}

	public function buku() {
		$q = $this->db->query("SELECT * FROM mst_book 
								LEFT JOIN mst_kategori ON mst_book.id_kategori = mst_kategori.id_kategori 
								LEFT JOIN mst_sumber ON mst_book.id_sumber = mst_sumber.id_sumber
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
}