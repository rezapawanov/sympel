<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_model extends CI_Model {

	public function alumni() {
		$q = $this->db->query("SELECT * FROM mst_alumni WHERE status_aktif = 1 ORDER BY id_alumni DESC");
		return $q;
	}

	public function laporan_alumni($aktivitas, $angkatan) {
		if(empty($angkatan)) {
			$param1 = "";
		} else {
			$param1 = "AND angkatan = '$angkatan'";
		}

		if(empty($aktivitas) || $aktivitas == 'all') {
			$param2 = "";
		} else {
			if($aktivitas == 'Kerja') {
				$param2 = "AND aktivitas_1 = '$aktivitas'";

			} else if($aktivitas == 'Kuliah') {
				$param2 = "AND aktivitas_2 = '$aktivitas'";
			} else if($aktivitas == 'Wirausaha') {
				$param2 = "AND aktivitas_3 = '$aktivitas'";
			} else if($aktivitas == 'Yang Lain') {
				$param2 = "AND aktivitas_4 = '$aktivitas'";
			}
		}
		$q = $this->db->query("SELECT * FROM mst_alumni WHERE status_aktif = 1 $param1 $param2 ORDER BY id_alumni DESC");
		return $q;
	}
}