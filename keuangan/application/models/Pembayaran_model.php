<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pembayaran_model extends CI_Model {


	public function pembayaran_siswa_bebas($tahun_ajaran,$id_siswa) {
		$q = $this->db->query("SELECT * FROM vw_bayar_siswa_bebas WHERE tahun_ajaran = '$tahun_ajaran' AND tipe_pembayaran = 'Bebas' AND id_siswa = '$id_siswa'");
		return $q;
	}

	public function pembayaran_siswa_bulanan($tahun_ajaran,$id_siswa) {
		$q = $this->db->query("SELECT * FROM vw_bayar_siswa WHERE tahun_ajaran = '$tahun_ajaran' AND tipe_pembayaran = 'Bulanan' AND id_siswa = '$id_siswa' GROUP BY id_jenis_pembayaran");
		return $q;
	}

	public function pembayaran_siswa_bulanan_detail($id_jenis_pembayaran,$id_siswa) {
		$q = $this->db->query("SELECT * FROM vw_bayar_siswa WHERE id_jenis_pembayaran = '$id_jenis_pembayaran' AND tipe_pembayaran = 'Bulanan' AND id_siswa = '$id_siswa'");
		return $q;
	}


	public function jenis_pembayaran_bulanan($tahun_ajaran,$id_siswa) {
		$q = $this->db->query("SELECT * FROM vw_bayar_siswa WHERE tahun_ajaran = '$tahun_ajaran' AND tipe_pembayaran = 'Bulanan' AND id_siswa = '$id_siswa' GROUP BY id_jenis_pembayaran");
		return $q;
	}

	public function jenis_pembayaran_bebas($tahun_ajaran,$id_siswa) {
		$q = $this->db->query("SELECT * FROM vw_bayar_siswa_bebas WHERE tahun_ajaran = '$tahun_ajaran' AND tipe_pembayaran = 'Bebas' AND id_siswa = '$id_siswa' GROUP BY id_jenis_pembayaran");
		return $q;
	}

	public function pembayaran_bulanan_terakhir($tahun_ajaran,$id_siswa) {
		$q = $this->db->query("SELECT * FROM vw_bayar_siswa WHERE tahun_ajaran = '$tahun_ajaran' AND tipe_pembayaran = 'Bulanan' AND id_siswa = '$id_siswa' AND bayar > 0 ORDER BY tanggal DESC");
		return $q;
	}

	public function pembayaran_bebas_terakhir($tahun_ajaran,$id_siswa) {
		$q = $this->db->query("SELECT * FROM pembayaran_bebas_dt 
		INNER JOIN pembayaran_bebas ON pembayaran_bebas_dt.id_pembayaran_bebas = pembayaran_bebas.id_pembayaran_bebas 
		INNER JOIN mst_jenis_pembayaran ON pembayaran_bebas.id_jenis_pembayaran = mst_jenis_pembayaran.id_jenis_pembayaran 
		INNER JOIN mst_pos_keuangan ON mst_jenis_pembayaran.id_pos_keuangan = mst_pos_keuangan.id_pos_keuangan WHERE tahun_ajaran = '$tahun_ajaran' AND tipe_pembayaran = 'Bebas' AND id_siswa = '$id_siswa'");
		return $q;
	}

	public function daftar_pembayaran_bulanan($tahun_ajaran,$query) {
		if(!empty($query)) {
			$query = "AND (nis LIKE '%$query%' OR nama_siswa LIKE '%$query%' OR nama_kelas LIKE '%$query%')";
		}
		$q = $this->db->query("SELECT * FROM vw_bayar_siswa WHERE tahun_ajaran = '$tahun_ajaran' AND tipe_pembayaran = 'Bulanan' AND bayar > 0 $query");
		return $q;
	}

	public function daftar_pembayaran_bebas($tahun_ajaran,$query) {
		if(!empty($query)) {
			$query = "AND (nis LIKE '%$query%' OR nama_siswa LIKE '%$query%' OR nama_kelas LIKE '%$query%')";
		}
		$q = $this->db->query("SELECT * FROM pembayaran_bebas_dt 
		INNER JOIN pembayaran_bebas ON pembayaran_bebas_dt.id_pembayaran_bebas = pembayaran_bebas.id_pembayaran_bebas 
		INNER JOIN mst_siswa ON pembayaran_bebas.id_siswa = mst_siswa.id_siswa
		INNER JOIN mst_kelas ON pembayaran_bebas.id_kelas = mst_kelas.id_kelas
		INNER JOIN mst_jenis_pembayaran ON pembayaran_bebas.id_jenis_pembayaran = mst_jenis_pembayaran.id_jenis_pembayaran 
		INNER JOIN mst_pos_keuangan ON mst_jenis_pembayaran.id_pos_keuangan = mst_pos_keuangan.id_pos_keuangan WHERE tahun_ajaran = '$tahun_ajaran' AND tipe_pembayaran = 'Bebas' $query");
		return $q;
	}


	public function pembayaran_bulanan_terakhir_umum($tahun_ajaran) {
		$q = $this->db->query("SELECT * FROM vw_bayar_siswa WHERE tahun_ajaran = '$tahun_ajaran' AND tipe_pembayaran = 'Bulanan' AND bayar > 0 ORDER BY tanggal DESC LIMIT 5");
		return $q;
	}

	public function pembayaran_bebas_terakhir_umum($tahun_ajaran) {
		$q = $this->db->query("SELECT * FROM pembayaran_bebas_dt 
		INNER JOIN pembayaran_bebas ON pembayaran_bebas_dt.id_pembayaran_bebas = pembayaran_bebas.id_pembayaran_bebas 
		INNER JOIN mst_siswa ON pembayaran_bebas.id_siswa = mst_siswa.id_siswa
		INNER JOIN mst_kelas ON pembayaran_bebas.id_kelas = mst_kelas.id_kelas
		INNER JOIN mst_jenis_pembayaran ON pembayaran_bebas.id_jenis_pembayaran = mst_jenis_pembayaran.id_jenis_pembayaran 
		INNER JOIN mst_pos_keuangan ON mst_jenis_pembayaran.id_pos_keuangan = mst_pos_keuangan.id_pos_keuangan WHERE tahun_ajaran = '$tahun_ajaran' AND tipe_pembayaran = 'Bebas' LIMIT 5");
		return $q;
	}
	
}