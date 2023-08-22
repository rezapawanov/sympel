<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('hak_akses') != "admin" && $this->session->userdata('hak_akses') != "gurubk" && $this->session->userdata('hak_akses') != "guru") {
			redirect(base_url());
		} else {
			$this->load->Model('Laporan_model');
			$this->load->Model('Combo_model');
		}
	}

	public function index() {
		redirect(base_url());
	}

	public function buku()
	{
		$d['judul'] = "Laporan Data Buku";
		$d['buku'] = $this->Laporan_model->buku();
		$get = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
			$d['nama_sekolah'] = $get->nama_sekolah;
			$d['alamat_sekolah'] = $get->alamat;
			$d['website'] = $get->website;
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('laporan/buku');
		$this->load->view('bottom');
	}

	public function buku_excel()
	{
		$d['judul'] = "Laporan Data Buku";
		$d['buku'] = $this->Laporan_model->buku();
		$this->load->view('laporan/buku_excel',$d);
	}


	public function proses_tampil_peminjaman() {
		$tgl_awal 	= $this->input->post("tgl_awal");
		$tgl_akhir 	= $this->input->post("tgl_akhir");
		redirect("laporan/peminjaman/".$tgl_awal."/".$tgl_akhir);
	}

	public function proses_tampil_pengunjung() {
		$tgl_awal 	= $this->input->post("tgl_awal");
		$tgl_akhir 	= $this->input->post("tgl_akhir");
		redirect("laporan/pengunjung/".$tgl_awal."/".$tgl_akhir."/".$this->input->post("keperluan"));
	}


	public function peminjaman($tgl_awal="",$tgl_akhir="") {
		$d['judul'] = "Laporan Data Peminjaman Buku";
		if(!empty($tgl_awal) && !empty($tgl_akhir)) {
			$d['tgl_awal'] = $tgl_awal;
			$d['tgl_akhir'] = $tgl_akhir;
		
			$tgl_awal 	= date("Y-m-d",strtotime($tgl_awal));
			$tgl_akhir 	= date("Y-m-d",strtotime($tgl_akhir));
			$d['peminjaman'] = $this->Laporan_model->peminjaman($tgl_awal,$tgl_akhir);
		} else {
			$d['peminjaman'] = "";
			$d['tgl_awal'] = date("d-m-Y");
			$d['tgl_akhir'] = date("d-m-Y");
		}
		$get = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
			$d['nama_sekolah'] = $get->nama_sekolah;
			$d['alamat_sekolah'] = $get->alamat;
			$d['website'] = $get->website;
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('laporan/peminjaman');
		$this->load->view('bottom');	
	}

	public function peminjaman_excel($tgl_awal="",$tgl_akhir="") {
		$d['judul'] = "Laporan  Peminjaman Buku";
		if(!empty($tgl_awal) && !empty($tgl_akhir)) {
			$d['tgl_awal'] = $tgl_awal;
			$d['tgl_akhir'] = $tgl_akhir;
		
			$tgl_awal 	= date("Y-m-d",strtotime($tgl_awal));
			$tgl_akhir 	= date("Y-m-d",strtotime($tgl_akhir));
			$d['peminjaman'] = $this->Laporan_model->peminjaman($tgl_awal,$tgl_akhir);
		} else {
			$d['peminjaman'] = "";
			$d['tgl_awal'] = date("d-m-Y");
			$d['tgl_akhir'] = date("d-m-Y");
		}
		$this->load->view('laporan/peminjaman_excel',$d);
	}


	public function pengunjung($tgl_awal="",$tgl_akhir="",$keperluan="") {
		$d['judul'] = "Laporan  Pengunjung Perpustakaan";
		if(!empty($tgl_awal) && !empty($tgl_akhir)) {
			$keperluan = urldecode($keperluan);
			$d['tgl_awal'] = $tgl_awal;
			$d['tgl_akhir'] = $tgl_akhir;
			$tgl_awal 	= date("Y-m-d",strtotime($tgl_awal));
			$tgl_akhir 	= date("Y-m-d",strtotime($tgl_akhir));
			$d['pengunjung'] = $this->Laporan_model->pengunjung($tgl_awal,$tgl_akhir,$keperluan);
		} else {
			$d['pengunjung'] = "";
			$d['tgl_awal'] = date("d-m-Y");
			$d['tgl_akhir'] = date("d-m-Y");
		}
		$get = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
			$d['nama_sekolah'] = $get->nama_sekolah;
			$d['alamat_sekolah'] = $get->alamat;
			$d['website'] = $get->website;
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('laporan/pengunjung');
		$this->load->view('bottom');	
	}

	public function pengunjung_excel($tgl_awal="",$tgl_akhir="",$keperluan="") {
		$d['judul'] = "Laporan  Pengunjung Perpustakaan";
		if(!empty($tgl_awal) && !empty($tgl_akhir)) {
			$keperluan = urldecode($keperluan);
			$d['tgl_awal'] = $tgl_awal;
			$d['tgl_akhir'] = $tgl_akhir;
			$tgl_awal 	= date("Y-m-d",strtotime($tgl_awal));
			$tgl_akhir 	= date("Y-m-d",strtotime($tgl_akhir));
			$d['pengunjung'] = $this->Laporan_model->pengunjung($tgl_awal,$tgl_akhir,$keperluan);
		} else {
			$d['pengunjung'] = "";
			$d['tgl_awal'] = date("d-m-Y");
			$d['tgl_akhir'] = date("d-m-Y");
		}
		$this->load->view('laporan/pengunjung_excel',$d);
	}
}