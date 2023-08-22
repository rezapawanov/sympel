<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('hak_akses') != "admin") {
			redirect(base_url());
		} else {
			$this->load->Model('Laporan_model');
		}
	}

	public function index() {
		redirect(base_url());
	}

	public function proses() {
		redirect("laporan/laporan_alumni/".$this->input->post("aktivitas").'/'.$this->input->post("angkatan"));
	}
	public function laporan_alumni($aktivitas="", $angkatan="")
	{
		$d['angkatan'] = $angkatan;
		$d['judul'] = "Laporan Alumni";
		$d['laporan_alumni'] = $this->Laporan_model->laporan_alumni($aktivitas,$angkatan);
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('laporan/laporan_alumni');
		$this->load->view('bottom');
	}

	public function alumni()
	{
		$d['judul'] = "Data Alumni";
		$d['alumni'] = $this->Laporan_model->alumni();
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('laporan/alumni');
		$this->load->view('bottom');
	}

	public function alumni_excel()
	{
		$d['judul'] = "Laporan Data Alumni";
		$d['buku'] = $this->Laporan_model->alumni();
		$this->load->view('laporan/alumni_excel',$d);
	}


	public function alumni_detail($id)
	{

		$data = $this->db->query("SELECT * FROM mst_alumni WHERE id_alumni =  '$id'")->row();
		$get = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
			$d['nama_sekolah'] = $get->nama_sekolah;
		$d['judul'] = "Detail Data Alumni";
		$d['nama'] = $data->nama;
		$d['hp'] = $data->hp;
		$d['email'] = $data->email;
		$d['password'] = $data->password;
		$d['angkatan'] = $data->angkatan;
		$d['tahun_lulus'] = $data->tahun_lulus;
		$d['jenis_kelamin'] = $data->jenis_kelamin;
		$d['aktivitas_1'] = $data->aktivitas_1;
		$d['aktivitas_2'] = $data->aktivitas_2;
		$d['aktivitas_3'] = $data->aktivitas_3;
		$d['aktivitas_4'] = $data->aktivitas_4;
		$d['id_alumni'] = $data->id_alumni;
		$d['pernah_bekerja'] = $data->pernah_bekerja;
		$d['lama_dapat_kerja'] = $data->lama_dapat_kerja;
		$d['bidang_pekerjaan'] = $data->bidang_pekerjaan;
		$d['tingkat_kemudahan'] = $data->tingkat_kemudahan;
		$d['jumlah_gaji'] = $data->jumlah_gaji;
		$d['nama_tempat_kerja'] = $data->nama_tempat_kerja;
		$d['alamat_perusahaan'] = $data->alamat_perusahaan;
		$d['kabupaten_perusahaan'] = $data->kabupaten_perusahaan;
		if (!empty($data->tanggal_mulai_kerja) && $data->tanggal_mulai_kerja != '0000-00-00') {
			$d['tanggal_mulai_kerja'] = date("d-m-Y", strtotime($data->tanggal_mulai_kerja));
		} else {
			$d['tanggal_mulai_kerja'] = '';
		}

		if (!empty($data->tanggal_selesai_kerja) && $data->tanggal_selesai_kerja != '0000-00-00') {
			$d['tanggal_selesai_kerja'] = date("d-m-Y", strtotime($data->tanggal_selesai_kerja));
		} else {
			$d['tanggal_selesai_kerja'] = '';
		}

		$d['jabatan'] = $data->jabatan;

		$d['aktivitas_kuliah'] = $data->aktivitas_kuliah;
		$d['status_perguruan_tinggi'] = $data->status_perguruan_tinggi;
		$d['nama_perguruan_tinggi'] = $data->nama_perguruan_tinggi;
		$d['jenjang_pendidikan'] = $data->jenjang_pendidikan;
		$d['program_studi'] = $data->program_studi;
		$d['jalur_masuk'] = $data->jalur_masuk;
		if (!empty($data->mulai_kuliah) && $data->mulai_kuliah != '0000-00-00') {
			$d['mulai_kuliah'] = date("d-m-Y", strtotime($data->mulai_kuliah));
		} else {
			$d['mulai_kuliah'] = '';
		}
		$d['biaya_semester'] = $data->biaya_semester;
		$d['status_kuliah'] = $data->status_kuliah;


		$d['nama_perusahaan_wirausaha'] = $data->nama_perusahaan_wirausaha;
		$d['jenis_usaha_1'] = $data->jenis_usaha_1;
		$d['jenis_usaha_2'] = $data->jenis_usaha_2;
		$d['jenis_usaha_3'] = $data->jenis_usaha_3;
		$d['jenis_usaha_4'] = $data->jenis_usaha_4;
		if (!empty($data->mulai_usaha) && $data->mulai_usaha != '0000-00-00') {
			$d['mulai_usaha'] = date("d-m-Y", strtotime($data->mulai_usaha));
		} else {
			$d['mulai_usaha'] = '';
		}
		$d['status_wirausaha'] = $data->status_wirausaha;

		$d['kesesuaiaan_pengetahuan'] = $data->kesesuaiaan_pengetahuan;
		$d['bidang_kompetesi_1'] = $data->bidang_kompetesi_1;
		$d['bidang_kompetesi_2'] = $data->bidang_kompetesi_2;
		$d['bidang_kompetesi_3'] = $data->bidang_kompetesi_3;
		$d['bidang_kompetesi_4'] = $data->bidang_kompetesi_4;
		$d['bidang_kefarmasian_1'] = $data->bidang_kefarmasian_1;
		$d['bidang_kefarmasian_2'] = $data->bidang_kefarmasian_2;
		$d['bidang_kefarmasian_3'] = $data->bidang_kefarmasian_3;
		$d['bidang_kefarmasian_4'] = $data->bidang_kefarmasian_4;
		$d['bidang_kefarmasian_5'] = $data->bidang_kefarmasian_5;
		$d['bidang_kefarmasian_6'] = $data->bidang_kefarmasian_6;
		$d['bidang_kefarmasian_7'] = $data->bidang_kefarmasian_7;
		$d['bidang_kefarmasian_8'] = $data->bidang_kefarmasian_8;
		$d['bidang_kefarmasian_9'] = $data->bidang_kefarmasian_9;
		$d['bidang_pengetahuan_1'] = $data->bidang_pengetahuan_1;
		$d['bidang_pengetahuan_2'] = $data->bidang_pengetahuan_2;
		$d['bidang_pengetahuan_3'] = $data->bidang_pengetahuan_3;
		$d['bidang_pengetahuan_4'] = $data->bidang_pengetahuan_4;
		$d['bidang_pengetahuan_5'] = $data->bidang_pengetahuan_5;
		$d['bidang_pengetahuan_6'] = $data->bidang_pengetahuan_6;
		$d['bidang_pengetahuan_7'] = $data->bidang_pengetahuan_7;
		$d['bidang_pengetahuan_8'] = $data->bidang_pengetahuan_8;
		$d['materi_ditingkatkan'] = $data->materi_ditingkatkan;
		$d['info_kerja_1'] = $data->info_kerja_1;
		$d['info_kerja_2'] = $data->info_kerja_2;
		$d['info_kerja_3'] = $data->info_kerja_3;
		$d['info_kerja_4'] = $data->info_kerja_4;
		$d['info_kerja_5'] = $data->info_kerja_5;
		$d['info_loker'] = $data->info_loker;
		$d['saran'] = $data->saran;
		$d['kesan'] = $data->kesan;

		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('laporan/alumni_detail');
		$this->load->view('bottom');
	}


}