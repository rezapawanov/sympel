<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Master_model extends CI_Model
{


	public function pos_keuangan()
	{
		$q = $this->db->query("SELECT * FROM mst_pos_keuangan ORDER BY id_pos_keuangan DESC");
		return $q;
	}

	public function pos_keuangan_edit($id)
	{
		$q = $this->db->query("SELECT * FROM mst_pos_keuangan WHERE id_pos_keuangan = '$id'");
		return $q;
	}

	public function jenis_pembayaran()
	{
		$q = $this->db->query("SELECT b.nama_pos_keuangan,a.tipe_pembayaran,a.tahun_ajaran,a.aktif_jenis_pembayaran, a.id_jenis_pembayaran, a.tagihan FROM mst_jenis_pembayaran a left join mst_pos_keuangan b on (a.id_pos_keuangan = b.id_pos_keuangan) where a.aktif_jenis_pembayaran = 1 and b.aktif_pos_keuangan =1  ORDER BY a.id_jenis_pembayaran DESC");
		return $q;
	}

	public function jenis_pembayaran_edit($id)
	{
		$q = $this->db->query("SELECT * FROM mst_jenis_pembayaran WHERE id_jenis_pembayaran = '$id'");
		return $q;
	}

	public function tarif_bayar_kelas($kelas, $id, $tipe)
	{
		if ($tipe == 'Bulanan') {
			$q = $this->db->query("SELECT * FROM vw_tarif_kelas WHERE id_kelas = $kelas AND id_jenis_pembayaran = $id");
		} else if ($tipe == 'Bebas') {
			$q = $this->db->query("SELECT * FROM vw_tarif_kelas2 WHERE id_kelas = $kelas AND id_jenis_pembayaran = $id");
		}
		return $q;
	}
}