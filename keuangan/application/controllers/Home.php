<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->Model('Informasi_model');
		$this->load->Model('Pembayaran_model');
		$this->load->Model('Belanja_siswa_model');
	}


	public function index()
	{
		if ($this->session->userdata('hak_akses') != "") {
			$d['judul'] = "Dashboard";
			$tanggal = date("Y-m-d");
			$this->load->view('top', $d);
			$this->load->view('menu');
			$d['informasi'] = $this->Informasi_model->informasi_keuangan();

			$get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1 LIMIT 1")->row();
			$tahun_ajaran = $get_tahun->tahun_ajaran;

			$d['belanja_siswa'] = $this->Belanja_siswa_model->belanja_siswa($tahun_ajaran);


			$d['daftar_pembayaran_bulanan'] = $this->Pembayaran_model->pembayaran_bulanan_terakhir_umum($tahun_ajaran);
			$d['daftar_pembayaran_bebas'] = $this->Pembayaran_model->pembayaran_bebas_terakhir_umum($tahun_ajaran);

			if ($this->session->userdata("hak_akses") == 'das') {
				$id = $this->session->userdata("id");

				$total_das = $this->db->query("SELECT SUM(total_terima) as hitung FROM das_user 
				 INNER JOIN das ON das_user.id_das = das.id_das 
				 INNER JOIN das_kategori ON das.id_das_kategori = das_kategori.id_das_kategori  WHERE tahun_ajaran = '$tahun_ajaran' AND id_user = '$id'")->row();

				$total = $this->db->query("SELECT SUM(sisa_saldo) as hitung, SUM(total_terima) as hitung_terima FROM das_user 
                                    INNER JOIN das ON das_user.id_das = das.id_das 
									INNER JOIN das_kategori ON das.id_das_kategori = das_kategori.id_das_kategori  WHERE tahun_ajaran = '$tahun_ajaran' AND id_user = '$id'")->row();

				$total_all =  $total_das->hitung;
				$hitung_das_sisa = $total_das->hitung - ($total->hitung_terima - $total->hitung);
				$d['hitung_das_total'] = $total_all;
				$d['hitung_das_sisa'] = $hitung_das_sisa;
			} else {
				$total_das_kategori = $this->db->query("SELECT SUM(sisa_dana) as hitung FROM das_kategori WHERE tahun_ajaran = '$tahun_ajaran'")->row();

				$total_das = $this->db->query("SELECT SUM(saldo) as hitung FROM das INNER JOIN das_kategori ON das.id_das_kategori = das_kategori.id_das_kategori  WHERE tahun_ajaran = '$tahun_ajaran'")->row();

				$total_das_bendahara = $this->db->query("SELECT SUM(saldo) as hitung FROM das_bendahara INNER JOIN das_kategori ON das_bendahara.id_das_kategori = das_kategori.id_das_kategori  WHERE tahun_ajaran = '$tahun_ajaran'")->row();

				$total = $this->db->query("SELECT SUM(sisa_saldo) as hitung, SUM(total_terima) as hitung_terima FROM das_user 
                                    INNER JOIN das ON das_user.id_das = das.id_das 
									INNER JOIN das_kategori ON das.id_das_kategori = das_kategori.id_das_kategori  WHERE tahun_ajaran = '$tahun_ajaran'")->row();

				$total_bendahara = $this->db->query("SELECT SUM(sisa_saldo) as hitung, SUM(total_terima) as hitung_terima FROM das_user_bendahara 
                                    INNER JOIN das_bendahara ON das_user_bendahara.id_das_bendahara = das_bendahara.id_das_bendahara 
                                    INNER JOIN das_kategori ON das_bendahara.id_das_kategori = das_kategori.id_das_kategori  WHERE tahun_ajaran = '$tahun_ajaran'")->row();

				$total_all = $total_das->hitung - ($total->hitung_terima - $total->hitung);

				$total_all_bendahara = $total_das_bendahara->hitung - ($total_bendahara->hitung_terima - $total_bendahara->hitung);

				$hitung_das_sisa = $total_das_kategori->hitung - $total_all - $total_all_bendahara;

				$d['hitung_das_total'] = $total_das_kategori->hitung;
				$d['hitung_das_sisa'] = $hitung_das_sisa;
			}

			$hitung_siswa = $this->db->query("SELECT COUNT(*) as hitung FROM mst_siswa WHERE aktif_siswa = '1'")->row();

			$hitung_jurnal_in = $this->db->query("SELECT SUM(jumlah) as hitung FROM penerimaan WHERE tanggal = '$tanggal'")->row();

			$hitung_jurnal_out = $this->db->query("SELECT SUM(jumlah) as hitung FROM pengeluaran WHERE tanggal = '$tanggal'")->row();

			$hitung_bayar_bebas = $this->db->query("SELECT SUM(bayar) as hitung FROM pembayaran_bebas_dt WHERE tanggal = '$tanggal'")->row();

			$hitung_bayar_bulan = $this->db->query("SELECT SUM(bayar) as hitung FROM pembayaran_bulanan WHERE tanggal = '$tanggal'")->row();

			$hitung_jurnal_in_all = $this->db->query("SELECT SUM(jumlah) as hitung FROM penerimaan")->row();

			$hitung_bayar_bebas_all = $this->db->query("SELECT SUM(bayar) as hitung FROM pembayaran_bebas_dt")->row();

			$hitung_bayar_bulan_all = $this->db->query("SELECT SUM(bayar) as hitung FROM pembayaran_bulanan ")->row();




			$d['hitung_siswa'] = $hitung_siswa->hitung;


			if ($this->session->userdata("hak_akses") == 'kasir') {
				$d['penerimaan_all'] = $hitung_bayar_bebas_all->hitung + $hitung_bayar_bulan_all->hitung;
				$d['pengeluaran'] = 0;
				$d['penerimaan'] =  $hitung_bayar_bebas->hitung + $hitung_bayar_bulan->hitung;
			} else {
				$d['penerimaan_all'] = $hitung_jurnal_in_all->hitung + $hitung_bayar_bebas_all->hitung + $hitung_bayar_bulan_all->hitung;
				$d['pengeluaran'] = $hitung_jurnal_out->hitung;
				$d['penerimaan'] = $hitung_jurnal_in->hitung + $hitung_bayar_bebas->hitung + $hitung_bayar_bulan->hitung;
			}


			$this->load->view('home/home', $d);
			$this->load->view('bottom');
		} else {
			redirect("login");
		}
	}

	public function get_calendar()
	{
		$q = $this->db->query("SELECT * FROM calendar_keuangan ORDER BY id DESC");
		echo json_encode($q->result_array());
	}
}
