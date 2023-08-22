<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	public function index() {
		if($this->session->userdata('hak_akses') != "") { 
			$d['judul'] = "Dashboard";
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('home/home_admin');
			$this->load->view('bottom');
		} else {
			redirect(base_url());
		}
	}

}
