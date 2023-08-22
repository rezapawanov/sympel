<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jadwal_pelajaran extends CI_Controller {


	public function __construct(){
		parent::__construct();
		if($this->session->userdata('hak_akses') != "admin") { 
			redirect(base_url());
		} else {
			$this->load->Model('jadwal_pelajaran_model');
			$this->load->Model('Combo_model');
		}
	}


	public function index() {
		redirect(base_url());
	}

	public function proses_tampil_jadwal_pelajaran() {
		$tahun_ajaran = str_replace("/","-",$this->input->post("tahun_ajaran"));
		$semester = $this->input->post("semester");
		redirect("jadwal_pelajaran/jadwal_pelajaran/".$tahun_ajaran."/".$semester);
	}


	public function jadwal_pelajaran($tahun_ajaran="") {
		$d['judul'] = "Data Jadwal Pelajaran";
		if(!empty($tahun_ajaran)) {
			$tahun_ajaran = str_replace("-","/",$tahun_ajaran);
			$d['jadwal_pelajaran'] = $this->jadwal_pelajaran_model->jadwal_pelajaran($tahun_ajaran);
		} else {
			$d['jadwal_pelajaran'] = "";
		}
		$d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran($tahun_ajaran);
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('jadwal_pelajaran/jadwal_pelajaran');
		$this->load->view('bottom');	
	}


	public function jadwal_pelajaran_tambah() {
		$d['judul'] = "Data Jadwal Pelajaran";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['combo_kelas'] = $this->Combo_model->combo_kelas();
		$d['combo_mapel'] = $this->Combo_model->combo_mapel();
		$d['combo_guru'] = $this->Combo_model->combo_guru();
		$d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran();

		$d['semester'] = "";
		$d['id_jadwal_pelajaran'] = "";
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('jadwal_pelajaran/jadwal_pelajaran_tambah');
		$this->load->view('bottom');
		
	}


	public function jadwal_pelajaran_edit($id_jadwal_pelajaran) {
		$cek = $this->db->query("SELECT id_jadwal_pelajaran FROM jadwal_pelajaran WHERE id_jadwal_pelajaran = '$id_jadwal_pelajaran'");
		if($cek->num_rows() > 0) { 
			$d['judul'] = "Data Jadwal Pelajaran";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$get = $this->jadwal_pelajaran_model->jadwal_pelajaran_edit($id_jadwal_pelajaran);
			$data = $get->row();
			$d['id_tahun_ajaran'] = $data->id_tahun_ajaran;
			$d['combo_kelas'] = $this->Combo_model->combo_kelas($data->id_kelas);
			$d['combo_mapel'] = $this->Combo_model->combo_mapel($data->id_mapel);
			$d['combo_guru'] = $this->Combo_model->combo_guru($data->id_guru);
			$d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran($data->id_tahun_ajaran);
			$d['id_jadwal_pelajaran'] = $data->id_jadwal_pelajaran;
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('jadwal_pelajaran/jadwal_pelajaran_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}	
	}

	public function jadwal_pelajaran_save() {
			$tipe = $this->input->post("tipe");	
			$in['id_kelas'] = $this->input->post("id_kelas");
			$in['id_mapel'] = $this->input->post("id_mapel");
			$in['id_guru'] = $this->input->post("id_guru");
			$in['id_tahun_ajaran'] = $this->input->post("id_tahun_ajaran");

			if($tipe == "add") {
				$cek = $this->db->query("SELECT id_jadwal_pelajaran FROM jadwal_pelajaran WHERE id_guru = '$in[id_guru]' AND id_kelas = '$in[id_kelas]' AND id_tahun_ajaran = '$in[id_tahun_ajaran]'");
				if($cek->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Jadwal Sudah Di Input");
					redirect("jadwal_pelajaran/jadwal_pelajaran_tambah/");
				} else { 	
					$this->db->insert("jadwal_pelajaran",$in);
					$this->session->set_flashdata("success","Tambah Data Jadwal Pelajaran Berhasil");
					redirect("jadwal_pelajaran/jadwal_pelajaran/".$in['id_tahun_ajaran']);
				}
			} elseif($tipe = 'edit') {
				$where['id_jadwal_pelajaran'] 	= $this->input->post('id_jadwal_pelajaran');
				$cek = $this->db->query("SELECT id_jadwal_pelajaran FROM jadwal_pelajaran WHERE id_guru = '$in[id_guru]' AND id_kelas = '$in[id_kelas]' AND id_tahun_ajaran = '$in[id_tahun_ajaran]' AND id_jadwal_pelajaran != '$where[id_jadwal_pelajaran]'");
				if($cek->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input.  Jadwal Sudah Di Input");
					redirect("jadwal_pelajaran/jadwal_pelajaran_edit/".$this->input->post("id_jadwal_pelajaran"));
				}  else { 	
					$this->db->update("jadwal_pelajaran",$in,$where);
					$this->session->set_flashdata("success","Ubah Data Jadwal Pelajaran Berhasil");
					redirect("jadwal_pelajaran/jadwal_pelajaran/".$in['id_tahun_ajaran']);
				}
				
			} else {
				redirect(base_url());
			}
	}
}