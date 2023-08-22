<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


	public function index()
	{
		if ($this->session->userdata('hak_akses') != "") {
			$d['judul'] = "Dashboard";
			$this->load->Model('Tamu_model');
			
			$hitung_tamu = $this->db->query("SELECT COUNT(*) as hitung FROM bukutamu")->row();
			$d['tamu'] = $this->Tamu_model->tamu();
			$d['hitung_tamu'] = $hitung_tamu->hitung;
			$this->load->view('top', $d);
			$this->load->view('menu');
			$this->load->view('home/home');
			$this->load->view('bottom');
		} else {
			redirect("login");
		}
	}
}
