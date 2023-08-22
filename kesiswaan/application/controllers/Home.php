<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	public function index() {
		if($this->session->userdata('hak_akses') != "") { 
			$d['judul'] = "Dashboard";
			$get_tahun = $this->db->query("SELECT id_tahun_ajaran,tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();

			$hitung_izin = $this->db->query("SELECT COUNT(*) as hitung FROM absen WHERE keterangan = 'IZIN' AND tahun_ajaran = '$get_tahun->id_tahun_ajaran'")->row();

			$hitung_sakit = $this->db->query("SELECT COUNT(*) as hitung FROM absen WHERE keterangan = 'SAKIT' AND tahun_ajaran = '$get_tahun->id_tahun_ajaran'")->row();

			$hitung_alpa = $this->db->query("SELECT COUNT(*) as hitung FROM absen WHERE keterangan = 'ALPA' AND tahun_ajaran = '$get_tahun->id_tahun_ajaran'")->row();

			$hitung_pelanggaran = $this->db->query("SELECT COUNT(*) as hitung FROM pelanggaran_siswa WHERE tahun_ajaran = '$get_tahun->tahun_ajaran'")->row();

			$hitung_peminjaman = $this->db->query("SELECT COUNT(*) as hitung FROM peminjaman_siswa WHERE tahun_ajaran = '$get_tahun->tahun_ajaran'")->row();

			$hitung_barangsita = $this->db->query("SELECT COUNT(*) as hitung FROM barangsita_siswa WHERE tahun_ajaran = '$get_tahun->tahun_ajaran'")->row();
			
			$d['tahun_ajaran'] = $get_tahun->tahun_ajaran;
			$d['hitung_alpa'] = $hitung_alpa->hitung;
			$d['hitung_sakit'] = $hitung_sakit->hitung;
			$d['hitung_izin'] = $hitung_izin->hitung;
			$d['hitung_pelanggaran'] = $hitung_pelanggaran->hitung;
			$d['hitung_peminjaman'] = $hitung_peminjaman->hitung;
			$d['hitung_barangsita'] = $hitung_barangsita->hitung;
			$d['data_kelas'] = $this->db->query("SELECT * FROM mst_kelas WHERE aktif_kelas = 1");

			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('home/home');
			$this->load->view('bottom');
		} else {
			redirect("login");
		}
	}

	public function get_calendar() {
		$q = $this->db->query("SELECT * FROM calendar_poinpelanggaran ORDER BY id DESC");
		echo json_encode($q->result_array());
	}
	

}
