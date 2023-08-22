<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_model extends CI_Model {

	public function das_sisa($tahun_ajaran) {
		$q = $this->db->query("SELECT * FROM das_sisa WHERE tahun_ajaran = '$tahun_ajaran' ORDER BY id_das_sisa DESC");
		return $q;
  }

	public function das($id_user,$tahun_ajaran) {
		if($id_user == "all" || $id_user == "") {  
			$param1 = "";
		} else {
			$param1 = "WHERE das.id_user = '$id_user'";
		}
		$q = $this->db->query("SELECT * FROM das
							INNER JOIN das_kategori ON das.id_das_kategori = das_kategori.id_das_kategori 
							INNER JOIN mst_user ON das.id_user = mst_user.id_user 
							INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan  $param1 AND tahun_ajaran = '$tahun_ajaran' ORDER BY id_das DESC");
		return $q;
	}
	

	public function das_bendahara($id_user,$tahun_ajaran) {
		if($id_user == "all" || $id_user == "") {  
			$param1 = "";
		} else {
			$param1 = "WHERE das_bendahara.id_user = '$id_user'";
		}
		$q = $this->db->query("SELECT * FROM das_bendahara
							INNER JOIN das_kategori ON das_bendahara.id_das_kategori = das_kategori.id_das_kategori 
							INNER JOIN mst_user ON das_bendahara.id_user = mst_user.id_user 
							INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan  $param1 AND tahun_ajaran = '$tahun_ajaran' ORDER BY id_das_bendahara DESC");
		return $q;
	}
	


	public function das_harian($id_user,$tahun_ajaran) {
		if($id_user == "all" || $id_user == "") {  
			$param1 = "";
		} else {
			$param1 = "WHERE das.id_user = '$id_user'";
		}
		$q = $this->db->query("SELECT *	 FROM das_user
							INNER JOIN das ON das_user.id_das = das.id_das 
							INNER JOIN das_kategori ON das.id_das_kategori = das_kategori.id_das_kategori 
							INNER JOIN mst_user ON das.id_user = mst_user.id_user 
							INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan  $param1 AND tahun_ajaran = '$tahun_ajaran' ORDER BY id_das_user DESC");
		return $q;
	}
	

	public function siswa($id_kelas) {
		$q = $this->db->query("SELECT * FROM vw_siswa  WHERE id_kelas = '$id_kelas' ORDER BY nama_siswa ASC");
		return $q;
	}

	public function siswa_detail($nis) {
		$q = $this->db->query("SELECT * FROM vw_siswa_dt WHERE nis = '$nis'");
		return $q;
	}

	public function penerimaan($tgl_awal,$tgl_akhir) {
		$q = $this->db->query("SELECT * FROM penerimaan WHERE tanggal >= '$tgl_awal' AND tanggal <= '$tgl_akhir'");
		return $q;
	}

	public function pengeluaran($tgl_awal,$tgl_akhir) {
		$q = $this->db->query("SELECT * FROM pengeluaran WHERE tanggal >= '$tgl_awal' AND tanggal <= '$tgl_akhir'");
		return $q;
	}

	public function pembayaran_bulanan($tgl_awal,$tgl_akhir,$id_jenis_pembayaran,$kelas,$nis,$angkatan) {
		if($id_jenis_pembayaran == "all" || $id_jenis_pembayaran == "") {  
			$param1 = "";
		} else {
			$param1 = "AND pembayaran_bulanan.id_jenis_pembayaran = '$id_jenis_pembayaran'";
		}

		if($kelas == "all" || $kelas == "") {  
			$param2 = "";
		} else {
			$param2 = "AND pembayaran_bulanan.id_kelas = '$id_jenis_pembayaran'";
		}

		if($nis == "all" || $nis == "") {  
			$param3 = "";
		} else {
			$param3 = "AND mst_siswa.nis = '$nis'";
		}

		if($angkatan == "all" || $angkatan == "") {  
			$param4 = "";
		} else {
			$param4 = "AND mst_siswa.angkatan = '$angkatan'";
		}
		
		$q = $this->db->query("SELECT nama_pos_keuangan,bulan,tahun_ajaran,tanggal,nis,nama_siswa,nama_kelas,tagihan,bayar FROM pembayaran_bulanan 
								INNER JOIN mst_jenis_pembayaran ON pembayaran_bulanan.id_jenis_pembayaran = mst_jenis_pembayaran.id_jenis_pembayaran 
								INNER JOIN mst_pos_keuangan ON mst_jenis_pembayaran.id_pos_keuangan = mst_pos_keuangan.id_pos_keuangan 
								INNER JOIN mst_siswa ON pembayaran_bulanan.id_siswa = mst_siswa.id_siswa  
								INNER JOIN mst_kelas ON pembayaran_bulanan.id_kelas = mst_kelas.id_kelas   WHERE tanggal >= '$tgl_awal' AND tanggal <= '$tgl_akhir' AND bayar > 0 $param1 $param2 $param3 $param4 ORDER BY id_pembayaran_bulanan DESC");
		return $q;
	}


	public function pembayaran_bebas($tgl_awal,$tgl_akhir,$id_jenis_pembayaran,$kelas,$nis,$angkatan) {

		if($id_jenis_pembayaran == "all" || $id_jenis_pembayaran == "") {  
			$param1 = "";
		} else {
			$param1 = "AND pembayaran_bebas.id_jenis_pembayaran = '$id_jenis_pembayaran'";
		}

		if($kelas == "all" || $kelas == "") {  
			$param2 = "";
		} else {
			$param2 = "AND pembayaran_bebas.id_kelas = '$kelas'";
		}

		if($nis == "all" || $nis == "") {  
			$param3 = "";
		} else {
			$param3 = "AND mst_siswa.nis = '$nis'";
		}

		if($angkatan == "all" || $angkatan == "") {  
			$param4 = "";
		} else {
			$param4 = "AND mst_siswa.angkatan = '$angkatan'";
		}

		$q = $this->db->query("SELECT nama_pos_keuangan,tahun_ajaran,tanggal,nis,nama_siswa,nama_kelas,tagihan,bayar FROM pembayaran_bebas_dt  
								INNER JOIN pembayaran_bebas ON pembayaran_bebas_dt.id_pembayaran_bebas = pembayaran_bebas.id_pembayaran_bebas 
								INNER JOIN mst_jenis_pembayaran ON pembayaran_bebas.id_jenis_pembayaran = mst_jenis_pembayaran.id_jenis_pembayaran 
								INNER JOIN mst_pos_keuangan ON mst_jenis_pembayaran.id_pos_keuangan = mst_pos_keuangan.id_pos_keuangan 
								INNER JOIN mst_siswa ON pembayaran_bebas.id_siswa = mst_siswa.id_siswa  
								INNER JOIN mst_kelas ON pembayaran_bebas.id_kelas = mst_kelas.id_kelas   WHERE tanggal >= '$tgl_awal' AND tanggal <= '$tgl_akhir' AND bayar > 0 $param1 $param2 $param3 $param4 ORDER BY id_pembayaran_bebas_dt DESC");
		return $q;
	}
	
	public function get_rekapitulasi($id_jenis_pembayaran, $id_kelas) {
		$cek = $this->db->query("SELECT tipe_pembayaran FROM mst_jenis_pembayaran WHERE id_jenis_pembayaran = $id_jenis_pembayaran")->row();
		if($cek->tipe_pembayaran == 'Bulanan') {
			$q = $this->db->query("SELECT * FROM vw_bayar_siswa WHERE id_jenis_pembayaran = '$id_jenis_pembayaran' AND tipe_pembayaran = 'Bulanan' AND id_kelas = '$id_kelas' GROUP BY id_siswa");

		} else {
			$q = $this->db->query("SELECT * FROM vw_bayar_siswa_bebas WHERE id_jenis_pembayaran = '$id_jenis_pembayaran' AND tipe_pembayaran = 'Bebas' AND id_kelas = '$id_kelas' GROUP BY id_siswa");

		}
		return $q;
	}


	public function tabungan_siswa($tgl_awal,$tgl_akhir,$tahun_ajaran,$id_kelas,$id_siswa,$id_tabungan_siswa) {
		if($id_siswa != "" && $id_siswa != "all") {
			$param = "AND id_siswa = '$id_siswa'";
		} else {
			$param =  '';
		}

		if($tahun_ajaran != "" && $tahun_ajaran != "all") {
			$tahun_ajaran = str_replace("-","/",$tahun_ajaran);
			$param2 = "AND tahun_ajaran = '$tahun_ajaran'";
		} else {
			$param2 =  '';
		}

		if($id_kelas != "" && $id_kelas != "all") {
			$param3 = "AND id_kelas = '$id_kelas'";
		} else {
			$param3 =  '';
		}

		if($id_tabungan_siswa != "" && $id_tabungan_siswa != "all") {
			$param4 = "AND id_tabungan_siswa = '$id_tabungan_siswa'";
		} else {
			$param4 =  '';
		}

		$q = $this->db->query("SELECT * FROM dt_tabungan_siswa 
		INNER JOIN mst_siswa ON dt_tabungan_siswa.id_siswa = mst_siswa.id_siswa 
					INNER JOIN mst_kelas ON dt_tabungan_siswa.id_kelas = mst_kelas.id_kelas 

		
		WHERE tanggal >= '$tgl_awal' AND tanggal <= '$tgl_akhir'  $param2 $param3 $param4 ORDER BY id_tabungan_siswa DESC");
		return $q;
	}



	public function belanja_siswa($tgl_awal,$tgl_akhir,$tahun_ajaran,$id_kelas,$id_siswa,$id_belanja_siswa) {
		if($id_siswa != "" && $id_siswa != "all") {
			$param = "AND id_siswa = '$id_siswa'";
		} else {
			$param =  '';
		}

		if($tahun_ajaran != "" && $tahun_ajaran != "all") {
			$tahun_ajaran = str_replace("-","/",$tahun_ajaran);
			$param2 = "AND tahun_ajaran = '$tahun_ajaran'";
		} else {
			$param2 =  '';
		}

		if($id_kelas != "" && $id_kelas != "all") {
			$param3 = "AND id_kelas = '$id_kelas'";
		} else {
			$param3 =  '';
		}

		if($id_belanja_siswa != "" && $id_belanja_siswa != "all") {
			$param4 = "AND id_belanja_siswa = '$id_belanja_siswa'";
		} else {
			$param4 =  '';
		}

		$q = $this->db->query("SELECT * FROM belanja_siswa 
		INNER JOIN mst_siswa ON belanja_siswa.id_siswa = mst_siswa.id_siswa 
					INNER JOIN mst_kelas ON belanja_siswa.id_kelas = mst_kelas.id_kelas 

		
		WHERE tanggal >= '$tgl_awal' AND tanggal <= '$tgl_akhir'  $param2 $param3 $param4 ORDER BY id_belanja_siswa DESC");
		return $q;
	}



}