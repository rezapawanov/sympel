<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {


	public function admin() {
		$q = $this->db->query("SELECT * FROM mst_user 
									INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan 
									 ORDER BY id_user DESC");
		return $q;
	}

	public function admin_edit($id) {
		$q = $this->db->query("SELECT * FROM mst_user WHERE id_user = '$id'");
		return $q;
	}
}