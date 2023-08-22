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


	public function proses_tampil_pelanggaran() {
		$tgl_awal 	= $this->input->post("tgl_awal");
		$tgl_akhir 	= $this->input->post("tgl_akhir");

		if(empty($this->input->post("id_siswa"))) {
			$id_siswa = 'all';
		} else {
			$ex = explode("-",$this->input->post("id_siswa"));
			$id_siswa = $ex[0];
		}
		if(empty($this->input->post("tahun_ajaran"))) {
			$tahun_ajaran = 'all';
		} else {
			$tahun_ajaran 	= str_replace("/","-",$this->input->post("tahun_ajaran"));
		}

		if(empty($this->input->post("id_kelas"))) {
			$id_kelas = 'all';
		} else {
			$id_kelas 	= $this->input->post("id_kelas");
		}
		
		if(empty($this->input->post("id_poin_pelanggaran"))) {
			$id_poin_pelanggaran = 'all';
		} else {
			$id_poin_pelanggaran 	= $this->input->post("id_poin_pelanggaran");
		}
		
		
		redirect("laporan/pelanggaran_siswa/".$tgl_awal."/".$tgl_akhir."/".$tahun_ajaran.'/'.$id_kelas.'/'.$id_siswa.'/'.$id_poin_pelanggaran);
	}


	public function proses_tampil_bimbingan() {
		$tgl_awal 	= $this->input->post("tgl_awal");
		$tgl_akhir 	= $this->input->post("tgl_akhir");

		if(empty($this->input->post("id_siswa"))) {
			$id_siswa = 'all';
		} else {
			$ex = explode("-",$this->input->post("id_siswa"));
			$id_siswa = $ex[0];
		}
		if(empty($this->input->post("tahun_ajaran"))) {
			$tahun_ajaran = 'all';
		} else {
			$tahun_ajaran 	= str_replace("/","-",$this->input->post("tahun_ajaran"));
		}

		if(empty($this->input->post("id_kelas"))) {
			$id_kelas = 'all';
		} else {
			$id_kelas 	= $this->input->post("id_kelas");
		}
		
		if(empty($this->input->post("id_bimbingan_siswa"))) {
			$id_bimbingan_siswa = 'all';
		} else {
			$id_bimbingan_siswa 	= $this->input->post("id_bimbingan_siswa");
		}
		
		
		redirect("laporan/bimbingan_siswa/".$tgl_awal."/".$tgl_akhir."/".$tahun_ajaran.'/'.$id_kelas.'/'.$id_siswa.'/'.$id_bimbingan_siswa);
	}


	public function proses_tampil_absen() {
		$tgl_awal 	= $this->input->post("tgl_awal");
		$tgl_akhir 	= $this->input->post("tgl_akhir");
		if(empty($this->input->post("id_siswa"))) {
			$id_siswa = 'all';
		} else {
			$ex = explode("-",$this->input->post("id_siswa"));
			$id_siswa = $ex[0];
		}
		if(empty($this->input->post("tahun_ajaran"))) {
			$tahun_ajaran = 'all';
		} else {
			$tahun_ajaran 	= str_replace("/","-",$this->input->post("tahun_ajaran"));
		}

		if(empty($this->input->post("id_kelas"))) {
			$id_kelas = 'all';
		} else {
			$id_kelas 	= $this->input->post("id_kelas");
		}

		if(empty($this->input->post("keterangan"))) {
			$keterangan = 'all';
		} else {
			$keterangan 	= $this->input->post("keterangan");
		}


		redirect("laporan/absen_siswa/".$tgl_awal."/".$tgl_akhir."/".$tahun_ajaran.'/'.$id_kelas.'/'.$id_siswa.'/'.$keterangan);
	}

	public function proses_tampil_poin_siswa() {
		
		if(empty($this->input->post("tahun_ajaran"))) {
			$tahun_ajaran = '';
		} else {
			$tahun_ajaran 	= str_replace("/","-",$this->input->post("tahun_ajaran"));
		}

		if(empty($this->input->post("id_kelas"))) {
			$id_kelas = 'all';
		} else {
			$id_kelas 	= $this->input->post("id_kelas");
		}
		
	
		
		redirect("laporan/poin_siswa/".$tahun_ajaran.'/'.$id_kelas);
	}


	public function pelanggaran_siswa($tgl_awal="",$tgl_akhir="",$tahun_ajaran="",$id_kelas="",$id_siswa="",$id_poin_pelanggaran="") {
		if(empty($tahun_ajaran) || $tahun_ajaran == 'all') {
			$get_tahunajaran = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = '1'")->row();
			$tahun_ajaran = $get_tahunajaran->tahun_ajaran;
		} else {
			$tahun_ajaran 	= str_replace("-","/",$tahun_ajaran);
		}
		$d['judul'] = "Laporan Pelanggaran Siswa";
		$d['combo_kelas'] = $this->Combo_model->combo_kelas_report();
		$d['combo_poin_pelanggaran'] = $this->Combo_model->combo_pelanggaran_rpt();
		$d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran_only($tahun_ajaran);
		if(!empty($tgl_awal) && !empty($tgl_akhir)) {
			$d['tgl_awal'] = $tgl_awal;
			$d['tgl_akhir'] = $tgl_akhir;
			$tgl_awal 	= date("Y-m-d",strtotime($tgl_awal));
			$tgl_akhir 	= date("Y-m-d",strtotime($tgl_akhir));
			$d['tahun_ajaran'] = $tahun_ajaran;
			$d['pelanggaran_siswa'] = $this->Laporan_model->pelanggaran_siswa($tgl_awal,$tgl_akhir,$tahun_ajaran,$id_kelas,$id_siswa,$id_poin_pelanggaran);
		} else {
			$d['pelanggaran_siswa'] = "";
			$d['tgl_awal'] = date("d-m-Y");
			$d['tgl_akhir'] = date("d-m-Y");
		}
		$get = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
			$d['nama_sekolah'] = $get->nama_sekolah;
			$d['alamat_sekolah'] = $get->alamat;
			$d['website'] = $get->website;
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('laporan/pelanggaran_siswa');
		$this->load->view('bottom');	
	}

	
