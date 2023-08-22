<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


	public function index()
	{
		if ($this->session->userdata('hak_akses') != "") {
			$d['judul'] = "Dashboard";
			$hitung_sarpras = $this->db->query("SELECT COUNT(*) as hitung FROM sarpras")->row();
			$hitung_rak = $this->db->query("SELECT COUNT(*) as hitung FROM mst_rak")->row();
			$hitung_box = $this->db->query("SELECT COUNT(*) as hitung FROM mst_box")->row();
			$hitung_map = $this->db->query("SELECT COUNT(*) as hitung FROM mst_map")->row();
			$d['hitung_sarpras'] = $hitung_sarpras->hitung;
			$d['hitung_rak'] = $hitung_rak->hitung;
			$d['hitung_box'] = $hitung_box->hitung;
			$d['hitung_map'] = $hitung_map->hitung;
			$d['data_jenis'] = $this->db->query("SELECT * FROM mst_jenis_barang");
			$this->load->view('top', $d);
			$this->load->view('menu');
			$this->load->view('home/home');
			$this->load->view('bottom');
		} else {
			redirect("login");
		}
	}

	public function get_calendar()
	{
		$q = $this->db->query("SELECT * FROM calendar_arsip ORDER BY id DESC");
		echo json_encode($q->result_array());
	}
}
