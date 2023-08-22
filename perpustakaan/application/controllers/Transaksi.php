<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(0);
class Transaksi extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('hak_akses') != "admin") {
			redirect(base_url());
		} else {
			$this->load->Model('Transaksi_model');
			$this->load->Model('Combo_model');
		}
	}



	public function index()
	{
		redirect(base_url());
	}

	public function ajax_combo_buku()
	{
		$id_buku = $_GET['id_buku'];
		$get = $this->db->query("SELECT * FROM mst_buku WHERE kode_buku = '$id_buku'");
		$arr = array();
		foreach ($get->result_array() as $data) {
			$stok = $this->db->query("SELECT COALESCE(SUM(jumlah),0) as hitung FROM peminjaman_buku_dt WHERE id_buku = '$data[id_buku]' AND status_pinjam_dt = '0'")->row();
			$d['judul_buku'] = $data['judul_buku'];
			$d['jumlah_buku'] = $data['jumlah_buku'] - $stok->hitung;
			$d['id_buku'] = $data['id_buku'];
			$arr[] = $d;
		}
		echo json_encode(array($d));
	}


	public function proses_cari_pinjam()
	{
		$this->db->query("DELETE FROM peminjaman_buku WHERE status_input = 0");
		$this->db->query("DELETE FROM peminjaman_buku_dt WHERE status_input_dt = 0");
		redirect("transaksi/peminjaman/" . $this->input->post("nis"));
	}

	public function proses_cari_kembali()
	{
		redirect("transaksi/pengembalian/" . $this->input->post("nis"));
	}

	public function peminjaman($nis = "")
	{

		$d['judul'] = "Transaksi Peminjaman Buku";

		if (!empty($nis)) {
			$get = $this->db->query("SELECT * FROM mst_siswa INNER JOIN mst_kelas ON mst_siswa.id_kelas = mst_kelas.id_kelas WHERE nis = '$nis'");
			$d['combo_buku'] = $this->Combo_model->combo_buku();
			if ($get->num_rows() > 0) {
				$data_siswa = $get->row();
				$d['nama_siswa'] = $data_siswa->nama_siswa;
				$d['nis'] = $data_siswa->nis;
				$d['nama_kelas'] = $data_siswa->nama_kelas;
				$d['id_kelas'] = $data_siswa->id_kelas;
				$d['id_siswa'] = $data_siswa->id_siswa;
				$hitung_tanggungan = $this->db->query("SELECT COUNT(*) as hitung FROM peminjaman_buku_dt INNER JOIN peminjaman_buku ON peminjaman_buku_dt.id_peminjaman = peminjaman_buku.id_peminjaman WHERE id_siswa = '$data_siswa->id_siswa' AND status_input_dt = 1 AND status_pinjam_dt = 0")->row();
				if ($hitung_tanggungan->hitung > 0) {
					$d['tanggungan'] = 'Ada ' . $hitung_tanggungan->hitung . ' buku yang masih dipinjam';
				} else {
					$d['tanggungan'] = 'Tidak Ada';
				}

				$d['peminjaman_dt'] = $this->Transaksi_model->peminjaman_dt($data_siswa->id_siswa);
			} else {
				echo '<script>
						alert("Data Siswa Tidak Ditemukan");
						document.location.href="' . base_url() . 'transaksi/peminjaman";
						</script>';
			}
		} else {
			$d['nama_siswa'] = "";
			$d['nis'] = "";
			$d['nama_kelas'] = "";
			$d['id_kelas'] = "";
			$d['id_siswa'] = "";
			$d['peminjaman_dt'] = '';
			$d['tanggungan'] = '';
		}

		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('transaksi/peminjaman');
		$this->load->view('bottom');
	}


	public function tambah_pinjam_buku()
	{
		$id_buku =  $this->input->post("id_buku");
		$jumlah = $this->db->query("SELECT jumlah_buku FROM mst_buku WHERE kode_buku = '$id_buku'")->row();
		$stok = $this->db->query("SELECT COALESCE(SUM(jumlah),0) as hitung FROM peminjaman_buku_dt WHERE id_buku = '$id_buku' AND status_pinjam_dt = '0'")->row();
		$stok_akhir = $jumlah->jumlah_buku - $stok->hitung;
		if ($this->input->post("jumlah") > $stok_akhir) {
			
			echo '<script>
						alert("Stok Buku Tidak Tersedia");
						document.location.href="' . base_url() . 'transaksi/peminjaman/'.$this->input->post('nis').'";
						</script>';
		} else {
			$date = date('ymd');
			$header = $date . '.';
			$get_no = $this->db->query("SELECT MAX(no_peminjaman) AS nomor FROM peminjaman_buku WHERE no_peminjaman LIKE '%$header%'")->row();
			$no_akhir = $get_no->nomor;
			$in['no_peminjaman'] = buatkode($no_akhir, 'NP.' . $date . '.', 3);
			$in['id_siswa'] = $this->input->post("id_siswa");
			$in['id_kelas'] = $this->input->post("id_kelas");


			if ($this->db->insert("peminjaman_buku", $in)) {
				$last_id = $this->db->insert_id();
				$inDT['id_peminjaman'] = $last_id;
				$inDT['jumlah'] = $this->input->post("jumlah");
				$inDT['id_buku'] = $this->input->post("id_buku_real");
				$inDT['tanggal_pinjam'] = date("Y-m-d");
				$inDT['durasi'] = $this->input->post("durasi");
				$inDT['tanggal_kembali'] = date("Y-m-d", strtotime($this->input->post("tanggal_pinjam") . " +" . $inDT['durasi'] . ' days'));
				$this->db->insert("peminjaman_buku_dt", $inDT);
			}
			redirect("transaksi/peminjaman/" . $this->input->post('nis'));
		}
	}

	public function peminjaman_hapus($id, $nis)
	{
		$where['id_peminjaman_dt'] = $id;
		$this->db->delete("peminjaman_buku_dt", $where);
		redirect("transaksi/peminjaman/" . $nis);
	}


	public function peminjaman_hapus_all($id, $nis)
	{
		$where['id_peminjaman'] = $id;
		$this->db->delete("peminjaman_buku", $where);
		$this->db->delete("peminjaman_buku_dt", $where);
		redirect("transaksi/daftar_peminjaman/");
	}

	public function peminjaman_simpan($id)
	{
		$where['id_peminjaman'] = $id;
		$in['status_input'] = 1;
		$in2['status_input_dt'] = 1;
		$this->db->update("peminjaman_buku", $in, $where);
		$this->db->update("peminjaman_buku_dt", $in2, $where);
		redirect("transaksi/daftar_peminjaman/");
	}

	public function daftar_peminjaman()
	{
		$d['judul'] = "Transaksi Peminjaman Buku";
		$d['peminjaman'] = $this->Transaksi_model->peminjaman();
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('transaksi/daftar_peminjaman');
		$this->load->view('bottom');
	}


	public function pengembalian($nis = "")
	{

		$d['judul'] = "Transaksi Pengembalian Buku";

		if (!empty($nis)) {
			$get = $this->db->query("SELECT * FROM mst_siswa INNER JOIN mst_kelas ON mst_siswa.id_kelas = mst_kelas.id_kelas WHERE nis = '$nis'");
			if ($get->num_rows() > 0) {
				$data_siswa = $get->row();
				$d['nama_siswa'] = $data_siswa->nama_siswa;
				$d['nis'] = $data_siswa->nis;
				$d['nama_kelas'] = $data_siswa->nama_kelas;
				$d['id_kelas'] = $data_siswa->id_kelas;
				$d['id_siswa'] = $data_siswa->id_siswa;
				$d['pengembalian_dt'] = $this->Transaksi_model->pengembalian_dt($data_siswa->id_siswa);
			} else {
				echo '<script>
						alert("Data Siswa Tidak Ditemukan");
						document.location.href="' . base_url() . 'transaksi/pengembalian";
						</script>';
			}
		} else {
			$d['nama_siswa'] = "";
			$d['nis'] = "";
			$d['nama_kelas'] = "";
			$d['id_kelas'] = "";
			$d['id_siswa'] = "";
			$d['pengembalian_dt'] = '';
			$d['tanggungan'] = '';
		}

		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('transaksi/pengembalian');
		$this->load->view('bottom');
	}

	public function pengembalian_simpan($id, $nis, $telat)
	{
		$get = $this->db->query("SELECT * FROM pengaturan_perpus WHERE id = 1")->row();
		$where['id_peminjaman_dt'] = $id;
		$in['telat'] = $telat;
		$in['denda'] = $get->denda * $telat;
		$in['status_pinjam_dt'] = 1;
		$in['tanggal_kembali_asli'] = date("Y-m-d");
		$this->db->update("peminjaman_buku_dt", $in, $where);
		redirect("transaksi/pengembalian/" . $nis);
	}
}
