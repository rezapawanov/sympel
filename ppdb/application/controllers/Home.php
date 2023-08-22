<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


	public function index()
	{
		if ($this->session->userdata('hak_akses') != "") {
			$d['judul'] = "Dashboard";
			
			$hitung_daftar = $this->db->query("SELECT COUNT(*) as hitung FROM ppdb_siswa")->row();
			$hitung_tolak = $this->db->query("SELECT COUNT(*) as hitung FROM ppdb_siswa WHERE status = '2'")->row();
			$hitung_terima = $this->db->query("SELECT COUNT(*) as hitung FROM ppdb_siswa WHERE status = '1'")->row();
			$hitung_pria = $this->db->query("SELECT COUNT(*) as hitung FROM ppdb_siswa WHERE jenis_kelamin = 'Laki-laki'")->row();
			$hitung_wanita = $this->db->query("SELECT COUNT(*) as hitung FROM ppdb_siswa WHERE jenis_kelamin = 'Perempuan'")->row();
			$d['hitung_daftar'] = $hitung_daftar->hitung;
			$d['hitung_tolak'] = $hitung_tolak->hitung;
			$d['hitung_terima'] = $hitung_terima->hitung;
			$d['hitung_pria'] = $hitung_pria->hitung;
			$d['hitung_wanita'] = $hitung_wanita->hitung;
			$this->load->view('top', $d);
			$this->load->view('menu');
			$this->load->view('home/home');
			$this->load->view('bottom');
		} else {
			redirect("login");
		}
	}
}
