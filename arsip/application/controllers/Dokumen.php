<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokumen extends CI_Controller {


	public function __construct(){
		parent::__construct();
		if($this->session->userdata('hak_akses') != "admin") { 
			redirect(base_url());
		} else {
            $this->load->Model('Dokumen_model');
            $this->load->Model('Combo_model');
		}
	}



	public function index() {
		$d['judul'] = "Data Dokumen";
		$d['dokumen'] = $this->Dokumen_model->dokumen();
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('dokumen/dokumen');
		$this->load->view('bottom');	
	}



	public function dokumen_tambah() {
		$get_tahun = $this->db->query("SELECT id_tahun_ajaran,tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();
		$d['judul'] = "Data Dokumen";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
        $d['nama_dokumen'] = "";
        $d['nomor_dokumen'] = "";
        $d['deskripsi'] = "";
        $d['id_dokumen'] = "";
		$d['file_dokumen'] = "";
		$d['tanggal_dokumen'] = "";
		$d['combo_ruangan'] = $this->Combo_model->combo_ruangan();
		$d['combo_lemari'] = $this->Combo_model->combo_lemari();
        $d['combo_rak'] = $this->Combo_model->combo_rak();
        $d['combo_box'] = $this->Combo_model->combo_box();
        $d['combo_map'] = $this->Combo_model->combo_map();
		$d['combo_urut'] = $this->Combo_model->combo_urut();
		$d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran_only($get_tahun->tahun_ajaran);
		$d['combo_jenis_dokumen'] = $this->Combo_model->combo_jenis_dokumen();
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('dokumen/dokumen_tambah');
		$this->load->view('bottom');
		
	}


	public function dokumen_edit($id_dokumen) {
		$cek = $this->db->query("SELECT id_dokumen FROM dokumen WHERE id_dokumen = '$id_dokumen'");
		if($cek->num_rows() > 0) { 
			$d['judul'] = "Data Dokumen";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$get = $this->Dokumen_model->dokumen_edit($id_dokumen);
			$data = $get->row();
			$d['nama_dokumen'] = $data->nama_dokumen;
            $d['id_dokumen'] = $data->id_dokumen;
            $d['nomor_dokumen'] = $data->nomor_dokumen;
            $d['deskripsi'] = $data->deskripsi;
			$d['file_dokumen'] = $data->file_dokumen;
			$d['tanggal_dokumen'] = $data->tanggal_dokumen;
			$d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran_only($data->tahun_ajaran);
			$d['combo_lemari'] = $this->Combo_model->combo_lemari($data->id_lemari);
			$d['combo_ruangan'] = $this->Combo_model->combo_ruangan($data->id_ruangan);
			$d['combo_jenis_dokumen'] = $this->Combo_model->combo_jenis_dokumen($data->id_jenis_dokumen);
            $d['combo_rak'] = $this->Combo_model->combo_rak($data->id_rak);
            $d['combo_box'] = $this->Combo_model->combo_box($data->id_box);
            $d['combo_map'] = $this->Combo_model->combo_map($data->id_map);
            $d['combo_urut'] = $this->Combo_model->combo_urut($data->id_urut);
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('dokumen/dokumen_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}	
	}

	public function dokumen_save() {
			$tipe = $this->input->post("tipe");	
			$in['id_jenis_dokumen'] = $this->input->post("id_jenis_dokumen");
            $in['nama_dokumen'] = $this->input->post("nama_dokumen");
            $in['nomor_dokumen'] = $this->input->post("nomor_dokumen");
            $in['deskripsi'] = $this->input->post("deskripsi");
            $in['id_ruangan'] = $this->input->post("id_ruangan");
            $in['id_rak'] = $this->input->post("id_rak");
            $in['id_box'] = $this->input->post("id_box");
            $in['id_map'] = $this->input->post("id_map");
			$in['id_urut'] = $this->input->post("id_urut");
			$in['id_lemari'] = $this->input->post("id_lemari");
			$in['tahun_ajaran'] = $this->input->post("tahun_ajaran");
			$in['tanggal_dokumen'] = date("Y-m-d",strtotime($this->input->post("tanggal_dokumen")));
            $in['tanggal'] = date("Y-m-d H:i:s");

            $config['upload_path'] = './upload';
			$config['allowed_types']= '*';
			$config['encrypt_name']	= FALSE;
			$config['remove_spaces']	= TRUE;	
			$config['max_size']     = '0';
			$config['max_width']  	= '0';
			$config['max_height']  	= '0';

			$this->load->library('upload', $config);
			
			if($tipe == "add") {
				if(!empty($_FILES['file_dokumen']['name'])) {
                    if($this->upload->do_upload("file_dokumen")) {
                        $data	 	= $this->upload->data();
                        $in['file_dokumen'] = $data['file_name'];	
                        $this->db->insert("dokumen",$in);
                        $this->session->set_flashdata("success","Tambah Data Dokumen Berhasil");
                        redirect("dokumen");	
                    } else {
                        $this->session->set_flashdata("error",$this->upload->display_errors());
                        redirect("dokumen/dokumen_tambah/");	
                    }
                } else {
                    $this->session->set_flashdata("error",$this->upload->display_errors());	
                    redirect("dokumen/dokumen_tambah/");
                }
			} elseif($tipe = 'edit') {
				
				$where['id_dokumen'] 	= $this->input->post('id_dokumen');
				if(!empty($_FILES['file_dokumen']['name'])) {
                    if($this->upload->do_upload("file_dokumen")) {
                        $data	 	= $this->upload->data();
                        $in['file_dokumen'] = $data['file_name'];	
                        $this->db->update("dokumen",$in,$where);
                        @unlink("./upload/".$this->input->post("file_dokumen_lama"));
                        $this->session->set_flashdata("success","Ubah Data Dokumen Berhasil");
                        redirect("dokumen");	
                    }
                } else {
                    $this->db->update("dokumen",$in,$where);
                    $this->session->set_flashdata("success","Ubah Data Dokumen Berhasil");
                    redirect("dokumen");	
                }
				
			} else {
				redirect(base_url());
			}
	}
}