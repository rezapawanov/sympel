<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct(){
		parent::__construct();
			$this->load->Model('Penagihan_model');
	}

	public function index() {
		redirect(base_url());
	}

	public function cari_rekening(){
		if($this->session->userdata('username') != "") { 
			redirect("laporan/rekeningkoran/".$this->input->post("bulan")."/".$this->input->post("tahun"));
		} else {
			redirect("login");
		}
	}


	public function rekeningkoran($bulan="",$tahun="") {
		if($this->session->userdata('username') != "") { 
			$get_saldo = $this->db->query("SELECT * FROM tbl_saldoawal LIMIT 1")->row();
			$d['saldo_awal'] = $get_saldo->jumlah;
			if(empty($tahun)) {
				$d['tahun'] = date("Y");
			} else {
				$d['tahun'] = $tahun;
			}

			if(empty($bulan)) {
				$d['bulan'] = date("m");
			} else {
				$d['bulan'] = $bulan;
			}

			$param = $d['tahun'].'-'.$d['bulan'].'-01';
			$d['rekeningkoran'] = $this->db->query("CALL stored_rekening('$param')");
			$this->load->view('top',$d);
			$this->load->view('laporan/rekeningkoran');
			$this->load->view('bottom');
		} else {
			redirect("login");
		}
	}


	public function cari_rekeningkoran(){
		if($this->session->userdata('username') != "") { 
			redirect("laporan/rekeningkoran/".$this->input->post("bulan")."/".$this->input->post("tahun"));
		} else {
			redirect("login");
		}
	}

	public function rekeningkoran_export($bulan="",$tahun="") {
		if($this->session->userdata('username') != "") { 
			$get_saldo = $this->db->query("SELECT * FROM tbl_saldoawal LIMIT 1")->row();
			$d['saldo_awal'] = $get_saldo->jumlah;
			if(empty($tahun)) {
				$d['tahun'] = date("Y");
			} else {
				$d['tahun'] = $tahun;
			}

			if(empty($bulan)) {
				$d['bulan'] = date("m");
			} else {
				$d['bulan'] = $bulan;
			}

			$param = $d['tahun'].'-'.$d['bulan'].'-01';
			$d['rekeningkoran'] = $this->db->query("CALL stored_rekening('$param')");
			$this->load->view('laporan/rekeningkoran_export',$d);
		} else {
			redirect("login");
		}
	}


	public function penagihan($bulan="",$tahun="",$anggota="",$group="",$jenis="",$status="") {
		if($this->session->userdata('username') != "") { 
			
			if(empty($tahun)) {
				$d['tahun'] = date("Y");
			} else {
				$d['tahun'] = $tahun;
			}
			$d['combo_anggota'] = $this->Penagihan_model->get_combo_anggota($anggota);
			$d['combo_group'] = $this->Penagihan_model->get_combo_group($group);
			$d['combo_jenis'] = $this->Penagihan_model->get_combo_jenis($jenis);



			if(empty($bulan)) {
				$d['bulan'] = date("m");
				$param = "WHERE MONTH(tanggal_event)='$d[bulan]' AND YEAR(tanggal_event)='$d[tahun]'";
			} else if($bulan == 'ALL') {
				$d['bulan'] = $bulan;
				$param = "WHERE MONTH(tanggal_event) >= '01' AND MONTH(tanggal_event) <= '12' AND YEAR(tanggal_event)='$d[tahun]'";
			} else {
				$d['bulan'] = $bulan;
				$param = "WHERE MONTH(tanggal_event)='$d[bulan]' AND YEAR(tanggal_event)='$d[tahun]'";
			}

			if($anggota == 'ALL' || empty($anggota)) {
				$param2 = '';
				$d['anggota'] = 'ALL';
			} else {
				$param2 = 'AND tbl_tagihan.id_anggota = '.$anggota;
				$d['anggota'] = $anggota;
			}

			if(empty($status)) {
				$d['status'] = '';
				$param3 = '';
			} else if($status == '2') {
				$d['status'] = '2';
				$param3 = 'AND (tanggal IS NULL OR tanggal = 0)';
			} else {
				$d['status'] = '1';
				$param3 = 'AND tanggal IS NOT NULL AND tanggal != 0';
			}


			if($group == 'ALL' || empty($group)) {
				$param4 = '';
				$d['group'] = 'ALL';
			} else {
				$param4 = 'AND tbl_anggota.id_group = '.$group;
				$d['group'] = $group;
			}

			if($jenis == 'ALL' || empty($jenis)) {
				$param5 = '';
				$d['jenis'] = 'ALL';
			} else {
				$param5 = 'AND tbl_anggota.id_jenis = '.$jenis;
				$d['jenis'] = $jenis;
			}

			$d['penagihan'] = $this->db->query("SELECT * FROM tbl_tagihan 
													INNER JOIN tbl_anggota ON tbl_tagihan.id_anggota = tbl_anggota.id_anggota
													INNER JOIN tbl_jenis ON tbl_anggota.id_jenis = tbl_jenis.id_jenis 
													LEFT JOIN tbl_group ON tbl_anggota.id_group = tbl_group.id_group  $param $param2 $param3 $param4 $param5 ORDER BY tanggal_event ASC, nama_jenis ASC");
			$this->load->view('top',$d);
			$this->load->view('laporan/penagihan');
			$this->load->view('bottom');
		} else {
			redirect("login");
		}
	}

	public function cari(){
		if($this->session->userdata('username') != "") { 
			redirect("laporan/penagihan/".$this->input->post("bulan")."/".$this->input->post("tahun")."/".$this->input->post("anggota")."/".$this->input->post("group")."/".$this->input->post("jenis")."/".$this->input->post("status"));
		} else {
			redirect("login");
		}
	}



	public function penagihan_export($bulan="",$tahun="",$anggota="",$group="",$jenis="",$status="") {
		if($this->session->userdata('username') != "") { 
			
			if(empty($tahun)) {
				$d['tahun'] = date("Y");
			} else {
				$d['tahun'] = $tahun;
			}
			$d['combo_anggota'] = $this->Penagihan_model->get_combo_anggota($anggota);
			$d['combo_group'] = $this->Penagihan_model->get_combo_group($group);
			$d['combo_jenis'] = $this->Penagihan_model->get_combo_jenis($jenis);



			if(empty($bulan)) {
				$d['bulan'] = date("m");
				$param = "WHERE MONTH(tanggal_event)='$d[bulan]' AND YEAR(tanggal_event)='$d[tahun]'";
			} else if($bulan == 'ALL') {
				$d['bulan'] = $bulan;
				$param = "WHERE MONTH(tanggal_event) >= '01' AND MONTH(tanggal_event) <= '12' AND YEAR(tanggal_event)='$d[tahun]'";
			} else {
				$d['bulan'] = $bulan;
				$param = "WHERE MONTH(tanggal_event)='$d[bulan]' AND YEAR(tanggal_event)='$d[tahun]'";
			}

			if($anggota == 'ALL' || empty($anggota)) {
				$param2 = '';
				$d['anggota'] = 'ALL';
			} else {
				$param2 = 'AND tbl_tagihan.id_anggota = '.$anggota;
				$d['anggota'] = $anggota;
			}

			if(empty($status)) {
				$d['status'] = '';
				$param3 = '';
			} else if($status == '2') {
				$d['status'] = '2';
				$param3 = 'AND (tanggal IS NULL OR tanggal = 0)';
			} else {
				$d['status'] = '1';
				$param3 = 'AND tanggal IS NOT NULL AND tanggal != 0';
			}


			if($group == 'ALL' || empty($group)) {
				$param4 = '';
				$d['group'] = 'ALL';
			} else {
				$param4 = 'AND tbl_anggota.id_group = '.$group;
				$d['group'] = $group;
			}

			if($jenis == 'ALL' || empty($jenis)) {
				$param5 = '';
				$d['jenis'] = 'ALL';
			} else {
				$param5 = 'AND tbl_anggota.id_jenis = '.$jenis;
				$d['jenis'] = $jenis;
			}

			$d['penagihan'] = $this->db->query("SELECT * FROM tbl_tagihan 
													INNER JOIN tbl_anggota ON tbl_tagihan.id_anggota = tbl_anggota.id_anggota
													INNER JOIN tbl_jenis ON tbl_anggota.id_jenis = tbl_jenis.id_jenis 
													LEFT JOIN tbl_group ON tbl_anggota.id_group = tbl_group.id_group  $param $param2 $param3 $param4 $param5 ORDER BY tanggal_event ASC, nama_jenis ASC");
			$this->load->view('laporan/penagihan_export',$d);
		} else {
			redirect("login");
		}
	}
}