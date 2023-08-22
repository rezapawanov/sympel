<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slideshow extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('tipe') != "root") {
            redirect("../" . $this->session->userdata('tipe'));
        } else {
            $this->load->Model('Slideshow_model');
        }
    }


    public function index()
    {
        $d['judul'] = "Data Slideshow";
        $d['slideshow'] = $this->Slideshow_model->slideshow();
        $this->load->view('top', $d);
        $this->load->view('menu');
        $this->load->view('slideshow/slideshow');
        $this->load->view('bottom');
    }



    public function slideshow_tambah()
    {
        $d['judul'] = "Data slideshow";
        $d['judul2'] = "Tambah";
        $d['tipe'] = 'add';
        $d['file_gambar'] = "";
        $this->load->view('top', $d);
        $this->load->view('menu');
        $this->load->view('slideshow/slideshow_tambah');
        $this->load->view('bottom');
    }


   

    public function slideshow_save() {
        $config['upload_path'] = './upload';
        $config['allowed_types']= 'jpg|png';
        $config['encrypt_name']	= TRUE;
        $config['remove_spaces']	= TRUE;	
        $config['max_size']     = '0';
        $config['max_width']  	= '0';
        $config['max_height']  	= '0';

        $this->load->library('upload', $config);
        
        if(!empty($_FILES['file_gambar']['name'])) {
            if($this->upload->do_upload("file_gambar")) {
                $data	 	= $this->upload->data();
                $in['file_gambar'] = $data['file_name'];	
                $this->db->insert("mst_slideshow",$in);
                $this->session->set_flashdata("success","Tambah Gambar Slideshow Berhasil");
				redirect("slideshow");
            } else {
                $this->session->set_flashdata("error",$this->upload->display_errors());
                redirect("slideshow/slideshow_tambah");
            }
        } else {
            $this->session->set_flashdata("error",$this->upload->display_errors());
            redirect("slideshow/slideshow_tambah");
        }
}

    public function slideshow_hapus($id)
    {
        $where['id_slideshow'] = $id;
        $this->db->delete("mst_slideshow", $where);
        $this->session->set_flashdata("success","Hapus Slideshow Berhasil");
		redirect("slideshow");
    }
}
