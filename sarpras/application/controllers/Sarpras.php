<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sarpras extends CI_Controller {


	public function __construct(){
		parent::__construct();
		if($this->session->userdata('hak_akses') != "admin") { 
			redirect(base_url());
		} else {
            $this->load->Model('Sarpras_model');
            $this->load->Model('Combo_model');
		}
	}



	public function index() {
		$d['judul'] = "Data Sarpras";
		$d['sarpras'] = $this->Sarpras_model->sarpras();
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('sarpras/sarpras');
		$this->load->view('bottom');	
	}



	public function sarpras_tambah() {
		$get_tahun = $this->db->query("SELECT id_tahun_ajaran,tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();
		$d['judul'] = "Data Sarpras";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
        $d['nama_sarpras'] = "";
        $d['nomor_sarpras'] = "";
        $d['deskripsi'] = "";
        $d['id_sarpras'] = "";
		$d['file_sarpras'] = "";
		$d['tanggal_sarpras'] = "";
		$d['combo_ruangan'] = $this->Combo_model->combo_ruangan();
		$d['combo_lemari'] = $this->Combo_model->combo_lemari();
        $d['combo_rak'] = $this->Combo_model->combo_rak();
        $d['combo_box'] = $this->Combo_model->combo_box();
        $d['combo_map'] = $this->Combo_model->combo_map();
		$d['combo_urut'] = $this->Combo_model->combo_urut();
		$d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran_only($get_tahun->tahun_ajaran);
		$d['combo_jenis_barang'] = $this->Combo_model->combo_jenis_barang();
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('sarpras/sarpras_tambah');
		$this->load->view('bottom');
		
	}


	public function sarpras_edit($id_sarpras) {
		$cek = $this->db->query("SELECT id_sarpras FROM sarpras WHERE id_sarpras = '$id_sarpras'");
		if($cek->num_rows() > 0) { 
			$d['judul'] = "Data Sarpras";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$get = $this->Sarpras_model->sarpras_edit($id_sarpras);
			$data = $get->row();
			$d['nama_sarpras'] = $data->nama_sarpras;
            $d['id_sarpras'] = $data->id_sarpras;
            $d['nomor_sarpras'] = $data->nomor_sarpras;
            $d['deskripsi'] = $data->deskripsi;
			$d['file_sarpras'] = $data->file_sarpras;
			$d['tanggal_sarpras'] = $data->tanggal_sarpras;
			$d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran_only($data->tahun_ajaran);
			$d['combo_lemari'] = $this->Combo_model->combo_lemari($data->id_lemari);
			$d['combo_ruangan'] = $this->Combo_model->combo_ruangan($data->id_ruangan);
			$d['combo_jenis_barang'] = $this->Combo_model->combo_jenis_barang($data->id_jenis_barang);
            $d['combo_rak'] = $this->Combo_model->combo_rak($data->id_rak);
            $d['combo_box'] = $this->Combo_model->combo_box($data->id_box);
            $d['combo_map'] = $this->Combo_model->combo_map($data->id_map);
            $d['combo_urut'] = $this->Combo_model->combo_urut($data->id_urut);
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('sarpras/sarpras_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}	
	}

	public function sarpras_save() {
			$tipe = $this->input->post("tipe");	
			$in['id_jenis_barang'] = $this->input->post("id_jenis_barang");
            $in['nama_sarpras'] = $this->input->post("nama_sarpras");
            $in['nomor_sarpras'] = $this->input->post("nomor_sarpras");
            $in['deskripsi'] = $this->input->post("deskripsi");
            $in['id_ruangan'] = $this->input->post("id_ruangan");
            $in['id_rak'] = $this->input->post("id_rak");
            $in['id_box'] = $this->input->post("id_box");
            $in['id_map'] = $this->input->post("id_map");
			$in['id_urut'] = $this->input->post("id_urut");
			$in['id_lemari'] = $this->input->post("id_lemari");
			$in['tahun_ajaran'] = $this->input->post("tahun_ajaran");
			$in['tanggal_sarpras'] = date("Y-m-d",strtotime($this->input->post("tanggal_sarpras")));
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
				if(!empty($_FILES['file_sarpras']['name'])) {
                    if($this->upload->do_upload("file_sarpras")) {
                        $data	 	= $this->upload->data();
                        $in['file_sarpras'] = $data['file_name'];	
                        $this->db->insert("sarpras",$in);
                        $this->session->set_flashdata("success","Tambah Data Sarpras Berhasil");
                        redirect("sarpras");	
                    } else {
                        $this->session->set_flashdata("error",$this->upload->display_errors());
                        redirect("sarpras/sarpras_tambah/");	
                    }
                } else {
                    $this->session->set_flashdata("error",$this->upload->display_errors());	
                    redirect("sarpras/sarpras_tambah/");
                }
			} elseif($tipe = 'edit') {
				
				$where['id_sarpras'] 	= $this->input->post('id_sarpras');
				if(!empty($_FILES['file_sarpras']['name'])) {
                    if($this->upload->do_upload("file_sarpras")) {
                        $data	 	= $this->upload->data();
                        $in['file_sarpras'] = $data['file_name'];	
                        $this->db->update("sarpras",$in,$where);
                        @unlink("./upload/".$this->input->post("file_sarpras_lama"));
                        $this->session->set_flashdata("success","Ubah Data Sarpras Berhasil");
                        redirect("sarpras");	
                    }
                } else {
                    $this->db->update("sarpras",$in,$where);
                    $this->session->set_flashdata("success","Ubah Data Sarpras Berhasil");
                    redirect("sarpras");	
                }
				
			} else {
				redirect(base_url());
			}
	}
}