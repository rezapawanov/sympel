<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Siswa_model extends CI_Model {

	public function cek_siswa($id){
		$this->db->select('nis,nama_siswa,nama_kelas,id_siswa,foto,mst_siswa.id_kelas'); 
		$this->db->from('mst_siswa'); 
		$this->db->join('mst_kelas', 'mst_siswa.id_kelas = mst_kelas.id_kelas'); 
		$this->db->where('id_siswa', $id); 
		return $this->db->get()->row();
	}

	public function siswa($id_kelas) {
		$q = $this->db->query("SELECT * FROM mst_siswa  
		INNER JOIN mst_kelas ON mst_siswa.id_kelas = mst_kelas.id_kelas 
		 ORDER BY nama_siswa ASC");
		return $q;
	}

	public function siswa_pindah_kelas($id_kelas,$angkatan) {
		if(!empty($angkatan)) {
			$angkatan = "AND angkatan ='$angkatan'";
		}
		$q = $this->db->query("SELECT * FROM mst_siswa  
				INNER JOIN mst_kelas ON mst_siswa.id_kelas = mst_kelas.id_kelas 
 ORDER BY nama_siswa ASC");
		return $q;
	}

	
	public function siswa_all($id_kelas) {
		$q = $this->db->query("SELECT * FROM mst_siswa 
		INNER JOIN mst_kelas ON mst_siswa.id_kelas = mst_kelas.id_kelas 
		WHERE id_kelas = '$id_kelas'");
		return $q;
	}
	

	public function siswa_detail($nis) {
		$q = $this->db->query("SELECT * FROM mst_siswa  
		INNER JOIN mst_kelas ON mst_siswa.id_kelas = mst_kelas.id_kelas 
		 WHERE nis = '$nis'");
	return $q;


	}
	
	public function siswa_edit($id_siswa) {
		$q = $this->db->query("SELECT * FROM mst_siswa WHERE id_siswa = $id_siswa");
		return $q;
	}
	public function pembayaran_siswa_bebas($tahun_ajaran,$id_siswa) {
		$q = $this->db->query("SELECT * FROM vw_bayar_siswa_bebas WHERE tahun_ajaran = '$tahun_ajaran' AND tipe_pembayaran = 'Bebas' AND id_siswa = '$id_siswa'");
		return $q;
	}

	public function pembayaran_siswa_bulanan($tahun_ajaran,$id_siswa) {
		$this->db->select('id_jenis_pembayaran, id_siswa, nama_pos_keuangan, tahun_ajaran');
		$this->db->where('tahun_ajaran', $tahun_ajaran);
		$this->db->where('tipe_pembayaran', 'Bulanan');
		$this->db->where('id_siswa', $id_siswa);
		$this->db->group_by('id_jenis_pembayaran, id_siswa, nama_pos_keuangan, tahun_ajaran');
		// $q = $this->db->query("SELECT * FROM vw_bayar_siswa WHERE tahun_ajaran = '$tahun_ajaran' AND tipe_pembayaran = 'Bulanan' AND id_siswa = '$id_siswa' GROUP BY id_jenis_pembayaran");
		// return $q;
		return $this->db->get('vw_bayar_siswa');
	}

	public function pembayaran_bulanan_terakhir($tahun_ajaran,$id_siswa) {
		$q = $this->db->query("SELECT * FROM vw_bayar_siswa WHERE tahun_ajaran = '$tahun_ajaran' AND tipe_pembayaran = 'Bulanan' AND id_siswa = '$id_siswa' AND bayar > 0 ORDER BY tanggal DESC");
		return $q;
	}

	public function pelanggaran_siswa_id($id_siswa,$tahun_ajaran) {
		$q = $this->db->query("SELECT * FROM pelanggaran_siswa 
							INNER JOIN mst_poin_pelanggaran ON pelanggaran_siswa.id_poin_pelanggaran = mst_poin_pelanggaran.id_poin_pelanggaran 
		WHERE id_siswa = '$id_siswa' AND tahun_ajaran = '$tahun_ajaran' ORDER BY id_pelanggaran_siswa DESC");
		return $q;
	}


	public function buku() {
		$q = $this->db->query("SELECT * FROM mst_book 
								LEFT JOIN mst_kategori ON mst_book.id_kategori = mst_kategori.id_kategori 
								LEFT JOIN mst_sumber ON mst_book.id_sumber = mst_sumber.id_sumber
								ORDER BY id_buku DESC");
		return $q;
	}
}