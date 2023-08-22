<?php
defined('BASEPATH') or exit('No direct script access allowed');

class siswa extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('hak_akses') != "admin" && $this->session->userdata('hak_akses') != "guru" && $this->session->userdata('hak_akses') != "gurubk") {
            redirect(base_url());
        } else {
            $this->load->Model('Laporan_model');
            $this->load->Model('Combo_model');
        }
    }


    public function index()
    {
        redirect(base_url());
    }

    public function proses_tampil_siswa()
    {
        $id_kelas = $this->input->post("id_kelas");
        redirect("siswa/siswa/" . $id_kelas);
    }

    public function siswa($id_kelas = "")
    {
        $d['judul'] = "Data Siswa";
        if (!empty($id_kelas)) {
            $d['siswa'] = $this->Laporan_model->siswa($id_kelas);
        } else {
            $d['siswa'] = "";
        }
        $d['combo_kelas'] = $this->Combo_model->combo_kelas($id_kelas);
        $this->load->view('top', $d);
        $this->load->view('menu');
        $this->load->view('siswa/siswa');
        $this->load->view('bottom');
    }

    public function siswa_detail($nis)
    {
        $d['judul'] = "Data Siswa";
        $d['judul2'] = "Detail";
        $get = $this->Laporan_model->siswa_detail($nis);
        if ($get->num_rows() == 0) {
            $this->load->view('top', $d);
            $this->load->view('menu');
            $this->load->view('404');
            $this->load->view('bottom');
        } else {
            $data = $get->row();
            $d['id_kelas'] = $data->id_kelas;
            $d['nis'] = $data->nis;
            $d['nisn'] = $data->nisn;
            $d['nama_siswa'] = $data->nama_siswa;
            $d['jenis_kelamin'] = $data->jenis_kelamin;
            if (!empty($data->tanggal_lahir)) {
                $d['tanggal_lahir'] = date("d-m-Y", strtotime($data->tanggal_lahir));
            } else {
                $d['tanggal_lahir'] = '';
            }
            $d['tempat_lahir'] = $data->tempat_lahir;
            $d['alamat_jalan'] = $data->alamat_jalan;
            $d['kelurahan'] = $data->kelurahan;
            $d['kecamatan'] = $data->kecamatan;
            $d['hp'] = $data->hp;
            $d['telepon'] = $data->telepon;
            $d['email'] = $data->email;
            $d['agama'] = $data->agama;
            $d['angkatan'] = $data->angkatan;
            $d['foto'] = $data->foto;
            $d['nama_kelas'] = $data->nama_kelas;
            $d['id_siswa'] = $data->id_siswa;
            $d['aktif_siswa'] = $data->aktif_siswa;

            $d['nama_ayah'] = $data->nama_ayah;
            $d['pendidikan_ayah'] = $data->pendidikan_ayah;
            $d['pekerjaan_ayah'] = $data->pekerjaan_ayah;
            $d['no_hp_ayah'] = $data->no_hp_ayah;

            $d['nama_ibu'] = $data->nama_ibu;
            $d['pendidikan_ibu'] = $data->pendidikan_ibu;
            $d['pekerjaan_ibu'] = $data->pekerjaan_ibu;
            $d['no_hp_ibu'] = $data->no_hp_ibu;

            $d['nama_wali'] = $data->nama_wali;
            $d['pendidikan_wali'] = $data->pendidikan_wali;
            $d['pekerjaan_wali'] = $data->pekerjaan_wali;
            $d['no_hp_wali'] = $data->no_hp_wali;

            $d['nama_sekolah'] = $data->nama_sekolah;
            $d['status_sekolah'] = $data->status_sekolah;
            $d['alamat_sekolah'] = $data->alamat_sekolah;
            $d['tahun_lulus'] = $data->tahun_lulus;
            $this->load->view('top', $d);
            $this->load->view('menu');
            $this->load->view('siswa/siswa_detail');
            $this->load->view('bottom');
        }
    }
}
