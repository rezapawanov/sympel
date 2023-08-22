<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portal extends CI_Controller {


	public function index()
	{
        $d['agenda'] = $this->db->query("SELECT * FROM agenda_display ORDER BY id_agenda DESC");
        $jadwal_sholat = $this->db->query("SELECT * FROM jadwal_sholat WHERE id = 1")->row();
        $sekolah = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
        
        $katamutiara = $this->db->query("SELECT * FROM katamutiara ORDER BY id_katamutiara DESC LIMIT 1")->row();
        
        $d['subuh'] = $jadwal_sholat->subuh;
        $d['dzuhur'] = $jadwal_sholat->dzuhur;
        $d['ashar'] = $jadwal_sholat->ashar;
        $d['magrib'] = $jadwal_sholat->magrib;
        $d['isya'] = $jadwal_sholat->isya;

        $d['nama_sekolah'] = $sekolah->nama_sekolah;
        $d['logo'] = $sekolah->logo;
        $d['alamat'] = $sekolah->alamat;
        $d['kata'] = $katamutiara->kata;
        $d['penemu'] = $katamutiara->penemu;
        
		$this->load->view('portal',$d);
	}

    
    public function tamu_save()
    {
        $in['nama_tamu'] = $this->input->post("nama_tamu");
        $in['asal'] = $this->input->post("asal");
        $in['alamat'] = $this->input->post("alamat");
        $in['keperluan'] = $this->input->post("keperluan");
        $in['no_telepon'] = $this->input->post("no_telepon");

        $this->db->insert("bukutamu", $in);
        $this->session->set_flashdata("success", "Data Berhasil Disimpan");
        redirect("portal");
    }
}
