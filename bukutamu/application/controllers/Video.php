<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Video extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('hak_akses') != "admin") {
            redirect(base_url());
        } else {
            $this->load->Model('Video_model');
        }
    }


    public function index()
    {
        $d['judul'] = "Data Video";
        $d['video'] = $this->Video_model->video();
        $this->load->view('top', $d);
        $this->load->view('menu');
        $this->load->view('video/video');
        $this->load->view('bottom');
    }



    public function video_tambah()
    {
        $d['judul'] = "Data Video";
        $d['judul2'] = "Tambah";
        $d['tipe'] = 'add';
        $d['judul_video'] = "";
        $d['link'] = "";
        $d['id_video'] = "";
        $this->load->view('top', $d);
        $this->load->view('menu');
        $this->load->view('video/video_tambah');
        $this->load->view('bottom');
    }

    
    public function video_iu()
    {
        $d['judul'] = "Data Video";
        $d['video'] = $this->Video_model->video();
        $this->load->view('top', $d);
        $this->load->view('menu');
        $this->load->view('video/video');
        $this->load->view('bottom');
    }


    public function video_edit($id_video)
    {
        $cek = $this->db->query("SELECT id_video FROM video_display WHERE id_video = '$id_video'");
        if ($cek->num_rows() > 0) {
            $d['judul'] = "Data Video";
            $d['judul2'] = "Ubah";
            $d['tipe'] = 'edit';
            $get = $this->Video_model->video_edit($id_video);
            $data = $get->row();
            $d['judul_video'] = $data->judul_video;
            $d['link'] = $data->link;
            $d['id_video'] = $data->id_video;
            $this->load->view('top', $d);
            $this->load->view('menu');
            $this->load->view('video/video_tambah');
            $this->load->view('bottom');
        } else {
            $this->load->view('top');
            $this->load->view('menu');
            $this->load->view('404');
            $this->load->view('bottom');
        }
    }

    public function video_save()
    {
        $tipe = $this->input->post("tipe");
        $in['judul_video'] = $this->input->post("judul_video");
        $in['link'] = $this->input->post("link");
        if ($tipe == "add") {
            $this->db->insert("video_display", $in);
            $this->session->set_flashdata("success", "Tambah Data Video Berhasil");
            redirect("Video");
        } elseif ($tipe = 'edit') {
            $where['id_video']     = $this->input->post('id_video');
            $this->db->update("video_display", $in, $where);
            $this->session->set_flashdata("success", "Ubah Data Video Berhasil");
            redirect("Video");
        } else {
            redirect(base_url());
        }
    }

    public function video_hapus($id)
    {
        $where['id_video'] = $id;
        $this->db->delete("video_display", $where);
        $this->session->set_flashdata("success", "Hapus video Berhasil");
        redirect("Video");
    }
}
