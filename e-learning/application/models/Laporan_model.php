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




    public function jurnal($tgl_awal,$tgl_akhir,$tahun_ajaran,$id_kelas,$id_jurusan,$id_mapel,$id_guru,$id_jurnal) {
		if($id_mapel != "" && $id_mapel != "all") {
			$param1 = "AND mst_mapel.id_mapel = '$id_mapel'";
		} else {
			$param1 =  '';
		}

		if($tahun_ajaran != "" && $tahun_ajaran != "all") {
			$tahun_ajaran = str_replace("-","/",$tahun_ajaran);
			$param2 = "AND tahun_ajaran = '$tahun_ajaran'";
		} else {
			$param2 =  '';
		}

		if($id_kelas != "" && $id_kelas != "all") {
			$param3 = "AND mst_kelas.id_kelas = '$id_kelas'";
		} else {
			$param3 =  '';
		}

        if($id_jurusan != "" && $id_jurusan != "all") {
			$param4 = "AND mst_jurusan.id_jurusan = '$id_jurusan'";
		} else {
			$param4 =  '';
		}

		if($id_guru != "" && $id_guru != "all") {
			$param5 = "AND id_penginput = '$id_guru'";
		} else {
			$param5 =  '';
		}

		if($id_jurnal != "" && $id_jurnal != "all") {
			$param6 = "AND mst_jurnal.id_jurnal = '$id_jurnal'";
		} else {
			$param6 =  '';
		}

		

		$q = $this->db->query("SELECT * FROM mst_jurnal 
					INNER JOIN mst_kelas ON mst_jurnal.id_kelas = mst_kelas.id_kelas 
					INNER JOIN mst_jurusan ON mst_jurnal.id_jurusan = mst_jurusan.id_jurusan 
					INNER JOIN mst_guru ON mst_jurnal.id_guru = mst_guru.id_guru 
					INNER JOIN mst_mapel ON mst_jurnal.id_mapel = mst_mapel.id_mapel 

		WHERE tanggal_jurnal >= '$tgl_awal' AND tanggal_jurnal <= '$tgl_akhir'  $param1 $param2 $param3 $param4 $param5 $param6 ORDER BY id_jurnal DESC");
		return $q;
	}




    public function materi($tgl_awal,$tgl_akhir,$tahun_ajaran,$id_kelas,$id_jurusan,$id_mapel,$id_guru,$id_materi) {
		if($id_mapel != "" && $id_mapel != "all") {
			$param1 = "AND id_mapel = '$id_mapel'";
		} else {
			$param1 =  '';
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

        if($id_jurusan != "" && $id_jurusan != "all") {
			$param4 = "AND id_jurusan = '$id_jurusan'";
		} else {
			$param4 =  '';
		}

		if($id_guru != "" && $id_guru != "all") {
			$param5 = "AND id_penginput = '$id_guru'";
		} else {
			$param5 =  '';
		}

		if($id_materi != "" && $id_materi != "all") {
			$param6 = "AND id_materi = '$id_materi'";
		} else {
			$param6 =  '';
		}

		

		$q = $this->db->query("SELECT * FROM mst_materi 
					INNER JOIN mst_kelas ON mst_materi.id_kelas = mst_kelas.id_kelas 
					INNER JOIN mst_jurusan ON mst_materi.id_jurusan = mst_jurusan.id_jurusan 
					INNER JOIN mst_guru ON mst_materi.id_guru = mst_guru.id_guru 
					INNER JOIN mst_mapel ON mst_materi.id_mapel = mst_mapel.id_mapel 

		WHERE tanggal_materi >= '$tgl_awal' AND tanggal_materi <= '$tgl_akhir'  $param1 $param2 $param3 $param4 $param5 $param6 ORDER BY id_materi DESC");
		return $q;
	}



}