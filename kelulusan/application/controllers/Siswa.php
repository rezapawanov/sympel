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


    public function kelulusan_import()
	{
		if ($this->session->userdata('hak_akses') != "") {
			$unggah['upload_path']   = './upload/';
			$unggah['allowed_types'] = 'xlsx';
			$unggah['file_name']     = 'kelulusan_import';
			$unggah['overwrite']     = true;
			$unggah['max_size']      = 5120;

			$this->upload->initialize($unggah);
			if ($this->upload->do_upload('file_import')) {
				$file_excel = new unggahexcel('upload/kelulusan_import.xlsx', null);

				if (count($file_excel->Sheets()) == 1) {
					$baris = 1;

					foreach ($file_excel as $kolom) {
						if ($baris >= 2) {
							$in['no_ujian'] = $kolom[0];
                            $in['nama_siswa'] = $kolom[1];
                            $in['jurusan'] = $kolom[2];
                            $in['nilai_indo'] = $kolom[3];
                            $in['nilai_mtk'] = $kolom[4];
                            $in['nilai_eng'] = $kolom[5];
                            $in['nilai_kejurusan'] = $kolom[6];
                            $in['status'] = $kolom[7];
							$this->db->insert("kelulusan_siswa", $in);
						}
						$baris++;
					}

					$this->session->set_flashdata("success", "Berhasil Import Data Kelulusan Siswa");
				} else {
					$this->session->set_flashdata("error", "Gagal Import Data Kelulusan Siswa");
				}
			} else {
				$this->session->set_flashdata("error", $this->upload->display_errors());
			}
			unlink('./upload/kelulusan_import.xlsx');
			redirect("siswa");
		} else {
			redirect(base_url());
		}
    }
    
    public function hapus($id)
    {
        $where['id_kelulusan'] = $id;
        $this->db->delete("kelulusan_siswa", $where);
        $this->session->set_flashdata("success", "Hapus Data Kelulusan Berhasil");
        redirect("siswa");	
    }
}
