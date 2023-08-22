<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Banner extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('hak_akses') != "admin") {
            redirect(base_url());
        } else {
            $this->load->Model('Banner_model');
        }
    }


    public function index()
    {
        $d['judul'] = "Data Banner";
        $d['banner'] = $this->Banner_model->banner();
        $this->load->view('top', $d);
        $this->load->view('menu');
        $this->load->view('banner/banner');
        $this->load->view('bottom');
    }



    public function banner_tambah()
    {
        $d['judul'] = "Data Banner";
        $d['judul2'] = "Tambah";
        $d['tipe'] = 'add';
        $d['file_gambar'] = "";
        $this->load->view('top', $d);
        $this->load->view('menu');
        $this->load->view('banner/banner_tambah');
        $this->load->view('bottom');
    }


   

    public function banner_save() {
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
                $this->db->insert("ppdb_banner",$in);
                $this->session->set_flashdata("success", "Tambah  Banner Berhasil");
                redirect("banner");
            } else {
                $this->session->set_flashdata("error", "'.$this->upload->display_errors().'");
                redirect("banner/banner_tambah");	
            }
        } else {
            $this->session->set_flashdata("error", "'.$this->upload->display_errors().'");
            redirect("banner/banner_tambah");
        }
}

    public function banner_hapus($id)
    {
        $get = $this->db->query("SELECT * FROM ppdb_banner WHERE id_banner = $id")->row();
        $where['id_banner'] = $id;
        @unlink("./upload/".$get->file_gambar);
        $this->db->delete("ppdb_banner", $where);
        $this->session->set_flashdata("success", "Hapus Banner Berhasil");
        redirect("banner");	
    }
}
