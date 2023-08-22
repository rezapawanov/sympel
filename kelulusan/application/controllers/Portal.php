<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Portal extends CI_Controller
{

    public function index()
    {
        $sekolah = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
        $pengaturan = $this->db->query("SELECT * FROM pengaturan_kelulusan WHERE id = 1")->row();
        $d['nama_sekolah'] = $sekolah->nama_sekolah;
        $d['tanggal_pengumuman'] = $pengaturan->tanggal_pengumuman;
        $d['tahun'] = $pengaturan->tahun;
        $d['informasi_kelulusan'] = $pengaturan->informasi_kelulusan;
        $d['informasi_lain'] = $pengaturan->informasi_lain;
        

        $this->load->view('front/portal',$d);
    }
}
