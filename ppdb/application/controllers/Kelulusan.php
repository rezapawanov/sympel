<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kelulusan extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('hak_akses') != "admin") {
            redirect(base_url());
        } else {
            $this->load->Model('Kelulusan_model');
        }
    }


    public function index()
    {
        $d['judul'] = "Data Pengumuman";
        $d['kelulusan'] = $this->Kelulusan_model->kelulusan();
        $this->load->view('top', $d);
        $this->load->view('menu');
        $this->load->view('kelulusan/kelulusan');
        $this->load->view('bottom');
    }


    public function kelulusan_import()
	{
		if ($this->session->userdata('hak_akses') != "") {
			$unggah['upload_path']   = './upload/';
			$unggah['allowed_types'] = 'xlsx';
			$unggah['file_name']     = 'kelulusan_import';
			$unggah['overwrite']     = true;
			$unggah['max_size']      = 5120;
            $this->load->library('upload', $unggah);
			if ($this->upload->do_upload('file_import')) {
				$file_excel = new unggahexcel('upload/kelulusan_import.xlsx', null);

				if (count($file_excel->Sheets()) == 1) {
					$baris = 1;

					foreach ($file_excel as $kolom) {
						if ($baris >= 2) {
							$in['no_ujian'] = $kolom[0];
                            $in['nama_siswa'] = $kolom[1];
                            $in['nilai_tpa'] = $kolom[2];
                            $in['nilai_tpd'] = $kolom[3];
                            $in['keterangan'] = $kolom[4];
							$this->db->insert("ppdb_kelulusan", $in);
						}
						$baris++;
					}

					$this->session->set_flashdata("success", "Berhasil Import Data Kelulusan kelulusan");
				} else {
					$this->session->set_flashdata("error", "Gagal Import Data Kelulusan kelulusan");
				}
			} else {
				$this->session->set_flashdata("error", $this->upload->display_errors());
			}
			unlink('./upload/kelulusan_import.xlsx');
			redirect("kelulusan");
		} else {
			redirect(base_url());
		}
    }
    
    public function hapus($id)
    {
        $where['id_kelulusan'] = $id;
        $this->db->delete("ppdb_kelulusan", $where);
        $this->session->set_flashdata("success", "Hapus Data Kelulusan Berhasil");
        redirect("kelulusan");	
    }
}
