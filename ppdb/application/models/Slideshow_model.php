<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slideshow_model extends CI_Model {

	public function slideshow() {
		$q = $this->db->query("SELECT * FROM ppdb_slideshow ORDER BY id_slideshow DESC");
		return $q;
	}

}