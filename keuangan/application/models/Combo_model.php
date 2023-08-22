<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Combo_model extends CI_Model {



	public function combo_pos_keuangan($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT * FROM mst_pos_keuangan  ORDER BY id_pos_keuangan ASC");
		$hasil .= '<option selected="selected" value>PILIH</option>';
		foreach($q->result() as $h) {
			if($id == $h->id_pos_keuangan) {
				$hasil .= '<option value="'.$h->id_pos_keuangan.'" selected="selected">'.$h->nama_pos_keuangan.'</option>';
			} else {
				$hasil .= '<option value="'.$h->id_pos_keuangan.'">'.$h->nama_pos_keuangan.'</option>';
			}
		}
		return $hasil;
	}

	public function combo_tahun_ajaran_only($id="") {
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

	public function combo_kelas($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT id_kelas,nama_kelas FROM mst_kelas WHERE aktif_kelas = 1 ORDER BY id_kelas ASC");
		$hasil .= '<option selected="selected" value>[ PILIH KELAS ]</option>';
		foreach($q->result() as $h) {
			if($id == $h->id_kelas) {
				$hasil .= '<option value="'.$h->id_kelas.'" selected="selected">'.$h->nama_kelas.'</option>';
			} else {
				$hasil .= '<option value="'.$h->id_kelas.'">'.$h->nama_kelas.'</option>';
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

	public function combo_jenis_pembayaran($id="",$tahun_ajaran) {
		$hasil = "";
		$q = $this->db->query("SELECT * FROM mst_jenis_pembayaran 
								INNER JOIN mst_pos_keuangan ON mst_jenis_pembayaran.id_pos_keuangan = mst_pos_keuangan.id_pos_keuangan WHERE tahun_ajaran = '$tahun_ajaran' ORDER BY id_jenis_pembayaran ASC");
		$hasil .= '<option selected="selected" value="all">[ SEMUA JENIS PEMBAYARAN ]</option>';
		foreach($q->result() as $h) {
			if($id == $h->id_jenis_pembayaran) {
				$hasil .= '<option value="'.$h->id_jenis_pembayaran.'" selected="selected">'.$h->nama_pos_keuangan.' - '.$h->tahun_ajaran.'</option>';
			} else {
				$hasil .= '<option value="'.$h->id_jenis_pembayaran.'">'.$h->nama_pos_keuangan.' - '.$h->tahun_ajaran.'</option>';
			}
		}
		return $hasil;
	}

	public function combo_jenis_pembayaran_wajib($id="",$tahun_ajaran) {
		$hasil = "";
		$q = $this->db->query("SELECT * FROM mst_jenis_pembayaran 
								INNER JOIN mst_pos_keuangan ON mst_jenis_pembayaran.id_pos_keuangan = mst_pos_keuangan.id_pos_keuangan WHERE tahun_ajaran = '$tahun_ajaran' ORDER BY id_jenis_pembayaran ASC");
		$hasil .= '<option selected="selected" value>[ PILIH JENIS PEMBAYARAN ]</option>';
		foreach($q->result() as $h) {
			if($id == $h->id_jenis_pembayaran) {
				$hasil .= '<option value="'.$h->id_jenis_pembayaran.'" selected="selected">'.$h->nama_pos_keuangan.' - '.$h->tahun_ajaran.'</option>';
			} else {
				$hasil .= '<option value="'.$h->id_jenis_pembayaran.'">'.$h->nama_pos_keuangan.' - '.$h->tahun_ajaran.'</option>';
			}
		}
		return $hasil;
	}

	public function combo_user($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT id_user,nama,nama_jabatan FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE hak_akses = 'das' ORDER BY id_user ASC");
		$hasil .= '<option selected="selected" value>[ PILIH USER ]</option>';
		foreach($q->result() as $h) {
			if($id == $h->id_user) {
				$hasil .= '<option value="'.$h->id_user.'" selected="selected">'.$h->nama.' - '.$h->nama_jabatan.'</option>';
			} else {
				$hasil .= '<option value="'.$h->id_user.'">'.$h->nama.' - '.$h->nama_jabatan.'</option>';
			}
		}
		return $hasil;
	}

	public function combo_user_rpt($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT id_user,nama,nama_jabatan FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE hak_akses = 'das' ORDER BY id_user ASC");
		$hasil .= '<option selected="selected" value="all">[ SEMUA USER ]</option>';
		foreach($q->result() as $h) {
			if($id == $h->id_user) {
				$hasil .= '<option value="'.$h->id_user.'" selected="selected">'.$h->nama.' - '.$h->nama_jabatan.'</option>';
			} else {
				$hasil .= '<option value="'.$h->id_user.'">'.$h->nama.' - '.$h->nama_jabatan.'</option>';
			}
		}
		return $hasil;
	}

	public function combo_user_bendahara($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT id_user,nama,nama_jabatan FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE hak_akses = 'bendahara' ORDER BY id_user ASC");
		$hasil .= '<option selected="selected" value="all">[ SEMUA USER ]</option>';
		foreach($q->result() as $h) {
			if($id == $h->id_user) {
				$hasil .= '<option value="'.$h->id_user.'" selected="selected">'.$h->nama.' - '.$h->nama_jabatan.'</option>';
			} else {
				$hasil .= '<option value="'.$h->id_user.'">'.$h->nama.' - '.$h->nama_jabatan.'</option>';
			}
		}
		return $hasil;
	}

	public function combo_das_kategori($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT * FROM das_kategori ORDER BY id_das_kategori DESC");
		$hasil .= '<option selected="selected" value>[ PILIH JENIS DANA ]</option>';
		foreach($q->result() as $h) {
			if($id == $h->id_das_kategori) {
				$hasil .= '<option value="'.$h->id_das_kategori.'" selected="selected">'.$h->jenis_dana.' - '.$h->tahun_ajaran.'</option>';
			} else {
				$hasil .= '<option value="'.$h->id_das_kategori.'">'.$h->jenis_dana.' - '.$h->tahun_ajaran.'</option>';
			}
		}
		return $hasil;
	}
}