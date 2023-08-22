<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {


	public function index() {
		if($this->session->userdata('hak_akses') != "") {
			redirect(base_url().'home');
		} else {
			redirect('../');
			//$this->load->view("login");
		}
	}

	public function agenda_save() {
		$tanggal = $this->input->post("date");
		$ex_tanggal = explode("-",$tanggal);
		$in['title'] = $this->input->post("info");
		$in['start'] = date("Y-m-d",strtotime($tanggal));
		$in['end'] = date("Y-m-d",strtotime($tanggal));
		$in['year'] = $ex_tanggal[0];
		$this->db->insert("calendar_akademik",$in);
		redirect(base_url().'home');	
	}

	public function agenda_hapus() {
		$where['id'] = $this->input->post("id");	
		$this->db->delete("calendar_akademik",$where);
		redirect(base_url().'home');	
	}

}
