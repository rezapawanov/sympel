<?php
defined('BASEPATH') or exit('No direct script access allowed');

class App extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if ($this->session->userdata('hak_akses') == "admin") {
			redirect(base_url() . 'home');
		} else if ($this->session->userdata('hak_akses') == "alumni") {
			redirect(base_url() . 'app/biodata');
		} else {

			redirect(base_url() . 'app/registrasi');
		}
	}


	public function registrasi()
	{
		if ($this->session->userdata('hak_akses') == "alumni") {
			redirect("app/biodata");
		} else if ($this->session->userdata('hak_akses') == "admin") {
			redirect(base_url() . 'home');
		} else {
			$get = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
			$d['nama_sekolah'] = $get->nama_sekolah;
			$d['alamat_sekolah'] = $get->alamat;
			$d['npsn'] = $get->npsn;
			$d['email'] = $get->email;
			$d['wa'] = $get->wa;
			$d['fb'] = $get->fb;
			$d['ig'] = $get->ig;
			$d['youtube'] = $get->youtube;
			$d['no_telepon'] = $get->no_telepon;
			$d['website'] = $get->website;
			$d['kodepos'] = $get->kodepos;
			$d['pengumuman'] = $this->db->query("SELECT * FROM mst_pengumuman_alumni ORDER BY id_pengumuman DESC");
			$d['loker'] = $this->db->query("SELECT * FROM mst_loker ORDER BY id_loker DESC");
			$d['title'] = "Home";
			$this->load->view('front/top', $d);
			$this->load->view('front/home/home');
			$this->load->view('front/bottom');
		}
	}

	public function loker()
	{
		if ($this->session->userdata('hak_akses') == "alumni") {
			$d['judul'] = "Informasi Lowongan Kerja";
			$this->load->view('top', $d);
			$this->load->view('menu');
			$this->load->view('loker/loker');
			$this->load->view('bottom');
		} else {
			redirect("app/home");
		}
	}


	public function save_registrasi()
	{
		$in['nama'] = $this->input->post("nama");
		$in['email'] = $this->input->post("email");
		$in['password'] = $this->input->post("password");
		$in['aktivitas_1'] = $this->input->post("aktivitas_1");
		$in['aktivitas_2'] = $this->input->post("aktivitas_2");
		$in['aktivitas_3'] = $this->input->post("aktivitas_3");
		$in['aktivitas_4'] = $this->input->post("aktivitas_4");
		$cek = $this->db->query("SELECT * FROM mst_alumni WHERE email = '$in[email]'");
		if ($cek->num_rows() == 0) {
			if ($this->db->insert("mst_alumni", $in)) {
				$this->session->set_flashdata("success", "Pendaftaran berhasil, Silahkan Menunggu Konfirmasi Admin");
				redirect("app/registrasi/");
			}
		} else {
			$this->session->set_flashdata("error", "Pendaftaran Gagal, Email Sudah Pernah Digunakan");
			redirect("app/registrasi/");
		}
	}

	public function biodata()
	{
		if ($this->session->userdata('hak_akses') == "alumni") {
			$email = $this->session->userdata("email");

			$data = $this->db->query("SELECT * FROM mst_alumni WHERE email =  '$email'")->row();
			$get = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
			$d['nama_sekolah'] = $get->nama_sekolah;
			$d['judul'] = "Data Alumni";
			$d['judul2'] = "Ubah";
			$d['nama'] = $data->nama;
			$d['hp'] = $data->hp;
			$d['tahun_lulus'] = $data->tahun_lulus;
			$d['jenis_kelamin'] = $data->jenis_kelamin;
			$d['aktivitas_1'] = $data->aktivitas_1;
			$d['aktivitas_2'] = $data->aktivitas_2;
			$d['aktivitas_3'] = $data->aktivitas_3;
			$d['aktivitas_4'] = $data->aktivitas_4;
			$d['angkatan'] = $data->angkatan;
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
			$this->load->view('biodata/biodata');
			$this->load->view('bottom');
		} else {
			redirect(base_url());
		}
	}



	public function biodata_edit($id)
	{
		if ($this->session->userdata('hak_akses') != "") {

			$data = $this->db->query("SELECT * FROM mst_alumni WHERE id_alumni =  '$id'")->row();
			$get = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
			$d['nama_sekolah'] = $get->nama_sekolah;
			$d['judul'] = "Edit Data Alumni";
			$d['judul2'] = "Ubah";
			$d['email'] = $data->email;
			$d['password'] = $data->password;
			$d['nama'] = $data->nama;
			$d['hp'] = $data->hp;
			$d['id_alumni'] = $data->id_alumni;
			$d['angkatan'] = $data->angkatan;
			$d['tahun_lulus'] = $data->tahun_lulus;
			$d['jenis_kelamin'] = $data->jenis_kelamin;
			$d['aktivitas_1'] = $data->aktivitas_1;
			$d['aktivitas_2'] = $data->aktivitas_2;
			$d['aktivitas_3'] = $data->aktivitas_3;
			$d['aktivitas_4'] = $data->aktivitas_4;

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
			$this->load->view('biodata/biodata_edit');
			$this->load->view('bottom');
		} else {
			redirect(base_url());
		}
	}

	public function save_biodata()
	{
		$d['nama'] = $this->input->post("nama");
		$d['hp'] = $this->input->post("hp");
		$d['angkatan'] = $this->input->post("angkatan");
		$d['tahun_lulus'] = $this->input->post("tahun_lulus");
		$d['jenis_kelamin'] = $this->input->post("jenis_kelamin");
		$d['aktivitas_1'] = $this->input->post("aktivitas_1");
		$d['aktivitas_2'] = $this->input->post("aktivitas_2");
		$d['aktivitas_3'] = $this->input->post("aktivitas_3");
		$d['aktivitas_4'] = $this->input->post("aktivitas_4");

		$d['pernah_bekerja'] = $this->input->post("pernah_bekerja");
		$d['lama_dapat_kerja'] = $this->input->post("lama_dapat_kerja");
		$d['bidang_pekerjaan'] = $this->input->post("bidang_pekerjaan");
		$d['tingkat_kemudahan'] = $this->input->post("tingkat_kemudahan");
		$d['jumlah_gaji'] = $this->input->post("jumlah_gaji");
		$d['nama_tempat_kerja'] = $this->input->post("nama_tempat_kerja");
		$d['alamat_perusahaan'] = $this->input->post("alamat_perusahaan");
		$d['kabupaten_perusahaan'] = $this->input->post("kabupaten_perusahaan");
		if (!empty($this->input->post("tanggal_mulai_kerja"))) {
			$d['tanggal_mulai_kerja'] = date("Y-m-d", strtotime($this->input->post("tanggal_mulai_kerja")));
		}
		if (!empty($this->input->post("tanggal_selesai_kerja"))) {
			$d['tanggal_selesai_kerja'] = date("Y-m-d", strtotime($this->input->post("tanggal_selesai_kerja")));
		}
		$d['jabatan'] = $this->input->post("jabatan");

		$d['aktivitas_kuliah'] = $this->input->post("aktivitas_kuliah");
		$d['status_perguruan_tinggi'] = $this->input->post("status_perguruan_tinggi");
		$d['nama_perguruan_tinggi'] = $this->input->post("nama_perguruan_tinggi");
		$d['jenjang_pendidikan'] = $this->input->post("jenjang_pendidikan");
		$d['program_studi'] = $this->input->post("program_studi");
		$d['jalur_masuk'] = $this->input->post("jalur_masuk");
		if (!empty($this->input->post("mulai_kuliah"))) {
			$d['mulai_kuliah'] = date("Y-m-d", strtotime($this->input->post("mulai_kuliah")));
		}
		$d['biaya_semester'] = $this->input->post("biaya_semester");
		$d['status_kuliah'] = $this->input->post("status_kuliah");

		$d['nama_perusahaan_wirausaha'] = $this->input->post("nama_perusahaan_wirausaha");
		$d['jenis_usaha_1'] = $this->input->post("jenis_usaha_1");
		$d['jenis_usaha_2'] = $this->input->post("jenis_usaha_2");
		$d['jenis_usaha_3'] = $this->input->post("jenis_usaha_3");
		$d['jenis_usaha_4'] = $this->input->post("jenis_usaha_4");
		if (!empty($this->input->post("mulai_usaha"))) {
			$d['mulai_usaha'] = date("Y-m-d", strtotime($this->input->post("mulai_usaha")));
		}

		$d['status_wirausaha'] = $this->input->post("status_wirausaha");

		$d['kesesuaiaan_pengetahuan'] = $this->input->post("kesesuaiaan_pengetahuan");
		$d['bidang_kompetesi_1'] = $this->input->post("bidang_kompetesi_1");
		$d['bidang_kompetesi_2'] = $this->input->post("bidang_kompetesi_2");
		$d['bidang_kompetesi_3'] = $this->input->post("bidang_kompetesi_3");
		$d['bidang_kompetesi_4'] = $this->input->post("bidang_kompetesi_4");
		$d['bidang_kefarmasian_1'] = $this->input->post("bidang_kefarmasian_1");
		$d['bidang_kefarmasian_2'] = $this->input->post("bidang_kefarmasian_2");
		$d['bidang_kefarmasian_3'] = $this->input->post("bidang_kefarmasian_3");
		$d['bidang_kefarmasian_4'] = $this->input->post("bidang_kefarmasian_4");
		$d['bidang_kefarmasian_5'] = $this->input->post("bidang_kefarmasian_5");
		$d['bidang_kefarmasian_6'] = $this->input->post("bidang_kefarmasian_6");
		$d['bidang_kefarmasian_7'] = $this->input->post("bidang_kefarmasian_7");
		$d['bidang_kefarmasian_8'] = $this->input->post("bidang_kefarmasian_8");
		$d['bidang_kefarmasian_9'] = $this->input->post("bidang_kefarmasian_9");
		$d['bidang_pengetahuan_1'] = $this->input->post("bidang_pengetahuan_1");
		$d['bidang_pengetahuan_2'] = $this->input->post("bidang_pengetahuan_2");
		$d['bidang_pengetahuan_3'] = $this->input->post("bidang_pengetahuan_3");
		$d['bidang_pengetahuan_4'] = $this->input->post("bidang_pengetahuan_4");
		$d['bidang_pengetahuan_5'] = $this->input->post("bidang_pengetahuan_5");
		$d['bidang_pengetahuan_6'] = $this->input->post("bidang_pengetahuan_6");
		$d['bidang_pengetahuan_7'] = $this->input->post("bidang_pengetahuan_7");
		$d['bidang_pengetahuan_8'] = $this->input->post("bidang_pengetahuan_8");
		$d['materi_ditingkatkan'] = $this->input->post("materi_ditingkatkan");
		$d['info_kerja_1'] = $this->input->post("info_kerja_1");
		$d['info_kerja_2'] = $this->input->post("info_kerja_2");
		$d['info_kerja_3'] = $this->input->post("info_kerja_3");
		$d['info_kerja_4'] = $this->input->post("info_kerja_4");
		$d['info_kerja_5'] = $this->input->post("info_kerja_5");
		$d['info_loker'] = $this->input->post("info_loker");
		$d['saran'] = $this->input->post("saran");
		$d['kesan'] = $this->input->post("kesan");

		$where['email'] = $this->session->userdata("email");
		$this->db->update("mst_alumni", $d, $where);
		$this->session->set_flashdata("success", "Biodata Berhasil Di Perbarui");
		redirect("app/biodata");
	}


	public function save_biodata_admin()
	{
		$d['nama'] = $this->input->post("nama");
		$d['hp'] = $this->input->post("hp");
		$d['angkatan'] = $this->input->post("angkatan");
		$d['tahun_lulus'] = $this->input->post("tahun_lulus");
		$d['jenis_kelamin'] = $this->input->post("jenis_kelamin");
		$d['aktivitas_1'] = $this->input->post("aktivitas_1");
		$d['aktivitas_2'] = $this->input->post("aktivitas_2");
		$d['aktivitas_3'] = $this->input->post("aktivitas_3");
		$d['aktivitas_4'] = $this->input->post("aktivitas_4");

		$d['email'] = $this->input->post("email");
		$d['password'] = $this->input->post("password");

		$d['pernah_bekerja'] = $this->input->post("pernah_bekerja");
		$d['lama_dapat_kerja'] = $this->input->post("lama_dapat_kerja");
		$d['bidang_pekerjaan'] = $this->input->post("bidang_pekerjaan");
		$d['tingkat_kemudahan'] = $this->input->post("tingkat_kemudahan");
		$d['jumlah_gaji'] = $this->input->post("jumlah_gaji");
		$d['nama_tempat_kerja'] = $this->input->post("nama_tempat_kerja");
		$d['alamat_perusahaan'] = $this->input->post("alamat_perusahaan");
		$d['kabupaten_perusahaan'] = $this->input->post("kabupaten_perusahaan");
		if (!empty($this->input->post("tanggal_mulai_kerja"))) {
			$d['tanggal_mulai_kerja'] = date("Y-m-d", strtotime($this->input->post("tanggal_mulai_kerja")));
		}
		if (!empty($this->input->post("tanggal_selesai_kerja"))) {
			$d['tanggal_selesai_kerja'] = date("Y-m-d", strtotime($this->input->post("tanggal_selesai_kerja")));
		}
		$d['jabatan'] = $this->input->post("jabatan");

		$d['aktivitas_kuliah'] = $this->input->post("aktivitas_kuliah");
		$d['status_perguruan_tinggi'] = $this->input->post("status_perguruan_tinggi");
		$d['nama_perguruan_tinggi'] = $this->input->post("nama_perguruan_tinggi");
		$d['jenjang_pendidikan'] = $this->input->post("jenjang_pendidikan");
		$d['program_studi'] = $this->input->post("program_studi");
		$d['jalur_masuk'] = $this->input->post("jalur_masuk");
		if (!empty($this->input->post("mulai_kuliah"))) {
			$d['mulai_kuliah'] = date("Y-m-d", strtotime($this->input->post("mulai_kuliah")));
		}
		$d['biaya_semester'] = $this->input->post("biaya_semester");
		$d['status_kuliah'] = $this->input->post("status_kuliah");

		$d['nama_perusahaan_wirausaha'] = $this->input->post("nama_perusahaan_wirausaha");
		$d['jenis_usaha_1'] = $this->input->post("jenis_usaha_1");
		$d['jenis_usaha_2'] = $this->input->post("jenis_usaha_2");
		$d['jenis_usaha_3'] = $this->input->post("jenis_usaha_3");
		$d['jenis_usaha_4'] = $this->input->post("jenis_usaha_4");
		if (!empty($this->input->post("mulai_usaha"))) {
			$d['mulai_usaha'] = date("Y-m-d", strtotime($this->input->post("mulai_usaha")));
		}

		$d['status_wirausaha'] = $this->input->post("status_wirausaha");

		$d['kesesuaiaan_pengetahuan'] = $this->input->post("kesesuaiaan_pengetahuan");
		$d['bidang_kompetesi_1'] = $this->input->post("bidang_kompetesi_1");
		$d['bidang_kompetesi_2'] = $this->input->post("bidang_kompetesi_2");
		$d['bidang_kompetesi_3'] = $this->input->post("bidang_kompetesi_3");
		$d['bidang_kompetesi_4'] = $this->input->post("bidang_kompetesi_4");
		$d['bidang_kefarmasian_1'] = $this->input->post("bidang_kefarmasian_1");
		$d['bidang_kefarmasian_2'] = $this->input->post("bidang_kefarmasian_2");
		$d['bidang_kefarmasian_3'] = $this->input->post("bidang_kefarmasian_3");
		$d['bidang_kefarmasian_4'] = $this->input->post("bidang_kefarmasian_4");
		$d['bidang_kefarmasian_5'] = $this->input->post("bidang_kefarmasian_5");
		$d['bidang_kefarmasian_6'] = $this->input->post("bidang_kefarmasian_6");
		$d['bidang_kefarmasian_7'] = $this->input->post("bidang_kefarmasian_7");
		$d['bidang_kefarmasian_8'] = $this->input->post("bidang_kefarmasian_8");
		$d['bidang_kefarmasian_9'] = $this->input->post("bidang_kefarmasian_9");
		$d['bidang_pengetahuan_1'] = $this->input->post("bidang_pengetahuan_1");
		$d['bidang_pengetahuan_2'] = $this->input->post("bidang_pengetahuan_2");
		$d['bidang_pengetahuan_3'] = $this->input->post("bidang_pengetahuan_3");
		$d['bidang_pengetahuan_4'] = $this->input->post("bidang_pengetahuan_4");
		$d['bidang_pengetahuan_5'] = $this->input->post("bidang_pengetahuan_5");
		$d['bidang_pengetahuan_6'] = $this->input->post("bidang_pengetahuan_6");
		$d['bidang_pengetahuan_7'] = $this->input->post("bidang_pengetahuan_7");
		$d['bidang_pengetahuan_8'] = $this->input->post("bidang_pengetahuan_8");
		$d['materi_ditingkatkan'] = $this->input->post("materi_ditingkatkan");
		$d['info_kerja_1'] = $this->input->post("info_kerja_1");
		$d['info_kerja_2'] = $this->input->post("info_kerja_2");
		$d['info_kerja_3'] = $this->input->post("info_kerja_3");
		$d['info_kerja_4'] = $this->input->post("info_kerja_4");
		$d['info_kerja_5'] = $this->input->post("info_kerja_5");
		$d['info_loker'] = $this->input->post("info_loker");
		$d['saran'] = $this->input->post("saran");
		$d['kesan'] = $this->input->post("kesan");

		$where['id_alumni'] = $this->input->post("id_alumni");
		$this->db->update("mst_alumni", $d, $where);
		$this->session->set_flashdata("success", "Biodata Berhasil Di Perbarui");
		redirect("laporan/alumni_detail/" . $where['id_alumni']);
	}


	public function save_login()
	{
		$email = $this->input->post("email");
		$password = $this->input->post("password");
		$q_user = $this->db->query("SELECT * FROM mst_alumni WHERE email = '$email' AND password = '$password'");


		if ($q_user->num_rows() > 0) {
			foreach ($q_user->result() as $data) {
				if ($data->status_aktif == "1") {
					$session['email'] = $data->email;
					$session['nama'] = $data->nama;
					$session['hak_akses'] = 'alumni';
					$this->session->set_userdata($session);
					redirect("app/biodata");
				} else {
					$this->session->set_flashdata("error", "Gagal Login Akun Anda Belum Aktif");
					redirect("app/registrasi/");
				}
			}
		} else {
			$this->session->set_flashdata("error", "Gagal Login Username atau Password Salah");
			redirect("app/registrasi/");
		}
	}

	public function password()
	{
		$d['judul'] = "Ubah Password";
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('password/password');
		$this->load->view('bottom');
	}

	public function password_save()
	{
		$password_lama = $this->input->post("password_lama");
		$password_baru = $this->input->post("password_baru");
		$hak_akses = $this->session->userdata("hak_akses");
		if ($hak_akses == "admin") {
			$username = $this->session->userdata("username");

			$cek = $this->db->query("SELECT * FROM mst_user WHERE username = '$username' AND password = '$password_lama'");
			if ($cek->num_rows() > 0) {
				$where['username'] = $username;
				$in['password'] = $password_baru;
				$this->db->update("mst_user", $in, $where);
				$this->session->set_flashdata("success", "Ubah Password Berhasil");
			} else {
				$this->session->set_flashdata("error", "Ubah Password Gagal. Password Lama Salah");
			}
		} else if ($hak_akses == "alumni") {
			$username = $this->session->userdata("email");

			$cek = $this->db->query("SELECT * FROM mst_alumni WHERE email = '$username' AND password = '$password_lama'");
			if ($cek->num_rows() > 0) {
				$where['email'] = $username;
				$in['password'] = $password_baru;
				$this->db->update("mst_alumni", $in, $where);
				$this->session->set_flashdata("success", "Ubah Password Berhasil");
			} else {
				$this->session->set_flashdata("error", "Ubah Password Gagal. Password Lama Salah");
			}
		}
		redirect("app/password/");
	}
}
