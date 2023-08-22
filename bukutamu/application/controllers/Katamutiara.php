<?php
defined('BASEPATH') or exit('No direct script access allowed');

class katamutiara extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('hak_akses') != "admin") {
            redirect(base_url());
        } else {
            $this->load->Model('katamutiara_model');
        }
    }


    public function index()
    {
        $d['judul'] = "Data Kata Mutiara";
        $d['katamutiara'] = $this->katamutiara_model->katamutiara();
        $this->load->view('top', $d);
        $this->load->view('menu');
        $this->load->view('katamutiara/katamutiara');
        $this->load->view('bottom');
    }



    public function katamutiara_tambah()
    {
        $d['judul'] = "Data Kata Mutiara";
        $d['judul2'] = "Tambah";
        $d['tipe'] = 'add';
        $d['kata'] = "";
        $d['penemu'] = "";
        $d['id_katamutiara'] = "";
        $this->load->view('top', $d);
        $this->load->view('menu');
        $this->load->view('katamutiara/katamutiara_tambah');
        $this->load->view('bottom');
    }


    public function katamutiara_edit($id_katamutiara)
    {
        $cek = $this->db->query("SELECT id_katamutiara FROM katamutiara WHERE id_katamutiara = '$id_katamutiara'");
        if ($cek->num_rows() > 0) {
            $d['judul'] = "Data Kata Mutiara";
            $d['judul2'] = "Ubah";
            $d['tipe'] = 'edit';
            $get = $this->katamutiara_model->katamutiara_edit($id_katamutiara);
            $data = $get->row();
            $d['kata'] = $data->kata;
            $d['penemu'] = $data->penemu;
            $d['id_katamutiara'] = $data->id_katamutiara;
            $this->load->view('top', $d);
            $this->load->view('menu');
            $this->load->view('katamutiara/katamutiara_tambah');
            $this->load->view('bottom');
        } else {
            $this->load->view('top');
            $this->load->view('menu');
            $this->load->view('404');
            $this->load->view('bottom');
        }
    }

    public function katamutiara_save()
    {
        $tipe = $this->input->post("tipe");
        $in['kata'] = $this->input->post("kata");
        $in['penemu'] = $this->input->post("penemu");
        if ($tipe == "add") {
            $this->db->insert("katamutiara", $in);
            $this->session->set_flashdata("success", "Tambah Data Kata Mutiara Berhasil");
            redirect("katamutiara");
        } elseif ($tipe = 'edit') {
            $where['id_katamutiara']     = $this->input->post('id_katamutiara');
            $this->db->update("katamutiara", $in, $where);
            $this->session->set_flashdata("success", "Ubah Data Kata Mutiara Berhasil");
            redirect("katamutiara");
        } else {
            redirect(base_url());
        }
    }

    public function katamutiara_hapus($id)
    {
        $where['id_katamutiara'] = $id;
        $this->db->delete("katamutiara", $where);
        $this->session->set_flashdata("success", "Hapus katamutiara Berhasil");
        redirect("katamutiara");
    }
}
