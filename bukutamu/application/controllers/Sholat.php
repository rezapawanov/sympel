<?php
defined('BASEPATH') or exit('No direct script access allowed');

class sholat extends CI_Controller
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
        $d['judul'] = "Jadwal Sholat";
        $d['judul2'] = "Ubah";
        $data = $this->db->query("SELECT * FROM jadwal_sholat WHERE id = 1")->row();
        $d['subuh'] = $data->subuh;
        $d['dzuhur'] = $data->dzuhur;
        $d['ashar'] = $data->magrib;
        $d['magrib'] = $data->magrib;
        $d['isya'] = $data->isya;
        $this->load->view('top', $d);
        $this->load->view('menu');
        $this->load->view('sholat/sholat');
        $this->load->view('bottom');
    }

    public function sholat_save()
    {
        $in['subuh'] = $this->input->post("subuh");
        $in['dzuhur'] = $this->input->post("dzuhur");
        $in['ashar'] = $this->input->post("ashar");
        $in['magrib'] = $this->input->post("magrib");
        $in['isya'] = $this->input->post("isya");

        $where['id']     = 1;
        $this->db->update("jadwal_sholat", $in, $where);
        $this->session->set_flashdata("success", "Ubah Jadal Sholat Berhasil");
        redirect("sholat");
    }
}
