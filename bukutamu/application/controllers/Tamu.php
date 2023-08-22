<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tamu extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('hak_akses') != "admin") {
            redirect(base_url());
        } else {
            $this->load->Model('Tamu_model');
        }
    }


    public function index()
    {
        $d['judul'] = "Data Tamu";
        $d['tamu'] = $this->Tamu_model->tamu();
        $this->load->view('top', $d);
        $this->load->view('menu');
        $this->load->view('tamu/tamu');
        $this->load->view('bottom');
    }



    public function tamu_tambah()
    {
        $d['judul'] = "Data Tamu";
        $d['judul2'] = "Tambah";
        $d['tipe'] = 'add';
        $d['nama_tamu'] = "";
        $d['asal'] = "";
        $d['alamat'] = "";
        $d['keperluan'] = "";
        $d['no_telepon'] = "";
        $d['id_tamu'] = "";
        $this->load->view('top', $d);
        $this->load->view('menu');
        $this->load->view('tamu/tamu_tambah');
        $this->load->view('bottom');
    }


    public function tamu_edit($id_tamu)
    {
        $cek = $this->db->query("SELECT id_tamu FROM bukutamu WHERE id_tamu = '$id_tamu'");
        if ($cek->num_rows() > 0) {
            $d['judul'] = "Data Tamu";
            $d['judul2'] = "Ubah";
            $d['tipe'] = 'edit';
            $get = $this->Tamu_model->tamu_edit($id_tamu);
            $data = $get->row();
            $d['nama_tamu'] = $data->nama_tamu;
            $d['asal'] = $data->asal;
            $d['alamat'] = $data->alamat;
            $d['keperluan'] = $data->keperluan;
            $d['no_telepon'] = $data->no_telepon;
            $d['id_tamu'] = $data->id_tamu;
            $this->load->view('top', $d);
            $this->load->view('menu');
            $this->load->view('tamu/tamu_tambah');
            $this->load->view('bottom');
        } else {
            $this->load->view('top');
            $this->load->view('menu');
            $this->load->view('404');
            $this->load->view('bottom');
        }
    }

    public function tamu_save()
    {
        $tipe = $this->input->post("tipe");
        $in['nama_tamu'] = $this->input->post("nama_tamu");
        $in['asal'] = $this->input->post("asal");
        $in['alamat'] = $this->input->post("alamat");
        $in['keperluan'] = $this->input->post("keperluan");
        $in['no_telepon'] = $this->input->post("no_telepon");

        if ($tipe == "add") {
            $this->db->insert("bukutamu", $in);
            $this->session->set_flashdata("success", "Tambah Data Buku Tamu Berhasil");
            redirect("tamu");
        } elseif ($tipe = 'edit') {
            $where['id_tamu']     = $this->input->post('id_tamu');
            $this->db->update("bukutamu", $in, $where);
            $this->session->set_flashdata("success", "Ubah Data Buku Tamu Berhasil");
            redirect("tamu");
        } else {
            redirect(base_url());
        }
    }


    public function tamu_hapus($id)
    {
        $where['id_tamu'] = $id;
        $this->db->delete("bukutamu", $where);
        $this->session->set_flashdata("success", "Hapus Buku Tamu Berhasil");
        redirect("tamu");
    }
}
