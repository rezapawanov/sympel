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
        $data = $this->db->query("SELECT * FROM ppdb_pengaturan WHERE id = 1")->row();
        $d['banner_header'] = $data->banner_header;
        $d['tentang'] = $data->tentang;
        $d['pengumuman'] = $data->pengumuman;
        $d['prosedur'] = $data->prosedur;
        $this->load->view('top', $d);
        $this->load->view('menu');
        $this->load->view('pengaturan/pengaturan');
        $this->load->view('bottom');
    }

    public function pengaturan_save()
    {
        $in['tentang'] = $this->input->post("tentang");
        $in['pengumuman'] = $this->input->post("pengumuman");

        $get = $this->db->query("SELECT * FROM ppdb_pengaturan WHERE id = 1")->row();
        $where['id']     = 1;

        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'jpg|png';
        $config['encrypt_name']    = TRUE;
        $config['remove_spaces']    = TRUE;
        $config['max_size']     = '0';
        $config['max_width']      = '0';
        $config['max_height']      = '0';

        $this->load->library('upload', $config);

        if (!empty($_FILES['file_banner']['name'])) {
            if ($this->upload->do_upload("file_banner")) {
                $data         = $this->upload->data();
                $in['banner_header'] = $data['file_name'];
                @unlink("./upload/".$get->banner_header);
            }
        }

        if (!empty($_FILES['file_prosedur']['name'])) {
            if ($this->upload->do_upload("file_prosedur")) {
                $data         = $this->upload->data();
                $in['prosedur'] = $data['file_name'];
                @unlink("./upload/".$get->prosedur);
            }
        }

        $this->db->update("ppdb_pengaturan", $in, $where);
        $this->session->set_flashdata("success", "Berhasil Update Pengaturan");
        redirect("pengaturan");
    }
}
