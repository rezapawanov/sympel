<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agenda_model extends CI_Model {

	public function agenda() {
		$q = $this->db->query("SELECT * FROM agenda_display ORDER BY id_agenda DESC");
		return $q;
	}

	public function agenda_edit($id) {
		$q = $this->db->query("SELECT * FROM agenda_display WHERE id_agenda = '$id'");
		return $q;
	}
}