<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('hak_akses') != "admin" && $this->session->userdata('hak_akses') != "gurubk" && $this->session->userdata('hak_akses') != "guru"&& $this->session->userdata('hak_akses') != "siswa") {
			redirect(base_url());
		} else {
			$this->load->Model('Transaksi_model');
		}
	}


	public function index() {
		if($this->session->userdata('hak_akses') != "") { 
		
			$d['judul'] = "Dashboard";
			$id = $this->session->userdata("id");
			$get_tahun = $this->db->query("SELECT id_tahun_ajaran,tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();

			$this->load->view('top');

			if ($this->session->userdata('hak_akses') == "guru") {
				$d['judul'] = "Dashboard";
				$hitung_buku = $this->db->query("SELECT COUNT(*) as hitung FROM mst_buku")->row();
				$hitung_jurnal = $this->db->query("SELECT COUNT(*) as hitung FROM mst_jurnal")->row();
				$hitung_materi = $this->db->query("SELECT COUNT(*) as hitung FROM mst_materi")->row();
	
				$hitung_pengunjung = $this->db->query("SELECT COUNT(*) as hitung FROM pengunjung_perpus WHERE tanggal BETWEEN NOW() - INTERVAL 60 DAY AND NOW()")->row();
	
				$hitung_peminjaman = $this->db->query("SELECT COUNT(*) as hitung FROM peminjaman_buku_dt WHERE status_input_dt = '1' AND status_pinjam_dt = '0'")->row();
	
				$hitung_pengunjung_bb = $this->db->query("SELECT COUNT(*) as hitung FROM pengunjung_perpus WHERE tanggal BETWEEN NOW() - INTERVAL 60 DAY AND NOW() AND keperluan = 'Baca Buku'")->row();
	
				$hitung_pengunjung_bp = $this->db->query("SELECT COUNT(*) as hitung FROM pengunjung_perpus WHERE tanggal BETWEEN NOW() - INTERVAL 60 DAY AND NOW() AND keperluan = 'Baca dan Pinjam'")->row();
	
				$hitung_pengunjung_pb = $this->db->query("SELECT COUNT(*) as hitung FROM pengunjung_perpus WHERE tanggal BETWEEN NOW() - INTERVAL 60 DAY AND NOW() AND keperluan = 'Pinjam Buku'")->row();
	
				$hitung_pengunjung_kb = $this->db->query("SELECT COUNT(*) as hitung FROM pengunjung_perpus WHERE tanggal BETWEEN NOW() - INTERVAL 60 DAY AND NOW() AND keperluan = 'Kembali Buku'")->row();
	
				$hitung_dana_denda = $this->db->query("SELECT SUM(jumlah) as hitung FROM peminjaman_buku_dt WHERE denda")->row();
	
	
				$d['hitung_peminjaman'] = $hitung_peminjaman->hitung;
				$d['hitung_pengunjung'] = $hitung_pengunjung->hitung;
				$d['hitung_buku'] = $hitung_buku->hitung;
				$d['hitung_dana_denda'] = $hitung_dana_denda->hitung;
				$d['hitung_jurnal'] = $hitung_jurnal->hitung;
				$d['hitung_materi'] = $hitung_materi->hitung;
	
				$d['hitung_pengunjung_bb'] = $hitung_pengunjung_bb->hitung;
				$d['hitung_pengunjung_bp'] = $hitung_pengunjung_bp->hitung;
				$d['hitung_pengunjung_pb'] = $hitung_pengunjung_pb->hitung;
				$d['hitung_pengunjung_kb'] = $hitung_pengunjung_kb->hitung;
	
				$d['peminjaman'] = $this->Transaksi_model->peminjaman_denda();
	
				$this->load->view('menu_guru',$d);
				$this->load->view('home/home');

			} else if ($this->session->userdata('hak_akses') == "siswa") {
				$d['judul'] = "Dashboard";
				$hitung_buku = $this->db->query("SELECT COUNT(*) as hitung FROM mst_buku")->row();
				$hitung_jurnal = $this->db->query("SELECT COUNT(*) as hitung FROM mst_jurnal")->row();
				$hitung_materi = $this->db->query("SELECT COUNT(*) as hitung FROM mst_materi")->row();
	
				$hitung_pengunjung = $this->db->query("SELECT COUNT(*) as hitung FROM pengunjung_perpus WHERE tanggal BETWEEN NOW() - INTERVAL 60 DAY AND NOW()")->row();
	
				$hitung_peminjaman = $this->db->query("SELECT COUNT(*) as hitung FROM peminjaman_buku_dt WHERE status_input_dt = '1' AND status_pinjam_dt = '0'")->row();
	
				$hitung_pengunjung_bb = $this->db->query("SELECT COUNT(*) as hitung FROM pengunjung_perpus WHERE tanggal BETWEEN NOW() - INTERVAL 60 DAY AND NOW() AND keperluan = 'Baca Buku'")->row();
	
				$hitung_pengunjung_bp = $this->db->query("SELECT COUNT(*) as hitung FROM pengunjung_perpus WHERE tanggal BETWEEN NOW() - INTERVAL 60 DAY AND NOW() AND keperluan = 'Baca dan Pinjam'")->row();
	
				$hitung_pengunjung_pb = $this->db->query("SELECT COUNT(*) as hitung FROM pengunjung_perpus WHERE tanggal BETWEEN NOW() - INTERVAL 60 DAY AND NOW() AND keperluan = 'Pinjam Buku'")->row();
	
				$hitung_pengunjung_kb = $this->db->query("SELECT COUNT(*) as hitung FROM pengunjung_perpus WHERE tanggal BETWEEN NOW() - INTERVAL 60 DAY AND NOW() AND keperluan = 'Kembali Buku'")->row();
	
				$hitung_dana_denda = $this->db->query("SELECT SUM(jumlah) as hitung FROM peminjaman_buku_dt WHERE denda")->row();
	
	
				$d['hitung_peminjaman'] = $hitung_peminjaman->hitung;
				$d['hitung_pengunjung'] = $hitung_pengunjung->hitung;
				$d['hitung_buku'] = $hitung_buku->hitung;
				$d['hitung_dana_denda'] = $hitung_dana_denda->hitung;
				$d['hitung_jurnal'] = $hitung_jurnal->hitung;
				$d['hitung_materi'] = $hitung_materi->hitung;
	
				$d['hitung_pengunjung_bb'] = $hitung_pengunjung_bb->hitung;
				$d['hitung_pengunjung_bp'] = $hitung_pengunjung_bp->hitung;
				$d['hitung_pengunjung_pb'] = $hitung_pengunjung_pb->hitung;
				$d['hitung_pengunjung_kb'] = $hitung_pengunjung_kb->hitung;
	
				$d['peminjaman'] = $this->Transaksi_model->peminjaman_denda();
	
				$this->load->view('menu_siswa',$d);
				$this->load->view('home/home');
			} else {
				$d['judul'] = "Dashboard";
				$hitung_buku = $this->db->query("SELECT COUNT(*) as hitung FROM mst_buku")->row();
				$hitung_jurnal = $this->db->query("SELECT COUNT(*) as hitung FROM mst_jurnal")->row();
				$hitung_materi = $this->db->query("SELECT COUNT(*) as hitung FROM mst_materi")->row();
	
				$hitung_pengunjung = $this->db->query("SELECT COUNT(*) as hitung FROM pengunjung_perpus WHERE tanggal BETWEEN NOW() - INTERVAL 60 DAY AND NOW()")->row();
	
				$hitung_peminjaman = $this->db->query("SELECT COUNT(*) as hitung FROM peminjaman_buku_dt WHERE status_input_dt = '1' AND status_pinjam_dt = '0'")->row();
	
				$hitung_pengunjung_bb = $this->db->query("SELECT COUNT(*) as hitung FROM pengunjung_perpus WHERE tanggal BETWEEN NOW() - INTERVAL 60 DAY AND NOW() AND keperluan = 'Baca Buku'")->row();
	
				$hitung_pengunjung_bp = $this->db->query("SELECT COUNT(*) as hitung FROM pengunjung_perpus WHERE tanggal BETWEEN NOW() - INTERVAL 60 DAY AND NOW() AND keperluan = 'Baca dan Pinjam'")->row();
	
				$hitung_pengunjung_pb = $this->db->query("SELECT COUNT(*) as hitung FROM pengunjung_perpus WHERE tanggal BETWEEN NOW() - INTERVAL 60 DAY AND NOW() AND keperluan = 'Pinjam Buku'")->row();
	
				$hitung_pengunjung_kb = $this->db->query("SELECT COUNT(*) as hitung FROM pengunjung_perpus WHERE tanggal BETWEEN NOW() - INTERVAL 60 DAY AND NOW() AND keperluan = 'Kembali Buku'")->row();
	
				$hitung_dana_denda = $this->db->query("SELECT SUM(jumlah) as hitung FROM peminjaman_buku_dt WHERE denda")->row();
	
	
				$d['hitung_peminjaman'] = $hitung_peminjaman->hitung;
				$d['hitung_pengunjung'] = $hitung_pengunjung->hitung;
				$d['hitung_buku'] = $hitung_buku->hitung;
				$d['hitung_dana_denda'] = $hitung_dana_denda->hitung;
				$d['hitung_jurnal'] = $hitung_jurnal->hitung;
				$d['hitung_materi'] = $hitung_materi->hitung;
	
				$d['hitung_pengunjung_bb'] = $hitung_pengunjung_bb->hitung;
				$d['hitung_pengunjung_bp'] = $hitung_pengunjung_bp->hitung;
				$d['hitung_pengunjung_pb'] = $hitung_pengunjung_pb->hitung;
				$d['hitung_pengunjung_kb'] = $hitung_pengunjung_kb->hitung;
	
				$d['peminjaman'] = $this->Transaksi_model->peminjaman_denda();
	
				$this->load->view('menu',$d);
				$this->load->view('home/home');
			}
			$this->load->view('bottom');

		} else {
			redirect("login");
		}
	}

	public function get_calendar() {
		$q = $this->db->query("SELECT * FROM calendar_perpustakaan ORDER BY id DESC");
		echo json_encode($q->result_array());
	}
	

}
