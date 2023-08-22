<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class konfirmasi extends CI_Controller {


	public function __construct(){
		parent::__construct();
		if($this->session->userdata('hak_akses') != "admin" && $this->session->userdata('hak_akses') != "gurubk" && $this->session->userdata('hak_akses') != "guru") { 
			redirect(base_url());
		} else {
			$this->load->Model('Alumni_model');
		}
	}


	public function index() {
		$d['judul'] = "Konfirmasi Pendaftaran Alumni";
		$d['alumin'] = $this->Alumni_model->alumin();
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('konfirmasi/konfirmasi');
		$this->load->view('bottom');
	}

	public function save_terima($id)
	{
		$where['id_alumni'] = $id;
		$in['status_aktif'] = 1;
		$this->db->update("mst_alumni",$in, $where);
		$this->session->set_flashdata("success", "Pendaftaran Alumni Diterima");
		redirect("konfirmasi");
	}

	public function save_tolak($id)
	{
		$where['id_alumni'] = $id;
		$in['status_aktif'] = 2;
		$this->db->update("mst_alumni",$in, $where);
		$this->session->set_flashdata("success", "Pendaftaran Alumni Ditolak");
		redirect("konfirmasi");
	}
}