<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Combo_model extends CI_Model {



	public function combo_jabatan_guru($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT * FROM mst_jabatan WHERE hak_akses = 'guru' OR hak_akses = 'gurubk' ORDER BY id_jabatan ASC");
		$hasil .= '<option selected="selected" value>PILIH</option>';
		foreach($q->result() as $h) {
			if($id == $h->id_jabatan) {
				$hasil .= '<option value="'.$h->id_jabatan.'" selected="selected">'.$h->nama_jabatan.'</option>';
			} else {
				$hasil .= '<option value="'.$h->id_jabatan.'">'.$h->nama_jabatan.'</option>';
			}
		}
		return $hasil;
	}

	public function combo_jabatan_staff($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT * FROM mst_jabatan WHERE hak_akses = 'staff' ORDER BY id_jabatan ASC");
		$hasil .= '<option selected="selected" value>PILIH</option>';
		foreach($q->result() as $h) {
			if($id == $h->id_jabatan) {
				$hasil .= '<option value="'.$h->id_jabatan.'" selected="selected">'.$h->nama_jabatan.'</option>';
			} else {
				$hasil .= '<option value="'.$h->id_jabatan.'">'.$h->nama_jabatan.'</option>';
			}
		}
		return $hasil;
	}

	public function combo_kelompok_pelajaran($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT * FROM mst_kelompok_pelajaran  ORDER BY id_kelompok_pelajaran ASC");
		$hasil .= '<option selected="selected" value>PILIH</option>';
		foreach($q->result() as $h) {
			if($id == $h->id_kelompok_pelajaran) {
				$hasil .= '<option value="'.$h->id_kelompok_pelajaran.'" selected="selected">'.$h->nama_kelompok_pelajaran.'</option>';
			} else {
				$hasil .= '<option value="'.$h->id_kelompok_pelajaran.'">'.$h->nama_kelompok_pelajaran.'</option>';
			}
		}
		return $hasil;
	}

	public function combo_tahun_ajaran($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT * FROM mst_tahun_ajaran ORDER BY id_tahun_ajaran DESC");
		$hasil .= '<option selected="selected" value>Pilih Tahun Ajaran - Semester</option>';
		foreach($q->result() as $h) {
			if($id == $h->id_tahun_ajaran) {
				$hasil .= '<option value="'.$h->id_tahun_ajaran.'" selected="selected">'.$h->tahun_ajaran.' - Semester '.$h->semester.'</option>';
			} else {
				$hasil .= '<option value="'.$h->id_tahun_ajaran.'">'.$h->tahun_ajaran.' - Semester '.$h->semester.'</option>';
			}
		}
		return $hasil;
	}

	public function combo_tahun_ajaran_only($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT * FROM mst_tahun_ajaran ORDER BY id_tahun_ajaran DESC");
		$hasil .= '<option selected="selected" value>Pilih Tahun Ajaran </option>';
		foreach($q->result() as $h) {
			if($id == $h->tahun_ajaran) {
				$hasil .= '<option value="'.$h->tahun_ajaran.'" selected="selected">'.$h->tahun_ajaran.'</option>';
			} else {
				$hasil .= '<option value="'.$h->tahun_ajaran.'">'.$h->tahun_ajaran.'</option>';
			}
		}
		return $hasil;
	}

	public function combo_kelas($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT id_kelas,nama_kelas FROM mst_kelas WHERE aktif_kelas = 1 ORDER BY id_kelas ASC");
		$hasil .= '<option selected="selected" value>PILIH KELAS</option>';
		foreach($q->result() as $h) {
			if($id == $h->id_kelas) {
				$hasil .= '<option value="'.$h->id_kelas.'" selected="selected">'.$h->nama_kelas.'</option>';
			} else {
				$hasil .= '<option value="'.$h->id_kelas.'">'.$h->nama_kelas.'</option>';
			}
		}
		return $hasil;
	}

	public function combo_mapel($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT id_mapel,nama_mapel FROM mst_mapel  ORDER BY id_mapel ASC");
		$hasil .= '<option selected="selected" value>PILIH</option>';
		foreach($q->result() as $h) {
			if($id == $h->id_mapel) {
				$hasil .= '<option value="'.$h->id_mapel.'" selected="selected">'.$h->nama_mapel.'</option>';
			} else {
				$hasil .= '<option value="'.$h->id_mapel.'">'.$h->nama_mapel.'</option>';
			}
		}
		return $hasil;
	}

	public function combo_guru($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT id_guru,nama_guru FROM mst_guru  ORDER BY id_guru ASC");
		$hasil .= '<option selected="selected" value>PILIH</option>';
		foreach($q->result() as $h) {
			if($id == $h->id_guru) {
				$hasil .= '<option value="'.$h->id_guru.'" selected="selected">'.$h->nama_guru.'</option>';
			} else {
				$hasil .= '<option value="'.$h->id_guru.'">'.$h->nama_guru.'</option>';
			}
		}
		return $hasil;
	}

	public function combo_pelanggaran($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT id_poin_pelanggaran,nama_poin_pelanggaran,poin FROM mst_poin_pelanggaran ORDER BY id_poin_pelanggaran ASC");
		$hasil .= '<option value>PILIH PELANGGARAN</option>';
		foreach($q->result() as $h) {
			if($id == $h->id_poin_pelanggaran) {
				$hasil .= '<option value="'.$h->id_poin_pelanggaran.'" selected="selected">'.$h->nama_poin_pelanggaran.' <b> | '.$h->poin.' Poin</b></option>';
			} else {
				$hasil .= '<option value="'.$h->id_poin_pelanggaran.'">'.$h->nama_poin_pelanggaran.' <b> |  '.$h->poin.' Poin</b></option>';
			}
		}
		return $hasil;
	}

	public function combo_pelanggaran_rpt($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT id_poin_pelanggaran,nama_poin_pelanggaran,poin FROM mst_poin_pelanggaran ORDER BY id_poin_pelanggaran ASC");
		$hasil .= '<option value="all">[ SEMUA PELANGGARAN ]</option>';
		foreach($q->result() as $h) {
			if($id == $h->id_poin_pelanggaran) {
				$hasil .= '<option value="'.$h->id_poin_pelanggaran.'" selected="selected">'.$h->nama_poin_pelanggaran.' <b> | '.$h->poin.' Poin</b></option>';
			} else {
				$hasil .= '<option value="'.$h->id_poin_pelanggaran.'">'.$h->nama_poin_pelanggaran.' <b> |  '.$h->poin.' Poin</b></option>';
			}
		}
		return $hasil;
	}

	

	public function combo_tahun_ajaran_rpt($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT * FROM mst_tahun_ajaran GROUP BY tahun_ajaran ORDER BY id_tahun_ajaran DESC");
		$hasil .= '<option selected="selected" value>[ PILIH TAHUN AJARAN ]</option>';
		foreach($q->result() as $h) {
			if($id == $h->tahun_ajaran) {
				$hasil .= '<option value="'.$h->tahun_ajaran.'" selected="selected">'.$h->tahun_ajaran.'</option>';
			} else {
				$hasil .= '<option value="'.$h->tahun_ajaran.'">'.$h->tahun_ajaran.'</option>';
			}
		}
		return $hasil;
	}
	

	public function combo_kelas_report($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT id_kelas,nama_kelas FROM mst_kelas WHERE aktif_kelas = 1 ORDER BY id_kelas ASC");
		$hasil .= '<option selected="selected" value="all">[ SEMUA KELAS ]</option>';
		foreach($q->result() as $h) {
			if($id == $h->id_kelas) {
				$hasil .= '<option value="'.$h->id_kelas.'" selected="selected">'.$h->nama_kelas.'</option>';
			} else {
				$hasil .= '<option value="'.$h->id_kelas.'">'.$h->nama_kelas.'</option>';
			}
		}
		return $hasil;
	}


	public function combo_sumber($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT * FROM mst_sumber ORDER BY id_sumber ASC");
		$hasil .= '<option value>PILIH SUMBER BUKU</option>';
		foreach($q->result() as $h) {
			if($id == $h->id_sumber) {
				$hasil .= '<option value="'.$h->id_sumber.'" selected="selected">'.$h->nama_sumber.' Poin</b></option>';
			} else {
				$hasil .= '<option value="'.$h->id_sumber.'">'.$h->nama_sumber.' </option>';
			}
		}
		return $hasil;
	}

	public function combo_kategori($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT * FROM mst_kategori ORDER BY id_kategori ASC");
		$hasil .= '<option value>PILIH KATEGORI BUKU</option>';
		foreach($q->result() as $h) {
			if($id == $h->id_kategori) {
				$hasil .= '<option value="'.$h->id_kategori.'" selected="selected">'.$h->nama_kategori.' Poin</b></option>';
			} else {
				$hasil .= '<option value="'.$h->id_kategori.'">'.$h->nama_kategori.' </option>';
			}
		}
		return $hasil;
	}

	public function combo_buku($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT * FROM mst_buku ORDER BY id_buku ASC");
		$hasil .= '<option value>PILIH KODE BUKU</option>';
		foreach($q->result() as $h) {
			if($id == $h->id_buku) {
				$hasil .= '<option value="'.$h->id_buku.'" selected="selected">'.$h->kode_buku.' Poin</b></option>';
			} else {
				$hasil .= '<option value="'.$h->id_buku.'">'.$h->kode_buku.' </option>';
			}
		}
		return $hasil;
	}
}