<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


	public function index()
	{
		if ($this->session->userdata('hak_akses') != "") {
			$d['judul'] = "Dashboard";
			$id = $this->session->userdata("id");
			$get_tahun = $this->db->query("SELECT id_tahun_ajaran,tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();

			$this->load->view('top');
			if ($this->session->userdata('hak_akses') == "guru") {
			$hitung_izin = $this->db->query("SELECT COUNT(*) as hitung FROM absen WHERE keterangan = 'IZIN' AND tahun_ajaran = '$get_tahun->id_tahun_ajaran'")->row();

			$hitung_sakit = $this->db->query("SELECT COUNT(*) as hitung FROM absen WHERE keterangan = 'SAKIT' AND tahun_ajaran = '$get_tahun->id_tahun_ajaran'")->row();

			$hitung_alpa = $this->db->query("SELECT COUNT(*) as hitung FROM absen WHERE keterangan = 'ALPA' AND tahun_ajaran = '$get_tahun->id_tahun_ajaran'")->row();

				$hitung_pelanggaran = $this->db->query("SELECT COUNT(*) as hitung FROM pelanggaran_siswa WHERE tahun_ajaran = '$get_tahun->tahun_ajaran'")->row();

				$hitung_guru = $this->db->query("SELECT COUNT(*) as hitung FROM mst_guru WHERE aktif_guru = '1'")->row();

				$d['tahun_ajaran'] = $get_tahun->tahun_ajaran;
				$d['hitung_guru'] = $hitung_guru->hitung;
				$d['hitung_alpa'] = $hitung_alpa->hitung;
				$d['hitung_sakit'] = $hitung_sakit->hitung;
				$d['hitung_izin'] = $hitung_izin->hitung;
				$d['hitung_pelanggaran'] = $hitung_pelanggaran->hitung;
				$d['data_kelas'] =  $this->db->query("SELECT * FROM mst_kelas WHERE aktif_kelas = 1");
			
				$this->load->view('menu_guru');
				$this->load->view('home/home',$d);
			} else if ($this->session->userdata('hak_akses') == "siswa") {

				$hitung_izin = $this->db->query("SELECT COUNT(*) as hitung FROM absen WHERE keterangan = 'IZIN' AND tahun_ajaran = '$get_tahun->id_tahun_ajaran'")->row();

				$hitung_sakit = $this->db->query("SELECT COUNT(*) as hitung FROM absen WHERE keterangan = 'SAKIT' AND tahun_ajaran = '$get_tahun->id_tahun_ajaran'")->row();
	
				$hitung_alpa = $this->db->query("SELECT COUNT(*) as hitung FROM absen WHERE keterangan = 'ALPA' AND tahun_ajaran = '$get_tahun->id_tahun_ajaran'")->row();
	
				$hitung_pelanggaran = $this->db->query("SELECT COALESCE(SUM(poin_minus),0) as hitung FROM pelanggaran_siswa WHERE tahun_ajaran = '$get_tahun->tahun_ajaran' AND id_siswa = '$id'")->row();

				$d['hitung_pelanggaran'] = $hitung_pelanggaran->hitung;
				$d['hitung_alpa'] = $hitung_alpa->hitung;
				$d['hitung_sakit'] = $hitung_sakit->hitung;
				$d['hitung_izin'] = $hitung_izin->hitung;

				$this->load->view('menu_siswa');
				$this->load->view('home/home_siswa',$d);
			} else {
				$hitung_izin = $this->db->query("SELECT COUNT(*) as hitung FROM absen WHERE keterangan = 'IZIN' AND tahun_ajaran = '$get_tahun->id_tahun_ajaran'")->row();

				$hitung_sakit = $this->db->query("SELECT COUNT(*) as hitung FROM absen WHERE keterangan = 'SAKIT' AND tahun_ajaran = '$get_tahun->id_tahun_ajaran'")->row();
	
				$hitung_alpa = $this->db->query("SELECT COUNT(*) as hitung FROM absen WHERE keterangan = 'ALPA' AND tahun_ajaran = '$get_tahun->id_tahun_ajaran'")->row();
	
				$hitung_pelanggaran = $this->db->query("SELECT COUNT(*) as hitung FROM pelanggaran_siswa WHERE tahun_ajaran = '$get_tahun->tahun_ajaran'")->row();

				$hitung_guru = $this->db->query("SELECT COUNT(*) as hitung FROM mst_guru WHERE aktif_guru = '1'")->row();

				$d['tahun_ajaran'] = $get_tahun->tahun_ajaran;
				$d['hitung_alpa'] = $hitung_alpa->hitung;
				$d['hitung_sakit'] = $hitung_sakit->hitung;
				$d['hitung_izin'] = $hitung_izin->hitung;
				$d['hitung_pelanggaran'] = $hitung_pelanggaran->hitung;
				$d['hitung_guru'] = $hitung_guru->hitung;
				$d['data_kelas'] =  $this->db->query("SELECT * FROM mst_kelas WHERE aktif_kelas = 1");
				$this->load->view('menu');
				$this->load->view('home/home',$d);
			}

			$this->load->view('bottom');
		} else {
			redirect("login");
		}
	}

	public function get_calendar() {
		$q = $this->db->query("SELECT * FROM calendar_akademik ORDER BY id DESC");
		echo json_encode($q->result_array());
	}
}
