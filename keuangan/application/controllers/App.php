<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->Model('Informasi_model');
	}

	public function index() {
		if($this->session->userdata('hak_akses') != "") {
			redirect(base_url().'home'); 
		} else {
			redirect('../');
		}
	}

	public function informasi() {
		$d['judul'] = "Informasi Keuangan";
		$d['informasi'] = $this->Informasi_model->informasi_keuangan();
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('informasi/informasi');
		$this->load->view('bottom');	
	}
	

	public function informasi_tambah() {
		$d['judulx'] = "Informasi Keuangan";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['judul'] = "";
		$d['isi'] = "";
		$d['gambar'] = "";
		$d['id_informasi'] = "";
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('informasi/informasi_tambah');
		$this->load->view('bottom');
		
	}

	public function informasi_edit($id_informasi) {
		$cek = $this->db->query("SELECT * FROM mst_informasi_keuangan WHERE id_informasi = '$id_informasi'");
		if($cek->num_rows() > 0) { 
			$d['judulx'] = "Informasi Keuangan";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$data = $cek->row();
			$d['judul'] = $data->judul;
			$d['isi'] = $data->isi;
			$d['gambar'] = $data->gambar;
			$d['id_informasi'] = $data->id_informasi;
		
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('informasi/informasi_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}	
	}


	public function informasi_save() {
		$tipe = $this->input->post("tipe");	
		$in['judul'] = $this->input->post("judul");
		$in['isi'] = $this->input->post("isi");


		$config['upload_path'] = './upload/informasi';
		$config['allowed_types']= 'jpg|png';
		$config['encrypt_name']	= TRUE;
		$config['remove_spaces']	= TRUE;	
		$config['max_size']     = '0';
		$config['max_width']  	= '0';
		$config['max_height']  	= '0';

		$this->load->library('upload', $config);

		
		if($tipe == "add") {
			if(!empty($_FILES['gambar']['name'])) {
				if($this->upload->do_upload("gambar")) {
					$data	 	= $this->upload->data();
					$in['gambar'] = $data['file_name'];	
					$this->db->insert("mst_informasi_keuangan",$in);
					$this->session->set_flashdata("success","Tambah Data Informasi Keuangan Berhasil");
					redirect("app/informasi/");
				} else {
					$this->session->set_flashdata("error",$this->upload->display_errors());
					redirect("app/informasi_tambah/");	
				}
			} else {
				$this->db->insert("mst_informasi_keuangan",$in);
				$this->session->set_flashdata("success","Tambah Data informasi_keuangan Berhasil");	
				redirect("app/informasi/");
			}
		} elseif($tipe = 'edit') {
			$where['id_informasi'] 	= $this->input->post('id_informasi');
			if(!empty($_FILES['gambar']['name'])) {
				if($this->upload->do_upload("gambar")) {
					$data	 	= $this->upload->data();
					$in['gambar'] = $data['file_name'];	
					$this->db->update("mst_informasi_keuangan",$in,$where);
					@unlink("./upload/informasi/".$this->input->post("gambar_lama"));
					$this->session->set_flashdata("success","Ubah Data Informasi Keuangan Berhasil");
					redirect("app/informasi/");	
				}
			} else {
				$this->db->update("mst_informasi_keuangan",$in,$where);
				$this->session->set_flashdata("success","Ubah Data Informasi Keuangan Berhasil");
				redirect("app/informasi/");	
			}
			
		} else {
			redirect(base_url());
		}
	}


	public function informasi_hapus($id_informasi) {
		$get = $this->db->query("SELECT gambar FROM mst_informasi_keuangan WHERE id_informasi = '$id_informasi'")->row();
		@unlink("./upload/informasi/".$get->gambar);

		$where['id_informasi'] = $id_informasi;
		$this->db->delete("mst_informasi_keuangan",$where);
		$this->session->set_flashdata("success","Hapus Informasi Keuangan Berhasil");
		redirect("app/informasi/");	
	}


	public function agenda_save() {
		$tanggal = $this->input->post("date");
		$ex_tanggal = explode("-",$tanggal);
		$in['title'] = $this->input->post("info");
		$in['start'] = date("Y-m-d",strtotime($tanggal));
		$in['end'] = date("Y-m-d",strtotime($tanggal));
		$in['year'] = $ex_tanggal[0];
		$this->db->insert("calendar_keuangan",$in);
		redirect(base_url().'home');	
	}

	public function agenda_hapus() {
		$where['id'] = $this->input->post("id");	
		$this->db->delete("calendar_keuangan",$where);
		redirect(base_url().'home');	
	}
}
