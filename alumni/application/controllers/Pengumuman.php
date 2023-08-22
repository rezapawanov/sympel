<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pengumuman extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('hak_akses') != "admin" && $this->session->userdata('hak_akses') != "gurubk" && $this->session->userdata('hak_akses') != "guru" && $this->session->userdata('hak_akses') != "alumni") {
			redirect(base_url());
		} else {
			$this->load->Model('Pengumuman_model');
		}
	}


	public function index()
	{
		$d['judul'] = "Data  Informasi Pengumuman";
		$d['pengumuman'] = $this->Pengumuman_model->pengumuman();
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('pengumuman/pengumuman');
		$this->load->view('bottom');
	}

	public function pengumuman_daftar()
	{
		$d['judul'] = "Informasi Informasi Pengumuman";
		$d['pengumuman'] = $this->Pengumuman_model->pengumuman();
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('pengumuman/pengumuman_daftar');
		$this->load->view('bottom');
	}




	public function pengumuman_tambah()
	{
		$d['judul'] = "Tambah Informasi Pengumuman";
		$d['tipe'] = 'add';
		$d['judul_pengumuman'] = "";
		$d['isi'] = "";
		$d['gambar'] = "";
		$d['id_pengumuman'] = "";
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('pengumuman/pengumuman_tambah');
		$this->load->view('bottom');
	}


	public function pengumuman_edit($id_pengumuman)
	{
		$cek = $this->db->query("SELECT * FROM mst_pengumuman_alumni WHERE id_pengumuman = '$id_pengumuman'");
		if ($cek->num_rows() > 0) {
			$d['judul'] = "Ubah  Informasi Pengumuman";
			$d['tipe'] = 'edit';
			$data = $cek->row();
			$d['judul_pengumuman'] = $data->judul_pengumuman;
			$d['isi'] = $data->isi;
			$d['gambar'] = $data->gambar;
			$d['id_pengumuman'] = $data->id_pengumuman;
			$this->load->view('top', $d);
			$this->load->view('menu');
			$this->load->view('pengumuman/pengumuman_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}
	}


	public function pengumuman_detail($id_pengumuman)
	{
		$cek = $this->db->query("SELECT * FROM mst_pengumuman_alumni WHERE id_pengumuman = '$id_pengumuman'");
		if ($cek->num_rows() > 0) {
			$d['judul'] = "Detail  Informasi Pengumuman";
			$d['tipe'] = 'edit';
			$data = $cek->row();
			$d['judul_pengumuman'] = $data->judul_pengumuman;
			$d['isi'] = $data->isi;
			$d['gambar'] = $data->gambar;
			$d['id_pengumuman'] = $data->id_pengumuman;
			$this->load->view('top', $d);
			$this->load->view('menu');
			$this->load->view('pengumuman/pengumuman_detail');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}
	}

	public function pengumuman_save()
	{
		$tipe = $this->input->post("tipe");
		$in['judul_pengumuman'] = $this->input->post("judul_pengumuman");
		$in['isi'] = $this->input->post("isi");
		$where['id_pengumuman'] = $this->input->post("id_pengumuman");

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
					redirect("pengumuman/pengumuman_tambah/");
				}	
			}
					
			$this->db->insert("mst_pengumuman_alumni",$in);
			$this->session->set_flashdata("success","Tambah pengumuman Berhasil");	
			redirect("pengumuman");
		} elseif($tipe = 'edit') {
			if(!empty($_FILES['gambar']['name'])) {
				if($this->upload->do_upload("gambar")) {
					$data	 	= $this->upload->data();
					$in['gambar'] = $data['file_name'];
					@unlink("./upload/".$this->input->post("old_gambar"));
				} else {
					$this->session->set_flashdata("error",$this->upload->display_errors());
					redirect("pengumuman/pengumuman_edit/".$this->input->post("id_pengumuman"));
				}	
			}
			
			$this->db->update("mst_pengumuman_alumni",$in,$where);
			$this->session->set_flashdata("success","Ubah pengumuman Berhasil");
			redirect("pengumuman");
		} else {
			redirect("pengumuman");
		}
	}

	public function pengumuman_hapus($id)
	{
		$where['id_pengumuman'] = $id;
		$this->db->delete("mst_pengumuman_alumni", $where);
		$this->session->set_flashdata("success", "Hapus pengumuman Berhasil");
		redirect("pengumuman/");
	}
}
