<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('tipe') != "root") {
			redirect("../" . $this->session->userdata('tipe'));
		} 
	}

	public function index() {
		if ($this->session->userdata('tipe') != "root") {
			redirect("../" . $this->session->userdata('tipe'));
		} else {
			$d['judul'] = "Dashboard";
			$d['log_login'] = $this->db->query("SELECT * FROM log_login ORDER BY id DESC LIMIT 10");
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('home/home');
			$this->load->view('bottom');
		} 
	}

	

}
