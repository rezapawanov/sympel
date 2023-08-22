<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurnal extends CI_Controller {


	public function __construct(){
		parent::__construct();
		if($this->session->userdata('hak_akses') != "admin" && $this->session->userdata('hak_akses') != "kasir" && $this->session->userdata('hak_akses') != "bendahara") { 
			redirect(base_url());
		} else {
			$this->load->Model('Jurnal_model');
			$this->load->Model('Combo_model');
		}
	}

	public function index() {
		redirect(base_url());
	}


	public function penerimaan() {
		$d['judul'] = "Data Penerimaan";
		$d['penerimaan'] = $this->Jurnal_model->penerimaan();
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('penerimaan/penerimaan');
		$this->load->view('bottom');	
	}


	public function penerimaan_tambah() {
		$d['judul'] = "Data Penerimaan";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['keterangan'] = "";
		$d['tanggal'] = date("d-m-Y");
		$d['jumlah'] = "";
		$d['id_penerimaan'] = "";
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('penerimaan/penerimaan_tambah');
		$this->load->view('bottom');
		
	}


	public function penerimaan_edit($id_penerimaan) {
		$cek = $this->db->query("SELECT id_penerimaan FROM penerimaan WHERE id_penerimaan = '$id_penerimaan'");
		if($cek->num_rows() > 0) { 
			$d['judul'] = "Data Penerimaan";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$get = $this->Jurnal_model->penerimaan_edit($id_penerimaan);
			$data = $get->row();
			$d['id_penerimaan'] = $data->id_penerimaan;
			$d['keterangan'] = $data->keterangan;
			$d['tanggal'] = $data->tanggal;
			$d['jumlah'] = $data->jumlah;
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('penerimaan/penerimaan_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}	
	}

	public function penerimaan_save() {
			$tipe = $this->input->post("tipe");	
			$in['keterangan'] = $this->input->post("keterangan");
			$in['tanggal'] = date("Y-m-d",strtotime($this->input->post("tanggal")));
			$in['jumlah'] = $this->input->post("jumlah");
			if($tipe == "add") {
				$this->db->insert("penerimaan",$in);
				$this->session->set_flashdata("success","Tambah Data Penerimaan Berhasil");
				redirect("jurnal/penerimaan");
			} elseif($tipe = 'edit') {
				$where['id_penerimaan'] 	= $this->input->post('id_penerimaan');
				$this->db->update("penerimaan",$in,$where);
				$this->session->set_flashdata("success","Ubah Data Penerimaan Berhasil");
				redirect("jurnal/penerimaan");
			} else {
				redirect(base_url());
			}
	}

	public function penerimaan_hapus($id) {
		$where['id_penerimaan'] = $id;
		$this->db->delete("penerimaan",$where);
		$this->session->set_flashdata("success","Hapus Data Penerimaan Berhasil");
		redirect("jurnal/penerimaan");
	}


	public function pengeluaran() {
		$d['judul'] = "Data Pengeluaran";
		$d['pengeluaran'] = $this->Jurnal_model->pengeluaran();
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('pengeluaran/pengeluaran');
		$this->load->view('bottom');	
	}


	public function pengeluaran_tambah() {
		$d['judul'] = "Data Pengeluaran";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['keterangan'] = "";
		$d['tanggal'] = date("d-m-Y");
		$d['jumlah'] = "";
		$d['id_pengeluaran'] = "";
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('pengeluaran/pengeluaran_tambah');
		$this->load->view('bottom');
		
	}


	public function pengeluaran_edit($id_pengeluaran) {
		$cek = $this->db->query("SELECT id_pengeluaran FROM pengeluaran WHERE id_pengeluaran = '$id_pengeluaran'");
		if($cek->num_rows() > 0) { 
			$d['judul'] = "Data Pengeluaran";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$get = $this->Jurnal_model->pengeluaran_edit($id_pengeluaran);
			$data = $get->row();
			$d['id_pengeluaran'] = $data->id_pengeluaran;
			$d['keterangan'] = $data->keterangan;
			$d['tanggal'] = $data->tanggal;
			$d['jumlah'] = $data->jumlah;
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('pengeluaran/pengeluaran_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}	
	}

	public function pengeluaran_save() {
			$tipe = $this->input->post("tipe");	
			$in['keterangan'] = $this->input->post("keterangan");
			$in['tanggal'] = date("Y-m-d",strtotime($this->input->post("tanggal")));
			$in['jumlah'] = $this->input->post("jumlah");
			if($tipe == "add") {
				$this->db->insert("pengeluaran",$in);
				$this->session->set_flashdata("success","Tambah Data Pengeluaran Berhasil");
				redirect("jurnal/pengeluaran");
			} elseif($tipe = 'edit') {
				$where['id_pengeluaran'] 	= $this->input->post('id_pengeluaran');
				$this->db->update("pengeluaran",$in,$where);
				$this->session->set_flashdata("success","Ubah Data Pengeluaran Berhasil");
				redirect("jurnal/pengeluaran");
			} else {
				redirect(base_url());
			}
	}

	public function pengeluaran_hapus($id) {
		$where['id_pengeluaran'] = $id;
		$this->db->delete("pengeluaran",$where);
		$this->session->set_flashdata("success","Hapus Data Pengeluaran Berhasil");
		redirect("jurnal/pengeluaran");
	}
}
