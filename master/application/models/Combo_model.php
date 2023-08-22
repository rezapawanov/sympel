<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Combo_model extends CI_Model {



	public function combo_jabatan($id="") {
		$hasil = "";
		$q = $this->db->query("SELECT id_jabatan,nama_jabatan FROM mst_jabatan ORDER BY nama_jabatan ASC");
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
}