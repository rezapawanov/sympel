<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class siswa extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->Model('Laporan_model');
		$this->load->Model('Combo_model');
	}


	public function index() {
		redirect(base_url());
	}

	public function proses_tampil_siswa() {
		$id_kelas = $this->input->post("id_kelas");
		redirect("siswa/siswa/".$id_kelas);
	}

	public function siswa($id_kelas="") {
		$d['judul'] = "Data Siswa";
		if(!empty($id_kelas)) {
			$d['siswa'] = $this->Laporan_model->siswa($id_kelas);
		} else {
			$d['siswa'] = "";
		}
		$d['combo_kelas'] = $this->Combo_model->combo_kelas($id_kelas);
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('siswa/siswa');
		$this->load->view('bottom');	
	}

	public function siswa_detail($nis) {
		$d['judul'] = "Data Siswa";
		$d['judul2'] = "Detail";
		$get = $this->Laporan_model->siswa_detail($nis);
		if($get->num_rows() == 0) {
			$this->load->view('top',$d);
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
			
			$get = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
			$d['namasekolah'] = $get->nama_sekolah;
			$d['alamatsekolah'] = $get->alamat;
			$d['website'] = $get->website;
			
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('siswa/siswa_detail');
			$this->load->view('bottom');	
		}
	}

	public function siswa_tambah()
	{
		$d['judul'] = "Data Siswa";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['combo_kelas'] = $this->Combo_model->combo_kelas();
		$d['nis'] = "";
		$d['nisn'] = "";
		$d['nama_siswa'] = "";
		$d['jenis_kelamin'] = "";
		$d['tanggal_lahir'] = "";
		$d['tempat_lahir'] = "";
		$d['alamat_jalan'] = "";
		$d['kelurahan'] = "";
		$d['kecamatan'] = "";
		$d['hp'] = "";
		$d['telepon'] = "";
		$d['email'] = "";
		$d['agama'] = "";
		$d['angkatan'] = "";
		$d['foto'] = "";
		$d['id_siswa'] = "";
		$d['aktif_siswa'] = "";

		$d['nama_ayah'] = "";
		$d['pendidikan_ayah'] = "";
		$d['pekerjaan_ayah'] = "";
		$d['no_hp_ayah'] = "";

		$d['nama_ibu'] = "";
		$d['pendidikan_ibu'] = "";
		$d['pekerjaan_ibu'] = "";
		$d['no_hp_ibu'] = "";

		$d['nama_wali'] = "";
		$d['pendidikan_wali'] = "";
		$d['pekerjaan_wali'] = "";
		$d['no_hp_wali'] = "";

		$d['nama_sekolah'] = "";
		$d['status_sekolah'] = "";
		$d['alamat_sekolah'] = "";
		$d['tahun_lulus'] = "";

		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('siswa/siswa_tambah');
		$this->load->view('bottom');
	}

	public function siswa_save()
	{
		$tipe = $this->input->post("tipe");
		$in['nis'] = $this->input->post("nis");
		$in['nisn'] = $this->input->post("nisn");
		$in['nama_siswa'] = $this->input->post("nama_siswa");
		$in['jenis_kelamin'] = $this->input->post("jenis_kelamin");
		$in['tanggal_lahir'] = date("Y-m-d", strtotime($this->input->post("tanggal_lahir")));
		$in['tempat_lahir'] = $this->input->post("tempat_lahir");
		$in['alamat_jalan'] = $this->input->post("alamat_jalan");
		$in['kelurahan'] = $this->input->post("kelurahan");
		$in['kecamatan'] = $this->input->post("kecamatan");
		$in['hp'] = $this->input->post("hp");
		$in['telepon'] = $this->input->post("telepon");
		$in['email'] = $this->input->post("email");
		$in['agama'] = $this->input->post("agama");
		$in['angkatan'] = $this->input->post("angkatan");
		$in['id_kelas'] = $this->input->post("id_kelas");
		$in['password'] = $this->input->post("nis");

		$in['nama_ayah'] = $this->input->post("nama_ayah");
		$in['pendidikan_ayah'] = $this->input->post("pendidikan_ayah");
		$in['pekerjaan_ayah'] = $this->input->post("pekerjaan_ayah");
		$in['no_hp_ayah'] = $this->input->post("no_hp_ayah");;

		$in['nama_ibu'] = $this->input->post("nama_ibu");
		$in['pendidikan_ibu'] = $this->input->post("pendidikan_ibu");;
		$in['pekerjaan_ibu'] = $this->input->post("pekerjaan_ibu");
		$in['no_hp_ibu'] = $this->input->post("no_hp_ibu");

		$in['nama_wali'] = $this->input->post("nama_wali");
		$in['pendidikan_wali'] = $this->input->post("pendidikan_wali");
		$in['pekerjaan_wali'] = $this->input->post("pekerjaan_wali");
		$in['no_hp_wali'] = $this->input->post("no_hp_wali");

		$in['nama_sekolah'] = $this->input->post("nama_sekolah");
		$in['status_sekolah'] = $this->input->post("status_sekolah");
		$in['alamat_sekolah'] = $this->input->post("alamat_sekolah");
		$in['tahun_lulus'] = $this->input->post("tahun_lulus");


		$config['upload_path'] = './upload/siswa';
		$config['allowed_types'] = 'jpg|png';
		$config['encrypt_name']	= TRUE;
		$config['remove_spaces']	= TRUE;
		$config['max_size']     = '0';
		$config['max_width']  	= '0';
		$config['max_height']  	= '0';

		$this->load->library('upload', $config);


		if ($tipe == "add") {
			$cek = $this->db->query("SELECT nis FROM mst_siswa WHERE nis = '$in[nis]'");
			$cek2 = $this->db->query("SELECT nisn FROM mst_siswa WHERE nisn = '$in[nisn]'");
			if ($cek->num_rows() > 0) {
				$this->session->set_flashdata("error", "Gagal Input. NIS Sudah Digunakan");
				redirect("siswa/siswa_tambah/");
			} else if ($cek2->num_rows() > 0 && !empty($in['nisn'])) {
				$this->session->set_flashdata("error", "Gagal Input. NISN Sudah Digunakan");
				redirect("siswa/siswa_tambah/");
			} else {
				if (!empty($_FILES['foto']['name'])) {
					if ($this->upload->do_upload("foto")) {
						$data	 	= $this->upload->data();
						$in['foto'] = $data['file_name'];
						$this->db->insert("mst_siswa", $in);
						$this->session->set_flashdata("success", "Tambah Data Siswa Berhasil");
						redirect("siswa/siswa_detail/" . $this->input->post("nis"));
					} else {
						$this->session->set_flashdata("error", $this->upload->display_errors());
						redirect("siswa/siswa_tambah/");
					}
				} else {
					$this->db->insert("mst_siswa", $in);
					$this->session->set_flashdata("success", "Tambah Data Siswa Berhasil");
					redirect("siswa/siswa_detail/" . $this->input->post("nis"));
				}
			}
		} elseif ($tipe = 'edit') {
			$where['id_siswa'] 	= $this->input->post('id_siswa');
			$cek = $this->db->query("SELECT nisn FROM mst_siswa WHERE nisn = '$in[nisn]' AND id_siswa != '$where[id_siswa]'");
			$cek2 = $this->db->query("SELECT nisn FROM mst_siswa WHERE nis = '$in[nis]' AND id_siswa != '$where[id_siswa]'");
			if ($cek->num_rows() > 0) {
				$this->session->set_flashdata("error", "Gagal Input.  nisn Sudah Digunakan");
				redirect("siswa/siswa_edit/" . $this->input->post("id_siswa"));
			} else if ($cek2->num_rows() > 0) {
				$this->session->set_flashdata("error", "Gagal Input. nis Sudah Digunakan");
				redirect("siswa/siswa_edit/" . $this->input->post("id_siswa"));
			} else {
				if (!empty($_FILES['foto']['name'])) {
					if ($this->upload->do_upload("foto")) {
						$data	 	= $this->upload->data();
						$in['foto'] = $data['file_name'];
						$in['aktif_siswa'] = $this->input->post("aktif_siswa");
						$where['id_siswa'] 	= $this->input->post('id_siswa');
						$this->db->update("mst_siswa", $in, $where);
						@unlink("./upload/siswa/" . $this->input->post("foto_lama"));
						$this->session->set_flashdata("success", "Ubah Data Siswa Berhasil");
						redirect("siswa/siswa_detail/" . $this->input->post("nis"));
					}
				} else {
					$in['aktif_siswa'] = $this->input->post("aktif_siswa");
					$this->db->update("mst_siswa", $in, $where);
					$this->session->set_flashdata("success", "Ubah Data Siswa Berhasil");
					redirect("siswa/siswa_detail/" . $this->input->post("nis"));
				}
			}
		} else {
			redirect(base_url());
		}
	}
}