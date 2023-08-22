<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('hak_akses') != "admin") {
            redirect(base_url());
        }
    }


    public function index()
    {
        $d['judul'] = "Pengaturan";
        $d['judul2'] = "Ubah";
        $data = $this->db->query("SELECT * FROM pengaturan_kelulusan WHERE id = 1")->row();
        $d['banner_header'] = $data->banner_header;
        $d['tanggal_pengumuman'] = $data->tanggal_pengumuman;
        $d['tahun'] = $data->tahun;
        $d['informasi_kelulusan'] = $data->informasi_kelulusan;
        $d['informasi_lain'] = $data->informasi_lain;
        $this->load->view('top', $d);
        $this->load->view('menu');
        $this->load->view('pengaturan/pengaturan');
        $this->load->view('bottom');
    }

    public function pengaturan_save()
    {
        $in['tahun'] = $this->input->post("tahun");
        $in['tanggal_pengumuman'] = $this->input->post("tanggal_pengumuman");
        $in['informasi_kelulusan'] = $this->input->post("informasi_kelulusan");
        $in['informasi_lain'] = $this->input->post("informasi_lain");

        $get = $this->db->query("SELECT * FROM pengaturan_kelulusan WHERE id = 1")->row();
        $where['id']     = 1;

        $config['upload_path'] = './upload';
        $config['allowed_types']= 'jpg|png';
        $config['encrypt_name']	= TRUE;
        $config['remove_spaces']	= TRUE;	
        $config['max_size']     = '0';
        $config['max_width']  	= '0';
        $config['max_height']  	= '0';

        $this->load->library('upload', $config);

        if (!empty($_FILES['file_banner']['name'])) {
            if ($this->upload->do_upload("file_banner")) {
                $data         = $this->upload->data();
                $in['banner_header'] = $data['file_name'];
                @unlink("./upload/".$get->banner_header);
            } else {
                echo $this->upload->display_errors(); 
            }
        }

        $this->db->update("pengaturan_kelulusan", $in, $where);
        $this->session->set_flashdata("success", "Berhasil Update Pengaturan");
        redirect("pengaturan");
    }
}