public function bimbingan_siswa($tgl_awal="",$tgl_akhir="",$tahun_ajaran="",$id_kelas="",$id_siswa="",$id_bimbingan_siswa="") {
	if(empty($tahun_ajaran) || $tahun_ajaran == 'all') {
		$get_tahunajaran = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = '1'")->row();
		$tahun_ajaran = $get_tahunajaran->tahun_ajaran;
	} else {
		$tahun_ajaran 	= str_replace("-","/",$tahun_ajaran);
	}
	$d['judul'] = "Laporan bimbingan Siswa";
	$d['combo_kelas'] = $this->Combo_model->combo_kelas_report();
	$d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran_only($tahun_ajaran);
	if(!empty($tgl_awal) && !empty($tgl_akhir)) {
		$d['tgl_awal'] = $tgl_awal;
		$d['tgl_akhir'] = $tgl_akhir;
		$tgl_awal 	= date("Y-m-d",strtotime($tgl_awal));
		$tgl_akhir 	= date("Y-m-d",strtotime($tgl_akhir));
		$d['tahun_ajaran'] = $tahun_ajaran;
		$d['bimbingan_siswa'] = $this->Laporan_model->bimbingan_siswa($tgl_awal,$tgl_akhir,$tahun_ajaran,$id_kelas,$id_siswa,$id_bimbingan_siswa);
	} else {
		$d['bimbingan_siswa'] = "";
		$d['tgl_awal'] = date("d-m-Y");
		$d['tgl_akhir'] = date("d-m-Y");
	}
	$get = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
		$d['nama_sekolah'] = $get->nama_sekolah;
		$d['alamat_sekolah'] = $get->alamat;
		$d['website'] = $get->website;
	$this->load->view('top',$d);
	$this->load->view('menu');
	$this->load->view('laporan/bimbingan_siswa');
	$this->load->view('bottom');	
}


	public function absen_siswa($tgl_awal="",$tgl_akhir="",$tahun_ajaran="",$id_kelas="",$id_siswa="",$keterangan="") {
		if(empty($tahun_ajaran) || $tahun_ajaran == 'all') {
			$get_tahunajaran = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = '1'")->row();
			$tahun_ajaran = $get_tahunajaran->tahun_ajaran;
		} else {
			$tahun_ajaran 	= str_replace("-","/",$tahun_ajaran);
		}
		$d['judul'] = "Laporan Absen Siswa";
		$d['combo_kelas'] = $this->Combo_model->combo_kelas_report();
		$d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran_only($tahun_ajaran);
		if(!empty($tgl_awal) && !empty($tgl_akhir)) {
			$d['tgl_awal'] = $tgl_awal;
			$d['tgl_akhir'] = $tgl_akhir;
			$d['tahun_ajaran'] = $tahun_ajaran;
			$tgl_awal 	= date("Y-m-d",strtotime($tgl_awal));
			$tgl_akhir 	= date("Y-m-d",strtotime($tgl_akhir));
			$d['absen'] = $this->Laporan_model->absen($tgl_awal,$tgl_akhir,$tahun_ajaran,$id_kelas,$id_siswa,$keterangan);
		} else {
			$d['absen'] = "";
			$d['tgl_awal'] = date("d-m-Y");
			$d['tgl_akhir'] = date("d-m-Y");
		}
		$get = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
			$d['nama_sekolah'] = $get->nama_sekolah;
			$d['alamat_sekolah'] = $get->alamat;
			$d['website'] = $get->website;
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('laporan/absen_siswa');
		$this->load->view('bottom');	
	}


	public function poin_siswa($tahun_ajaran="",$id_kelas="") {
		
		if(empty($tahun_ajaran)) {
			$get_tahunajaran = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = '1'")->row();
			$tahun_ajaran = $get_tahunajaran->tahun_ajaran;
		} else {
			$tahun_ajaran 	= str_replace("-","/",$tahun_ajaran);
		}
		$d['judul'] = "Laporan Poin Siswa";
		$d['combo_kelas'] = $this->Combo_model->combo_kelas_report();
		$d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran_rpt($tahun_ajaran);
		$d['tahun_ajaran'] = $tahun_ajaran;
		$get = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
			$d['nama_sekolah'] = $get->nama_sekolah;
			$d['alamat_sekolah'] = $get->alamat;
			$d['website'] = $get->website;
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('laporan/poin_siswa');
		$this->load->view('bottom');	
	}
}