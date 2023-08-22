<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Portal extends CI_Controller
{

    public function index()
    {
        $sekolah = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
        $d['nama_sekolah'] = $sekolah->nama_sekolah;
        $this->load->view('front/top',$d);
        $this->load->view('front/formulir');
        $this->load->view('front/sidebar');
        $this->load->view('front/bottom');
    }

    public function formulir()
    {
        $sekolah = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
        $d['nama_sekolah'] = $sekolah->nama_sekolah;
        $this->load->view('front/top',$d);
        $this->load->view('front/formulir');
        $this->load->view('front/sidebar');
        $this->load->view('front/bottom');
    }

    public function pengumuman($no_ujian = "")
    {
        $cek = $this->db->query("SELECT * FROM ppdb_pengaturan WHERE id = 1")->row();
        if($cek->pengumuman == 0) {
            $d['buka'] = false;
        } else {
            $d['buka'] = true;
        }
        $d['no_ujian'] = $no_ujian;
        $this->load->view('front/top');
        $this->load->view('front/pengumuman', $d);
        $this->load->view('front/sidebar');
        $this->load->view('front/bottom');
    }

    public function cetakformulir($no_pendaftaran = "")
    {
        $d['no_pendaftaran'] = $no_pendaftaran;
        $this->load->view('front/top');
        $this->load->view('front/cetakformulir', $d);
        $this->load->view('front/sidebar');
        $this->load->view('front/bottom');
    }

    public function prosedur()
    {
        $get = $this->db->query("SELECT * FROM ppdb_pengaturan WHERE id = '1'")->row();
        $d['prosedur'] = $get->prosedur;
        $this->load->view('front/top', $d);
        $this->load->view('front/prosedur');
        $this->load->view('front/sidebar');
        $this->load->view('front/bottom');
    }

    public function tentang()
    {
        $get = $this->db->query("SELECT * FROM ppdb_pengaturan WHERE id = '1'")->row();
        $d['tentang'] = $get->tentang;
        $this->load->view('front/top', $d);
        $this->load->view('front/tentang');
        $this->load->view('front/sidebar');
        $this->load->view('front/bottom');
    }

    public function cek_pengumuman()
    {
        redirect("portal/pengumuman/" . $this->input->post("no_ujian"));
    }

    public function cetak_formulir()
    {
        redirect("portal/cetak/" . $this->input->post("no_pendaftaran"));
    }

    public function formulir_save()
    {
        $date = date('Ymd');
        $header = $date . '.';
        $get_no = $this->db->query("SELECT MAX(no_pendaftaran) AS kode FROM ppdb_siswa WHERE no_pendaftaran LIKE '%$header%'")->row();
        $no_akhir = $get_no->kode;
        $in['no_pendaftaran'] = buatkode($no_akhir, 'PPDB.' . $date . '.', 3);

        $in['jenis_pendaftaran'] = $this->input->post("jenis_pendaftaran");
        $in['jalur_pendaftaran'] = $this->input->post("jalur_pendaftaran");
        $in['hobi'] = $this->input->post("hobi");
        $in['cita_cita'] = $this->input->post("cita_cita");

        $in['nama_siswa'] = $this->input->post("nama_siswa");
        $in['jenis_kelamin'] = $this->input->post("jenis_kelamin");
        $in['nik'] = $this->input->post("nik");
        $in['tempat_lahir'] = $this->input->post("tempat_lahir");
        $in['tanggal_lahir'] = $this->input->post("tanggal_lahir");
        $in['agama'] = $this->input->post("agama");
        $in['alamat'] = $this->input->post("alamat");
        $in['rt'] = $this->input->post("rt");
        $in['rw'] = $this->input->post("rw");
        $in['dusun'] = $this->input->post("dusun");
        $in['kelurahan'] = $this->input->post("kelurahan");
        $in['kabupaten'] = $this->input->post("kabupaten");
        $in['kode_pos'] = $this->input->post("kode_pos");
        $in['tempat_tinggal'] = $this->input->post("tempat_tinggal");
        $in['transportasi'] = $this->input->post("transportasi");
        $in['no_hp'] = $this->input->post("no_hp");
        $in['email'] = $this->input->post("email");
        $in['kewarganegaraan'] = $this->input->post("kewarganegaraan");

        $in['tinggi_badan'] = $this->input->post("tinggi_badan");
        $in['berat_badan'] = $this->input->post("berat_badan");
        $in['jarak_ke_sekolah'] = $this->input->post("jarak_ke_sekolah");
        $in['waktu_tempuh_ke_sekolah'] = $this->input->post("waktu_tempuh_ke_sekolah");
        $in['jumlah_saudara'] = $this->input->post("jumlah_saudara");

        $in['asal_sekolah'] = $this->input->post("asal_sekolah");
        $in['alamat_sekolah_asal'] = $this->input->post("alamat_sekolah_asal");

        $in['nama_ayah'] = $this->input->post("nama_ayah");
        $in['tahun_lahir_ayah'] = $this->input->post("tahun_lahir_ayah");
        $in['pendidikan_ayah'] = $this->input->post("pendidikan_ayah");
        $in['pekerjaan_ayah'] = $this->input->post("pekerjaan_ayah");
        $in['penghasilan_ayah'] = $this->input->post("penghasilan_ayah");

        $in['nama_ibu'] = $this->input->post("nama_ibu");
        $in['tahun_lahir_ibu'] = $this->input->post("tahun_lahir_ibu");
        $in['pendidikan_ibu'] = $this->input->post("pendidikan_ibu");
        $in['pekerjaan_ibu'] = $this->input->post("pekerjaan_ibu");
        $in['penghasilan_ibu'] = $this->input->post("penghasilan_ibu");

        $in['nama_wali'] = $this->input->post("nama_wali");
        $in['tahun_lahir_wali'] = $this->input->post("tahun_lahir_wali");
        $in['pendidikan_wali'] = $this->input->post("pendidikan_wali");
        $in['pekerjaan_wali'] = $this->input->post("pekerjaan_wali");
        $in['penghasilan_wali'] = $this->input->post("penghasilan_wali");


        $config['upload_path'] = './upload';
        $config['allowed_types'] = 'jpg|png';
        $config['encrypt_name']    = TRUE;
        $config['remove_spaces']    = TRUE;
        $config['max_size']     = '5000';
        $config['max_width']      = '0';
        $config['max_height']      = '0';

        $this->load->library('upload', $config);

        if (!empty($_FILES['foto']['name'])) {
            if ($this->upload->do_upload("foto")) {
                $data         = $this->upload->data();
                $in['foto'] = $data['file_name'];
                $this->db->insert("ppdb_siswa", $in);
                $this->session->set_flashdata("success", "Berhasil melakukan pendaftaran");
                redirect("portal/cetak/". $in['no_pendaftaran']);
            } else {
                $this->session->set_flashdata("error", "' . $this->upload->display_errors() . '");
                redirect("portal/formulir'");
            }
        } else {
            $this->session->set_flashdata("error", "' . $this->upload->display_errors() . '");
            redirect("portal/formulir'");
        }
    }

    public function cetak($no_pendaftaran)
    {
        $cek = $this->db->query("SELECT * FROM ppdb_siswa WHERE no_pendaftaran = '$no_pendaftaran'");
        if ($cek->num_rows() > 0) {
            $get = $cek->row();

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
            $this->load->view('front/top', $d);
            $this->load->view('front/cetak');
            $this->load->view('front/bottom');
        } else {
            $this->session->set_flashdata("error", "No Pendaftaran Tidak Ditemukan");
            redirect("portal");
        }
    }

    public function download($no_pendaftaran = "")
    {
        $sekolah = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
        $cek = $this->db->query("SELECT * FROM ppdb_siswa WHERE no_pendaftaran = '$no_pendaftaran'");
        if ($cek->num_rows() > 0) {
            $get = $cek->row();
            $d['nama_sekolah'] = $sekolah->nama_sekolah;
            $d['logo'] = $sekolah->logo;
            $d['alamat_sekolah'] = $sekolah->alamat.', '.$sekolah->kodepos;
            $d['kontak_sekolah'] = 'Telp.'.$sekolah->no_telepon.' | Email:  '.$sekolah->email.' | Website: '.$sekolah->website;
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
            $d['foto'] = $get->foto;
            $this->load->library('pdf');

            $this->pdf->setPaper('legal', 'potrait');
            $this->pdf->filename = "pendaftaran-$no_pendaftaran.pdf";
            $this->pdf->load_view('front/pdf', $d);
        } else {
            $this->session->set_flashdata("error", "No Pendaftaran Tidak Ditemukan");
            redirect("portal");
        }
    }
}
