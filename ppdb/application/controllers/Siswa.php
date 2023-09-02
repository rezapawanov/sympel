<?php
defined('BASEPATH') or exit('No direct script access allowed');

class siswa extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('hak_akses') != "admin") {
            redirect(base_url());
        } else {
            $this->load->Model('Siswa_model');
        }
    }


    public function index()
    {
        $d['judul'] = "Data siswa";
        $d['siswa'] = $this->Siswa_model->siswa();
        $this->load->view('top', $d);
        $this->load->view('menu');
        $this->load->view('siswa/siswa');
        $this->load->view('bottom');
    }



    public function siswa_detail($id_ppdb)
    {   
        $d['judul'] = "Data Calon Siswa";
        $d['judul2'] = "Detail";
        $get = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
            $d['nama_sekolah'] = $get->nama_sekolah;
            $d['alamat_sekolah'] = $get->alamat;
            $d['website'] = $get->website;
        $get = $this->db->query("SELECT * FROM ppdb_siswa WHERE id_ppdb = '$id_ppdb'")->row();
        $d['id_ppdb'] = $get->id_ppdb;
        $d['no_pendaftaran'] = $get->no_pendaftaran;
        $d['jenis_pendaftaran'] = $get->jenis_pendaftaran;
        $d['jalur_pendaftaran'] = $get->jalur_pendaftaran;
        $d['hobi'] = $get->hobi;
        $d['cita_cita'] = $get->cita_cita;
        $d['nama_siswa'] = $get->nama_siswa;
        $d['jenis_kelamin'] = $get->jenis_kelamin;
        $d['nik'] = $get->nik;
        $d['tempat_lahir'] = $get->tempat_lahir;
        $d['tanggal_lahir'] = $get->tanggal_lahir;
        $d['agama'] = $get->agama;
        $d['alamat'] = $get->alamat;
        $d['rt'] = $get->rt;
        $d['rw'] = $get->rw;
        $d['dusun'] = $get->dusun;
        $d['kelurahan'] = $get->kelurahan;
        $d['kabupaten'] = $get->kabupaten;
        $d['kode_pos'] = $get->kode_pos;
        $d['tempat_tinggal'] = $get->tempat_tinggal;
        $d['transportasi'] = $get->transportasi;
        $d['no_hp'] = $get->no_hp;
        $d['email'] = $get->email;
        $d['kewarganegaraan'] = $get->kewarganegaraan;
        $d['foto'] = $get->foto;
        
        $d['tinggi_badan'] = $get->tinggi_badan;
        $d['berat_badan'] = $get->berat_badan;
        $d['jarak_ke_sekolah'] = $get->jarak_ke_sekolah;
        $d['waktu_tempuh_ke_sekolah'] = $get->waktu_tempuh_ke_sekolah;
        $d['jumlah_saudara'] = $get->jumlah_saudara;

        $d['asal_sekolah'] = $get->asal_sekolah;
        $d['alamat_sekolah_asal'] = $get->alamat_sekolah_asal;

        $d['nama_ayah'] = $get->nama_ayah;
        $d['tahun_lahir_ayah'] = $get->tahun_lahir_ayah;
        $d['pendidikan_ayah'] = $get->pendidikan_ayah;
        $d['pekerjaan_ayah'] = $get->pekerjaan_ayah;
        $d['penghasilan_ayah'] = $get->penghasilan_ayah;

        $d['nama_ibu'] = $get->nama_ibu;
        $d['tahun_lahir_ibu'] = $get->tahun_lahir_ibu;
        $d['pendidikan_ibu'] = $get->pendidikan_ibu;
        $d['pekerjaan_ibu'] = $get->pekerjaan_ibu;
        $d['penghasilan_ibu'] = $get->penghasilan_ibu;

        $d['nama_wali'] = $get->nama_wali;
        $d['tahun_lahir_wali'] = $get->tahun_lahir_wali;
        $d['pendidikan_wali'] = $get->pendidikan_wali;
        $d['pekerjaan_wali'] = $get->pekerjaan_wali;
        $d['penghasilan_wali'] = $get->penghasilan_wali;
        $d['status'] = $get->status;
        $this->load->view('top', $d);
        $this->load->view('menu');
        $this->load->view('siswa/siswa_detail');
        $this->load->view('bottom');
    }


    public function siswa_edit($id_siswa)
    {
        $cek = $this->db->query("SELECT id_siswa FROM siswa_display WHERE id_siswa = '$id_siswa'");
        if ($cek->num_rows() > 0) {
            $d['judul'] = "Data siswa";
            $d['judul2'] = "Ubah";
            $d['tipe'] = 'edit';
            $get = $this->siswa_model->siswa_edit($id_siswa);
            $data = $get->row();
            $d['nama_siswa'] = $data->nama_siswa;
            $d['tanggal_mulai'] = $data->tanggal_mulai;
            $d['tanggal_selesai'] = $data->tanggal_selesai;
            $d['id_siswa'] = $data->id_siswa;
            $this->load->view('top', $d);
            $this->load->view('menu');
            $this->load->view('siswa/siswa_tambah');
            $this->load->view('bottom');
        } else {
            $this->load->view('top');
            $this->load->view('menu');
            $this->load->view('404');
            $this->load->view('bottom');
        }
    }

    public function siswa_terima($id_ppdb)
    {
        $in['status'] = '1';
        $where['id_ppdb']     = $id_ppdb;
        $this->db->update("ppdb_siswa", $in, $where);
        echo '<script>
        alert("Update Status Calon Siswa Berhasil")
        document.location.href="' . base_url() . 'siswa/siswa_detail/'.$id_ppdb.'"
        </script>';
    }
    
    public function hapus_siswa($id)
    {
        $where['id_ppdb'] = $id;
        $this->db->delete("ppdb_siswa", $where);
        $this->session->set_flashdata("success", "Hapus Data Kelulusan Berhasil");
        redirect("siswa");  
    }
}
