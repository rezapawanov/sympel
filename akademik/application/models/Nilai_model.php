<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nilai_model extends CI_Model {


	public function walikelas($id_guru) {
		$q = $this->db->query("SELECT * FROM mst_walikelas WHERE id_guru = '$id_guru' ORDER BY id_walikelas DESC");
		return $q;
	}

	public function walikelas_all() {
		$q = $this->db->query("SELECT * FROM mst_walikelas
		
		INNER JOIN mst_kelas ON mst_walikelas.id_kelas = mst_kelas.id_kelas

		  ORDER BY id_walikelas DESC");
		return $q;
	}
		
	public function jadwal($id_guru) {
		$q = $this->db->query("SELECT * FROM jadwal_pelajaran
						INNER JOIN mst_kelas ON jadwal_pelajaran.id_kelas = mst_kelas.id_kelas
								INNER JOIN mst_tahun_ajaran ON jadwal_pelajaran.id_tahun_ajaran = mst_tahun_ajaran.id_tahun_ajaran
								INNER JOIN mst_mapel ON jadwal_pelajaran.id_mapel = mst_mapel.id_mapel
		
		
		 WHERE id_guru = '$id_guru'  ORDER BY id_jadwal_pelajaran DESC");
		return $q;
	}
	
	public function jadwal_all() {
		$q = $this->db->query("SELECT * FROM jadwal_pelajaran  
								INNER JOIN mst_kelas ON jadwal_pelajaran.id_kelas = mst_kelas.id_kelas
								INNER JOIN mst_tahun_ajaran ON jadwal_pelajaran.id_tahun_ajaran = mst_tahun_ajaran.id_tahun_ajaran
								INNER JOIN mst_mapel ON jadwal_pelajaran.id_mapel = mst_mapel.id_mapel

		ORDER BY id_jadwal_pelajaran DESC");
		return $q;
    }
    
    public function nilai_harian_kategori($id_jadwal_pelajaran) {
		$q = $this->db->query("SELECT * FROM nilai_harian 
		
		WHERE id_jadwal_pelajaran = $id_jadwal_pelajaran  ORDER BY id_jadwal_pelajaran DESC");
		return $q;
    }
    
    public function nilai_harian_siswa($id_nilai_harian) {
		$q = $this->db->query("SELECT nis,nama_siswa,nilai,id_nilai_harian,id_nilai_harian_detail
		
		
		 FROM nilai_harian_detail 
        

		                        INNER JOIN mst_siswa ON nilai_harian_detail.id_siswa = mst_siswa.id_siswa WHERE id_nilai_harian = $id_nilai_harian ORDER BY nama_siswa ASC");
		
		
		return $q;
    }
    
    public function nilai_uts_siswa($id_jadwal_pelajaran) {
		$q = $this->db->query("SELECT nis,nama_siswa,nilai_pengetahuan,nilai_keterampilan,id_nilai_uts,kkm FROM nilai_uts
                                INNER JOIN mst_siswa ON nilai_uts.id_siswa = mst_siswa.id_siswa WHERE id_jadwal_pelajaran = $id_jadwal_pelajaran ORDER BY nama_siswa ASC");
		return $q;
		}

		public function nilai_raport_siswa($id_jadwal_pelajaran) {
			$q = $this->db->query("SELECT nis,nama_siswa,nilai_pengetahuan,nilai_keterampilan,id_nilai_raport,kkm FROM nilai_raport
	
																	INNER JOIN mst_siswa ON nilai_raport.id_siswa = mst_siswa.id_siswa WHERE id_jadwal_pelajaran = $id_jadwal_pelajaran ORDER BY nama_siswa ASC");
			return $q;
		}

		public function nilai_prestasi_siswa($id_kelas,$id_tahun_ajaran) {
			$q = $this->db->query("SELECT nis,nama_siswa,kegiatan,keterangan,id_nilai_prestasi FROM nilai_prestasi
																	INNER JOIN mst_siswa ON nilai_prestasi.id_siswa = mst_siswa.id_siswa WHERE nilai_prestasi.id_kelas = $id_kelas AND id_tahun_ajaran = '$id_tahun_ajaran' ORDER BY nama_siswa ASC");
			return $q;
		}

		public function nilai_ekstrakulikuler_siswa($id_kelas,$id_tahun_ajaran) {
			$q = $this->db->query("SELECT nis,nama_siswa,kegiatan,deskripsi,nilai,id_nilai_ekstrakulikuler FROM nilai_ekstrakulikuler
																	INNER JOIN mst_siswa ON nilai_ekstrakulikuler.id_siswa = mst_siswa.id_siswa WHERE nilai_ekstrakulikuler.id_kelas = $id_kelas AND id_tahun_ajaran = '$id_tahun_ajaran' ORDER BY nama_siswa ASC");
			return $q;
		}

		public function nilai_capaian_hasil_belajar_siswa($id_kelas,$id_tahun_ajaran) {
			$q = $this->db->query("SELECT nis,nama_siswa,spiritual_predikat,spiritual_deskripsi,sosial_predikat,sosial_deskripsi,id_nilai_capaian_hasil_belajar FROM nilai_capaian_hasil_belajar
																	INNER JOIN mst_siswa ON nilai_capaian_hasil_belajar.id_siswa = mst_siswa.id_siswa WHERE nilai_capaian_hasil_belajar.id_kelas = $id_kelas AND id_tahun_ajaran = '$id_tahun_ajaran' ORDER BY nama_siswa ASC");
			return $q;
		}
}