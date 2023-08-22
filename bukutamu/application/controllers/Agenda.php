<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agenda extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('hak_akses') != "admin") {
            redirect(base_url());
        } else {
            $this->load->Model('Agenda_model');
        }
    }


    public function index()
    {
        $d['judul'] = "Data agenda";
        $d['agenda'] = $this->Agenda_model->agenda();
        $this->load->view('top', $d);
        $this->load->view('menu');
        $this->load->view('agenda/agenda');
        $this->load->view('bottom');
    }



    public function agenda_tambah()
    {
        $d['judul'] = "Data agenda";
        $d['judul2'] = "Tambah";
        $d['tipe'] = 'add';
        $d['nama_agenda'] = "";
        $d['tanggal_mulai'] = "";
        $d['tanggal_selesai'] = "";
        $d['id_agenda'] = "";
        $this->load->view('top', $d);
        $this->load->view('menu');
        $this->load->view('agenda/agenda_tambah');
        $this->load->view('bottom');
    }


    public function agenda_edit($id_agenda)
    {
        $cek = $this->db->query("SELECT id_agenda FROM agenda_display WHERE id_agenda = '$id_agenda'");
        if ($cek->num_rows() > 0) {
            $d['judul'] = "Data agenda";
            $d['judul2'] = "Ubah";
            $d['tipe'] = 'edit';
            $get = $this->Agenda_model->agenda_edit($id_agenda);
            $data = $get->row();
            $d['nama_agenda'] = $data->nama_agenda;
            $d['tanggal_mulai'] = $data->tanggal_mulai;
            $d['tanggal_selesai'] = $data->tanggal_selesai;
            $d['id_agenda'] = $data->id_agenda;
            $this->load->view('top', $d);
            $this->load->view('menu');
            $this->load->view('agenda/agenda_tambah');
            $this->load->view('bottom');
        } else {
            $this->load->view('top');
            $this->load->view('menu');
            $this->load->view('404');
            $this->load->view('bottom');
        }
    }

    public function agenda_save()
    {
        $tipe = $this->input->post("tipe");
        $in['nama_agenda'] = $this->input->post("nama_agenda");
        $in['tanggal_mulai'] = date("Y-m-d",strtotime($this->input->post("tanggal_mulai")));
        $in['tanggal_selesai'] = date("Y-m-d",strtotime($this->input->post("tanggal_selesai")));
        if ($tipe == "add") {
            $this->db->insert("agenda_display", $in);
            $this->session->set_flashdata("success", "Tambah Data Agenda Berhasil");
            redirect("agenda");
        } elseif ($tipe = 'edit') {
            $where['id_agenda']     = $this->input->post('id_agenda');
            $this->db->update("agenda_display", $in, $where);
            $this->session->set_flashdata("success", "Ubah Data Agenda Berhasil");
            redirect("agenda");
        } else {
            redirect(base_url());
        }
    }

    public function agenda_hapus($id)
    {
        $where['id_agenda'] = $id;
        $this->db->delete("agenda_display", $where);
        $this->session->set_flashdata("success", "Hapus Agenda Berhasil");
        redirect("agenda");
    }
}
