<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {


	public function __construct(){
		parent::__construct();
		if($this->session->userdata('hak_akses') == "admin" || $this->session->userdata('hak_akses') == "sarpras") { 
			$this->load->Model('Master_model');
		} else {
			redirect(base_url());
		}
	}


	public function index() {
		redirect(base_url());
	}


	public function lemari() {
		$d['judul'] = "Data lemari";
		$d['lemari'] = $this->Master_model->lemari();
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('lemari/lemari');
		$this->load->view('bottom');	
	}



	public function lemari_tambah() {
		$d['judul'] = "Data lemari";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['nama_lemari'] = "";
		$d['id_lemari'] = "";
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('lemari/lemari_tambah');
		$this->load->view('bottom');
		
	}


	public function lemari_edit($id_lemari) {
		$cek = $this->db->query("SELECT id_lemari FROM mst_lemari WHERE id_lemari = '$id_lemari'");
		if($cek->num_rows() > 0) { 
			$d['judul'] = "Data lemari";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$get = $this->Master_model->lemari_edit($id_lemari);
			$data = $get->row();
			$d['nama_lemari'] = $data->nama_lemari;
			$d['id_lemari'] = $data->id_lemari;
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('lemari/lemari_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}	
	}

	public function lemari_save() {
			$tipe = $this->input->post("tipe");	
			$in['nama_lemari'] = $this->input->post("nama_lemari");
			
			if($tipe == "add") {
				$cek = $this->db->query("SELECT nama_lemari FROM mst_lemari WHERE nama_lemari = '$in[nama_lemari]'");
				if($cek->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Nama lemari Sudah Digunakan");
					redirect("master/lemari_tambah/");
				}  else { 	
					$this->db->insert("mst_lemari",$in);
					$this->session->set_flashdata("success","Tambah Data lemari Berhasil");
					redirect("master/lemari/");	
				}
			} elseif($tipe = 'edit') {
				$where['id_lemari'] 	= $this->input->post('id_lemari');
				$cek = $this->db->query("SELECT nama_lemari FROM mst_lemari WHERE nama_lemari = '$in[nama_lemari]' AND id_lemari != '$where[id_lemari]'");
				if($cek->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Nama lemari Sudah Digunakan");
					redirect("master/lemari_edit/".$this->input->post("id_lemari"));
				} else { 	
					$this->db->update("mst_lemari",$in,$where);
					$this->session->set_flashdata("success","Ubah Data lemari Berhasil");
					redirect("master/lemari/");
				}
				
			} else {
				redirect(base_url());
			}
	}

	public function jenis_barang() {
		$d['judul'] = "Data Jenis Barang";
		$d['jenis_barang'] = $this->Master_model->jenis_barang();
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('jenis_barang/jenis_barang');
		$this->load->view('bottom');	
	}



	public function jenis_barang_tambah() {
		$d['judul'] = "Data Jenis Barang";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['nama_jenis_barang'] = "";
		$d['id_jenis_barang'] = "";
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('jenis_barang/jenis_barang_tambah');
		$this->load->view('bottom');
		
	}


	public function jenis_barang_edit($id_jenis_barang) {
		$cek = $this->db->query("SELECT id_jenis_barang FROM mst_jenis_barang WHERE id_jenis_barang = '$id_jenis_barang'");
		if($cek->num_rows() > 0) { 
			$d['judul'] = "Data Jenis Barang";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$get = $this->Master_model->jenis_barang_edit($id_jenis_barang);
			$data = $get->row();
			$d['nama_jenis_barang'] = $data->nama_jenis_barang;
			$d['id_jenis_barang'] = $data->id_jenis_barang;
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('jenis_barang/jenis_barang_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}	
	}

	public function jenis_barang_save() {
			$tipe = $this->input->post("tipe");	
			$in['nama_jenis_barang'] = $this->input->post("nama_jenis_barang");
			
			if($tipe == "add") {
				$cek = $this->db->query("SELECT nama_jenis_barang FROM mst_jenis_barang WHERE nama_jenis_barang = '$in[nama_jenis_barang]'");
				if($cek->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Nama Jenis Barang Sudah Digunakan");
					redirect("master/jenis_barang_tambah/");
				}  else { 	
					$this->db->insert("mst_jenis_barang",$in);
					$this->session->set_flashdata("success","Tambah Data Jenis Barang Berhasil");
					redirect("master/jenis_barang/");	
				}
			} elseif($tipe = 'edit') {
				$where['id_jenis_barang'] 	= $this->input->post('id_jenis_barang');
				$cek = $this->db->query("SELECT nama_jenis_barang FROM mst_jenis_barang WHERE nama_jenis_barang = '$in[nama_jenis_barang]' AND id_jenis_barang != '$where[id_jenis_barang]'");
				if($cek->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Nama Jenis Barang Sudah Digunakan");
					redirect("master/jenis_barang_edit/".$this->input->post("id_jenis_barang"));
				} else { 	
					$this->db->update("mst_jenis_barang",$in,$where);
					$this->session->set_flashdata("success","Ubah Data Jenis Barang Berhasil");
					redirect("master/jenis_barang/");
				}
				
			} else {
				redirect(base_url());
			}
	}


	public function ruangan() {
		$d['judul'] = "Data Ruangan";
		$d['ruangan'] = $this->Master_model->ruangan();
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('ruangan/ruangan');
		$this->load->view('bottom');	
	}



	public function ruangan_tambah() {
		$d['judul'] = "Data Ruangan";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['nama_ruangan'] = "";
		$d['id_ruangan'] = "";
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('ruangan/ruangan_tambah');
		$this->load->view('bottom');
		
	}


	public function ruangan_edit($id_ruangan) {
		$cek = $this->db->query("SELECT id_ruangan FROM mst_ruangan WHERE id_ruangan = '$id_ruangan'");
		if($cek->num_rows() > 0) { 
			$d['judul'] = "Data Ruangan";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$get = $this->Master_model->ruangan_edit($id_ruangan);
			$data = $get->row();
			$d['nama_ruangan'] = $data->nama_ruangan;
			$d['id_ruangan'] = $data->id_ruangan;
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('ruangan/ruangan_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}	
	}

	public function ruangan_save() {
			$tipe = $this->input->post("tipe");	
			$in['nama_ruangan'] = $this->input->post("nama_ruangan");
			
			if($tipe == "add") {
				$cek = $this->db->query("SELECT nama_ruangan FROM mst_ruangan WHERE nama_ruangan = '$in[nama_ruangan]'");
				if($cek->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Nama Ruangan Sudah Digunakan");
					redirect("master/ruangan_tambah/");
				}  else { 	
					$this->db->insert("mst_ruangan",$in);
					$this->session->set_flashdata("success","Tambah Data Ruangan Berhasil");
					redirect("master/ruangan/");	
				}
			} elseif($tipe = 'edit') {
				$where['id_ruangan'] 	= $this->input->post('id_ruangan');
				$cek = $this->db->query("SELECT nama_ruangan FROM mst_ruangan WHERE nama_ruangan = '$in[nama_ruangan]' AND id_ruangan != '$where[id_ruangan]'");
				if($cek->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Nama Ruangan Sudah Digunakan");
					redirect("master/ruangan_edit/".$this->input->post("id_ruangan"));
				} else { 	
					$this->db->update("mst_ruangan",$in,$where);
					$this->session->set_flashdata("success","Ubah Data Ruangan Berhasil");
					redirect("master/ruangan/");
				}
				
			} else {
				redirect(base_url());
			}
	}

	public function rak() {
		$d['judul'] = "Data Rak";
		$d['rak'] = $this->Master_model->rak();
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('rak/rak');
		$this->load->view('bottom');	
	}



	public function rak_tambah() {
		$d['judul'] = "Data Rak";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['nama_rak'] = "";
		$d['id_rak'] = "";
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('rak/rak_tambah');
		$this->load->view('bottom');
		
	}


	public function rak_edit($id_rak) {
		$cek = $this->db->query("SELECT id_rak FROM mst_rak WHERE id_rak = '$id_rak'");
		if($cek->num_rows() > 0) { 
			$d['judul'] = "Data Rak";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$get = $this->Master_model->rak_edit($id_rak);
			$data = $get->row();
			$d['nama_rak'] = $data->nama_rak;
			$d['id_rak'] = $data->id_rak;
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('rak/rak_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}	
	}

	public function rak_save() {
			$tipe = $this->input->post("tipe");	
			$in['nama_rak'] = $this->input->post("nama_rak");
			
			if($tipe == "add") {
				$cek = $this->db->query("SELECT nama_rak FROM mst_rak WHERE nama_rak = '$in[nama_rak]'");
				if($cek->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Nama Rak Sudah Digunakan");
					redirect("master/rak_tambah/");
				}  else { 	
					$this->db->insert("mst_rak",$in);
					$this->session->set_flashdata("success","Tambah Data Rak Berhasil");
					redirect("master/rak/");	
				}
			} elseif($tipe = 'edit') {
				$where['id_rak'] 	= $this->input->post('id_rak');
				$cek = $this->db->query("SELECT nama_rak FROM mst_rak WHERE nama_rak = '$in[nama_rak]' AND id_rak != '$where[id_rak]'");
				if($cek->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Nama Rak Sudah Digunakan");
					redirect("master/rak_edit/".$this->input->post("id_rak"));
				} else { 	
					$this->db->update("mst_rak",$in,$where);
					$this->session->set_flashdata("success","Ubah Data Rak Berhasil");
					redirect("master/rak/");
				}
				
			} else {
				redirect(base_url());
			}
	}

	public function box() {
		$d['judul'] = "Data Box";
		$d['box'] = $this->Master_model->box();
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('box/box');
		$this->load->view('bottom');	
	}



	public function box_tambah() {
		$d['judul'] = "Data Box";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['nama_box'] = "";
		$d['id_box'] = "";
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('box/box_tambah');
		$this->load->view('bottom');
		
	}


	public function box_edit($id_box) {
		$cek = $this->db->query("SELECT id_box FROM mst_box WHERE id_box = '$id_box'");
		if($cek->num_rows() > 0) { 
			$d['judul'] = "Data Box";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$get = $this->Master_model->box_edit($id_box);
			$data = $get->row();
			$d['nama_box'] = $data->nama_box;
			$d['id_box'] = $data->id_box;
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('box/box_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}	
	}

	public function box_save() {
			$tipe = $this->input->post("tipe");	
			$in['nama_box'] = $this->input->post("nama_box");
			
			if($tipe == "add") {
				$cek = $this->db->query("SELECT nama_box FROM mst_box WHERE nama_box = '$in[nama_box]'");
				if($cek->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Nama Box Sudah Digunakan");
					redirect("master/box_tambah/");
				}  else { 	
					$this->db->insert("mst_box",$in);
					$this->session->set_flashdata("success","Tambah Data Box Berhasil");
					redirect("master/box/");	
				}
			} elseif($tipe = 'edit') {
				$where['id_box'] 	= $this->input->post('id_box');
				$cek = $this->db->query("SELECT nama_box FROM mst_box WHERE nama_box = '$in[nama_box]' AND id_box != '$where[id_box]'");
				if($cek->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Nama Box Sudah Digunakan");
					redirect("master/box_edit/".$this->input->post("id_box"));
				} else { 	
					$this->db->update("mst_box",$in,$where);
					$this->session->set_flashdata("success","Ubah Data Box Berhasil");
					redirect("master/box/");
				}
				
			} else {
				redirect(base_url());
			}
	}

	public function map() {
		$d['judul'] = "Data Map";
		$d['map'] = $this->Master_model->map();
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('map/map');
		$this->load->view('bottom');	
	}



	public function map_tambah() {
		$d['judul'] = "Data Map";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['nama_map'] = "";
		$d['id_map'] = "";
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('map/map_tambah');
		$this->load->view('bottom');
		
	}


	public function map_edit($id_map) {
		$cek = $this->db->query("SELECT id_map FROM mst_map WHERE id_map = '$id_map'");
		if($cek->num_rows() > 0) { 
			$d['judul'] = "Data Map";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$get = $this->Master_model->map_edit($id_map);
			$data = $get->row();
			$d['nama_map'] = $data->nama_map;
			$d['id_map'] = $data->id_map;
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('map/map_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}	
	}

	public function map_save() {
			$tipe = $this->input->post("tipe");	
			$in['nama_map'] = $this->input->post("nama_map");
			
			if($tipe == "add") {
				$cek = $this->db->query("SELECT nama_map FROM mst_map WHERE nama_map = '$in[nama_map]'");
				if($cek->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Nama Map Sudah Digunakan");
					redirect("master/map_tambah/");
				}  else { 	
					$this->db->insert("mst_map",$in);
					$this->session->set_flashdata("success","Tambah Data mMapap Berhasil");
					redirect("master/map/");	
				}
			} elseif($tipe = 'edit') {
				$where['id_map'] 	= $this->input->post('id_map');
				$cek = $this->db->query("SELECT nama_map FROM mst_map WHERE nama_map = '$in[nama_map]' AND id_map != '$where[id_map]'");
				if($cek->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Nama Map Sudah Digunakan");
					redirect("master/map_edit/".$this->input->post("id_map"));
				} else { 	
					$this->db->update("mst_map",$in,$where);
					$this->session->set_flashdata("success","Ubah Data Map Berhasil");
					redirect("master/map/");
				}
				
			} else {
				redirect(base_url());
			}
	}

	public function urut() {
		$d['judul'] = "Data Urut";
		$d['urut'] = $this->Master_model->urut();
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('urut/urut');
		$this->load->view('bottom');	
	}



	public function urut_tambah() {
		$d['judul'] = "Data Urut";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['nama_urut'] = "";
		$d['id_urut'] = "";
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('urut/urut_tambah');
		$this->load->view('bottom');
		
	}


	public function urut_edit($id_urut) {
		$cek = $this->db->query("SELECT id_urut FROM mst_urut WHERE id_urut = '$id_urut'");
		if($cek->num_rows() > 0) { 
			$d['judul'] = "Data Urut";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$get = $this->Master_model->urut_edit($id_urut);
			$data = $get->row();
			$d['nama_urut'] = $data->nama_urut;
			$d['id_urut'] = $data->id_urut;
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('urut/urut_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}	
	}

	public function urut_save() {
			$tipe = $this->input->post("tipe");	
			$in['nama_urut'] = $this->input->post("nama_urut");
			
			if($tipe == "add") {
				$this->db->insert("mst_urut",$in);
				$this->session->set_flashdata("success","Tambah Data Urut Berhasil");
				redirect("master/urut/");
			} elseif($tipe = 'edit') {
				$where['id_urut'] 	= $this->input->post('id_urut');
				$this->db->update("mst_urut",$in,$where);
				$this->session->set_flashdata("success","Ubah Data Urut Berhasil");
				redirect("master/urut/");
				
			} else {
				redirect(base_url());
			}
	}
}