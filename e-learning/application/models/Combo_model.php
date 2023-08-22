<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Combo_model extends CI_Model {

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


	public function combo_jurusan($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT id_jurusan,nama_jurusan FROM mst_jurusan WHERE aktif_jurusan = 1 ORDER BY id_jurusan ASC");
		$hasil .= '<option selected="selected" value>PILIH JURUSAN</option>';
		foreach($q->result() as $h) {
			if($id == $h->id_jurusan) {
				$hasil .= '<option value="'.$h->id_jurusan.'" selected="selected">'.$h->nama_jurusan.'</option>';
			} else {
				$hasil .= '<option value="'.$h->id_jurusan.'">'.$h->nama_jurusan.'</option>';
			}
		}
		return $hasil;
	}


	public function combo_guru($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT id_guru,nama_guru FROM mst_guru WHERE aktif_guru = 1 ORDER BY id_guru ASC");
		$hasil .= '<option selected="selected" value>PILIH GURU</option>';
		foreach($q->result() as $h) {
			if($id == $h->id_guru) {
				$hasil .= '<option value="'.$h->id_guru.'" selected="selected">'.$h->nama_guru.'</option>';
			} else {
				$hasil .= '<option value="'.$h->id_guru.'">'.$h->nama_guru.'</option>';
			}
		}
		return $hasil;
	}



public function combo_mapel($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT id_mapel,nama_mapel FROM mst_mapel WHERE aktif_mapel = 1 ORDER BY id_mapel ASC");
		$hasil .= '<option selected="selected" value>PILIH MAPEL</option>';
		foreach($q->result() as $h) {
			if($id == $h->id_mapel) {
				$hasil .= '<option value="'.$h->id_mapel.'" selected="selected">'.$h->nama_mapel.'</option>';
			} else {
				$hasil .= '<option value="'.$h->id_mapel.'">'.$h->nama_mapel.'</option>';
			}
		}
		return $hasil;
	}



	public function combo_tahun_ajaran($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT * FROM mst_tahun_ajaran ORDER BY id_tahun_ajaran DESC");
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





}