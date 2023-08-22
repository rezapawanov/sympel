<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('hak_akses') != "admin") {
			redirect(base_url());
		} else {
			$this->load->Model('Laporan_model');
			$this->load->Model('Combo_model');
		}
	}

	public function index() {
		redirect(base_url());
	}


	public function proses_tampil_arsip() {
		$tgl_awal 	= $this->input->post("tgl_awal");
		$tgl_akhir 	= $this->input->post("tgl_akhir");
		if(empty($this->input->post("id_ruangan"))) {
			$id_ruangan = 'all';
		} else {
			$id_ruangan = $this->input->post("id_ruangan");
        }
        
		if(empty($this->input->post("id_lemari"))) {
			$id_lemari = 'all';
		} else {
			$id_lemari 	= $this->input->post("id_lemari");
		}

		if(empty($this->input->post("id_rak"))) {
			$id_rak = 'all';
		} else {
			$id_rak 	= $this->input->post("id_rak");
        }
        
        if(empty($this->input->post("id_box"))) {
			$id_box = 'all';
		} else {
			$id_box 	= $this->input->post("id_box");
        }
        
        if(empty($this->input->post("id_map"))) {
			$id_map = 'all';
		} else {
			$id_map 	= $this->input->post("id_map");
        }
        
        if(empty($this->input->post("id_urut"))) {
			$id_urut = 'all';
		} else {
			$id_urut 	= $this->input->post("id_urut");
		}

        if(empty($this->input->post("jenis_dokumen"))) {
			$jenis_dokumen = 'all';
		} else {
			$jenis_dokumen 	= $this->input->post("jenis_dokumen");
		}

		redirect("laporan/arsip/".$tgl_awal."/".$tgl_akhir."/".$id_ruangan.'/'.$id_lemari.'/'.$id_rak.'/'.$id_box.'/'.$id_map.'/'.$id_urut.'/'.$jenis_dokumen);
	}


	public function arsip($tgl_awal="",$tgl_akhir="",$id_ruangan="",$id_lemari="",$id_rak="",$id_box="",$id_map="",$id_urut="",$jenis_dokumen="") {
	
        $d['judul'] = "Laporan Arsip";
        
        $d['combo_ruangan'] = $this->Combo_model->combo_ruangan();
        $d['combo_lemari'] = $this->Combo_model->combo_lemari();
        $d['combo_rak'] = $this->Combo_model->combo_rak();
        $d['combo_box'] = $this->Combo_model->combo_box();
        $d['combo_map'] = $this->Combo_model->combo_map();
        $d['combo_urut'] = $this->Combo_model->combo_urut();
        $d['combo_jenis_dokumen'] = $this->Combo_model->combo_jenis_dokumen();

		if(!empty($tgl_awal) && !empty($tgl_akhir)) {
			$d['tgl_awal'] = $tgl_awal;
			$d['tgl_akhir'] = $tgl_akhir;
			$tgl_awal 	= date("Y-m-d",strtotime($tgl_awal));
            $tgl_akhir 	= date("Y-m-d",strtotime($tgl_akhir));
			$d['laporan_arsip'] = $this->Laporan_model->arsip($tgl_awal,$tgl_akhir,$id_ruangan,$id_lemari,$id_rak,$id_box,$id_map,$id_urut,$jenis_dokumen);
		} else {
			$d['laporan_arsip'] = "";
			$d['tgl_awal'] = date("d-m-Y");
			$d['tgl_akhir'] = date("d-m-Y");
		}
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('laporan/laporan_arsip');
		$this->load->view('bottom');	
	}
}