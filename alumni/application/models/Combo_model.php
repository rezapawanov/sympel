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
}