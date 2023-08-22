<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video_model extends CI_Model {

	public function video() {
		$q = $this->db->query("SELECT * FROM video_display ORDER BY id_video DESC");
		return $q;
	}

	public function video_edit($id) {
		$q = $this->db->query("SELECT * FROM video_display WHERE id_video = '$id'");
		return $q;
	}
}