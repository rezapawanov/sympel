<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


	public function index()
	{
		if ($this->session->userdata('hak_akses') != "") {
			$d['judul'] = "Dashboard";
			
			$hitung_siswa = $this->db->query("SELECT COUNT(*) as hitung FROM kelulusan_siswa")->row();
			$hitung_tolak = $this->db->query("SELECT COUNT(*) as hitung FROM ppdb_siswa WHERE status = 'TIDAK LULUS'")->row();
			$hitung_terima = $this->db->query("SELECT COUNT(*) as hitung FROM kelulusan_siswa WHERE status = 'LULUS'")->row();
			$d['hitung_siswa'] = $hitung_siswa->hitung;
			$d['hitung_tolak'] = $hitung_tolak->hitung;
			$d['hitung_terima'] = $hitung_terima->hitung;
			$this->load->view('top', $d);
			$this->load->view('menu');
			$this->load->view('home/home');
			$this->load->view('bottom');
		} else {
			redirect("login");
		}
	}
}
