<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {


	public function __construct(){
		parent::__construct();
		if($this->session->userdata('hak_akses') == "") { 
			redirect(base_url());
		} else {
			$this->load->Model('Cetak_model');
		}
	}


	public function index() {
		redirect(base_url());
	}


	public function raport() {
		if($this->session->userdata('hak_akses') == "guru" || $this->session->userdata('hak_akses') == "admin") { 
			$d['judul'] = "Cetak Raport";
			if($this->session->userdata('hak_akses') == "guru") {
				$id_guru = $this->session->userdata("id_guru");
				$d['walikelas'] = $this->Cetak_model->walikelas($id_guru);
			} else {
				$d['walikelas'] = $this->Cetak_model->walikelas_all();
			}
			
			$this->load->view('top',$d);
			if($this->session->userdata('hak_akses') == "guru") {
				$this->load->view('menu_guru');
			} else {
				$this->load->view('menu');
			}
			$this->load->view('cetak/raport');
			$this->load->view('bottom');
		} else {
			redirect(base_url());
		}
	}

	public function raport_siswa($id_kelas) {
		if($this->session->userdata('hak_akses') == "guru" || $this->session->userdata('hak_akses') == "admin" && $id_kelas != "") { 
			$get_tahun_ajaran = $this->db->query("SELECT * FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();
			$id_kelas = preg_replace( '/[^0-9]/', '', $id_kelas );
			$id_tahun_ajaran = $get_tahun_ajaran->id_tahun_ajaran;
			$cek = $this->db->query("SELECT nama_kelas FROM mst_walikelas 
										INNER JOIN mst_kelas ON mst_walikelas.id_kelas = mst_kelas.id_kelas WHERE mst_walikelas.id_kelas = $id_kelas AND tahun_ajaran = '$get_tahun_ajaran->tahun_ajaran'");
			if($cek->num_rows() > 0) { 
				$data = $cek->row();
				$d['judul'] = "Cetak Raport ".$data->nama_kelas." - Tahun Ajaran ".$get_tahun_ajaran->tahun_ajaran." - Semester ".$get_tahun_ajaran->semester;
				$d['raport_siswa'] = $this->Cetak_model->raport($id_kelas,$id_tahun_ajaran);
				$this->load->view('top',$d);
				if($this->session->userdata('hak_akses') == "guru") {
					$this->load->view('menu_guru');
				} else {
					$this->load->view('menu');
				}
				$this->load->view('cetak/raport_siswa');
				$this->load->view('bottom');
			} else {
				$this->load->view('404');
			}
		} else {
			redirect(base_url());
		}
	}

	public function raport_print($id,$tipe) {
		if($this->session->userdata('hak_akses') == "guru" || $this->session->userdata('hak_akses') == "admin") { 
			$id_guru = $this->session->userdata("id_guru");
			$sekolah = $this->db->query("SELECT * FROM mst_sekolah")->row();
			$kepala_sekolah = $this->db->query("SELECT nama_kepala_sekolah,nip FROM mst_kepala_sekolah WHERE aktif_kepala_sekolah = 1")->row();

			$cek = $this->db->query("SELECT 
										nama_siswa,
										nis,
										jenis_kelamin,
										tempat_lahir,
										tanggal_lahir,
										alamat_jalan,
										agama,
										email,
										angkatan,
										telepon,
										hp,
										semester,
										tahun_ajaran,
										nama_kelas,
										nilai_raport.id_siswa,
										jadwal_pelajaran.id_kelas,
										jadwal_pelajaran.id_tahun_ajaran FROM nilai_raport 
										INNER JOIN mst_siswa ON nilai_raport.id_siswa = mst_siswa.id_siswa 
										INNER JOIN jadwal_pelajaran ON nilai_raport.id_jadwal_pelajaran = nilai_raport.id_jadwal_pelajaran 
										INNER JOIN mst_kelas ON jadwal_pelajaran.id_kelas = mst_kelas.id_kelas 
										INNER JOIN mst_tahun_ajaran ON jadwal_pelajaran.id_tahun_ajaran = mst_tahun_ajaran.id_tahun_ajaran WHERE id_nilai_raport = '$id'");
			if($cek->num_rows() > 0) {
				$data = $cek->row();
				$d['nama_siswa'] = $data->nama_siswa;
				$d['nis'] = $data->nis;
				$d['jenis_kelamin'] = $data->jenis_kelamin;
				$d['tempat_lahir'] = $data->tempat_lahir;
				$d['tanggal_lahir'] = $data->tanggal_lahir;
				$d['alamat_jalan'] = $data->alamat_jalan;
				$d['agama'] = $data->agama;
				$d['email'] = $data->nis;
				$d['angkatan'] = $data->angkatan;
				$d['telepon'] = $data->telepon;
				$d['hp'] = $data->hp;
				$d['id_siswa']  = $data->id_siswa;
				$d['id_kelas'] = $data->id_kelas;
				$d['nama_kelas'] = $data->nama_kelas;

				$d['semester'] = $data->semester;
				$d['tahun_ajaran'] = $data->tahun_ajaran;
				$d['id_tahun_ajaran'] = $data->id_tahun_ajaran;

				$d['nama_kepala_sekolah'] = $kepala_sekolah->nama_kepala_sekolah;
				$d['nip_kepala_sekolah'] = $kepala_sekolah->nip;
				$d['nama_sekolah'] = $sekolah->nama_sekolah;
				$d['npsn'] = $sekolah->npsn;
				$d['nss'] = $sekolah->nss;
				$d['alamat'] = $sekolah->alamat;
				$d['kelurahan'] = $sekolah->kelurahan;
				$d['kecamatan'] = $sekolah->kecamatan;
				$d['kabupaten'] = $sekolah->kabupaten;
				$d['provinsi'] = $sekolah->provinsi;
				$d['kodepos'] = $sekolah->kodepos;
				$d['no_telepon'] = $sekolah->no_telepon;
				$d['website'] = $sekolah->website;
				$d['email'] = $sekolah->email;

				$cek_walikelas = $this->db->query("SELECT nama_guru,nip FROM mst_walikelas 
												INNER JOIN mst_guru ON mst_walikelas.id_guru = mst_guru.id_guru WHERE id_kelas = $data->id_kelas AND tahun_ajaran = '$data->tahun_ajaran'");
				if($cek_walikelas->num_rows() > 0) {
					$d_walikelas = $cek_walikelas->row();
					$d['nama_walikelas'] = $d_walikelas->nama_guru;
					$d['nip_walikelas'] = $d_walikelas->nip;
				}

				if($tipe == 'cover') {
					$this->load->view('cetak/cover',$d);
				} else if($tipe == 'hal1') {
					$this->load->view('cetak/hal1',$d);
				} else if($tipe == 'hal2') {
					$this->load->view('cetak/hal2',$d);
				} else if($tipe == 'hal3') {
					$this->load->view('cetak/hal3',$d);
				} else if($tipe == 'hal4') {
					$this->load->view('cetak/hal4',$d);
				} else if($tipe == 'hal5') {
					$this->load->view('cetak/hal5',$d);
				} else if($tipe == 'hal6') {
					$this->load->view('cetak/hal6',$d);
				} else {
					$this->load->view('404');
				}
			} else {
				$this->load->view('404');
			}

			
		} else {
			redirect(base_url());
		}
	}
}