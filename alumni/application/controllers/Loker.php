<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Loker extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('hak_akses') != "admin"  && $this->session->userdata('hak_akses') != "alumni") {
			redirect(base_url());
		} else {
			$this->load->Model('Loker_model');
		}
	}


	public function index()
	{
		if ($this->session->userdata('hak_akses') != "") {
			$d['judul'] = "Data Loker";
			$d['loker'] = $this->Loker_model->loker();
			$this->load->view('top', $d);
			$this->load->view('menu');
			$this->load->view('loker/loker');
			$this->load->view('bottom');
		} else {
			redirect(base_url());
		}
	}

	public function loker_daftar()
	{
		if ($this->session->userdata('hak_akses') != "") {
			$d['judul'] = "Informasi Lowongan Kerja";
			$d['loker'] = $this->Loker_model->loker();
			$this->load->view('top', $d);
			$this->load->view('menu');
			$this->load->view('loker/loker_daftar');
			$this->load->view('bottom');
		} else {
			redirect(base_url());
		}
	}




	public function loker_tambah()
	{
		$d['judul'] = "Tambah Informasi Lowongan Kerja";
		$d['tipe'] = 'add';
		$d['judul_loker'] = "";
		$d['isi'] = "";
		$d['gambar'] = "";
		$d['id_loker'] = "";
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('loker/loker_tambah');
		$this->load->view('bottom');
	}


	public function loker_edit($id_loker)
	{
		$cek = $this->db->query("SELECT * FROM mst_loker WHERE id_loker = '$id_loker'");
		if ($cek->num_rows() > 0) {
			$d['judul'] = "Ubah Loker";
			$d['tipe'] = 'edit';
			$data = $cek->row();
			$d['judul_loker'] = $data->judul_loker;
			$d['isi'] = $data->isi;
			$d['gambar'] = $data->gambar;
			$d['id_loker'] = $data->id_loker;
			$this->load->view('top', $d);
			$this->load->view('menu');
			$this->load->view('loker/loker_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}
	}


	public function loker_detail($id_loker)
	{
		$cek = $this->db->query("SELECT * FROM mst_loker WHERE id_loker = '$id_loker'");
		if ($cek->num_rows() > 0) {
			$d['judul'] = "Detail Loker";
			$d['tipe'] = 'edit';
			$data = $cek->row();
			$d['judul_loker'] = $data->judul_loker;
			$d['isi'] = $data->isi;
			$d['gambar'] = $data->gambar;
			$d['id_loker'] = $data->id_loker;
			$this->load->view('top', $d);
			$this->load->view('menu');
			$this->load->view('loker/loker_detail');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}
	}

	public function loker_save()
	{
		$tipe = $this->input->post("tipe");
		$in['judul_loker'] = $this->input->post("judul_loker");
		$in['isi'] = $this->input->post("isi");
		$where['id_loker'] = $this->input->post("id_loker");

		$config['upload_path'] = './upload/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['encrypt_name']	= TRUE;
		$config['remove_spaces']	= TRUE;
		$config['max_size']     = '0';
		$config['max_width']  	= '30000';
		$config['max_height']  	= '30000';

		$this->load->library('upload', $config);

		if($tipe == "add") {	

			if(!empty($_FILES['gambar']['name'])) {
				if($this->upload->do_upload("gambar")) {
					$data	 	= $this->upload->data();
					$in['gambar'] = $data['file_name'];
					@unlink("./upload/".$this->input->post("old_gambar"));
				} else {
					$this->session->set_flashdata("error",$this->upload->display_errors());
					redirect("loker/loker_tambah/");
				}	
			}
					
			$this->db->insert("mst_loker",$in);
			$this->session->set_flashdata("success","Tambah Loker Berhasil");	
			redirect("loker");
		} elseif($tipe = 'edit') {
			if(!empty($_FILES['gambar']['name'])) {
				if($this->upload->do_upload("gambar")) {
					$data	 	= $this->upload->data();
					$in['gambar'] = $data['file_name'];
					@unlink("./upload/".$this->input->post("old_gambar"));
				} else {
					$this->session->set_flashdata("error",$this->upload->display_errors());
					redirect("loker/loker_edit/".$this->input->post("id_loker"));
				}	
			}
			
			$this->db->update("mst_loker",$in,$where);
			$this->session->set_flashdata("success","Ubah Loker Berhasil");
			redirect("loker");
		} else {
			redirect("loker");
		}
	}

	public function loker_hapus($id)
	{
		$where['id_loker'] = $id;
		$this->db->delete("mst_loker", $where);
		$this->session->set_flashdata("success", "Hapus Loker Berhasil");
		redirect("loker/");
	}
}
