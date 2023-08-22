<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {


	public function __construct(){
		parent::__construct();
		if($this->session->userdata('hak_akses') != "admin") { 
			redirect(base_url());
		} else {
			$this->load->Model('Pengguna_model');
			$this->load->Model('Combo_model');
		}
	}


	public function index() {
		redirect(base_url());
	}


	public function guru() {
		$d['judul'] = "Data Guru";
		$d['guru'] = $this->Pengguna_model->guru();
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('guru/guru');
		$this->load->view('bottom');	
	}

	public function guru_detail($nip) {
		$d['judul'] = "Data Guru";
		$d['judul2'] = "Detail";
		$get = $this->Pengguna_model->guru_detail($nip);
		if($get->num_rows() == 0) {
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		} else { 
			$data = $get->row();
			$d['nip'] = $data->nip;
			$d['nuptk'] = $data->nuptk;
			$d['nik'] = $data->nik;
			$d['nama_guru'] = $data->nama_guru;
			$d['jenis_kelamin'] = $data->jenis_kelamin;
			$d['tanggal_lahir'] = date("d-m-Y",strtotime($data->tanggal_lahir));
			$d['tempat_lahir'] = $data->tempat_lahir;
			$d['alamat_jalan'] = $data->alamat_jalan;
			$d['kelurahan'] = $data->kelurahan;
			$d['kecamatan'] = $data->kecamatan;
			$d['hp'] = $data->hp;
			$d['telepon'] = $data->telepon;
			$d['email'] = $data->email;
			$d['agama'] = $data->agama;
			$d['kewarganegaraan'] = $data->kewarganegaraan;
			$d['foto'] = $data->foto;
			$d['id_jabatan'] = $data->id_jabatan;
			$d['id_guru'] = $data->id_guru;
			$d['aktif_guru'] = $data->aktif_guru;
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('guru/guru_detail');
			$this->load->view('bottom');	
		}
	}

	public function guru_tambah() {
		$d['judul'] = "Data Guru";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['combo_jabatan'] = $this->Combo_model->combo_jabatan_guru();
		$d['nip'] = "";
		$d['nuptk'] = "";
		$d['nik'] = "";
		$d['nama_guru'] = "";
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
		$d['kewarganegaraan'] = "";
		$d['foto'] = "";
		$d['id_guru'] = "";
		$d['aktif_guru'] = "";
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('guru/guru_tambah');
		$this->load->view('bottom');
		
	}


	public function guru_edit($id_guru) {
		$cek = $this->db->query("SELECT id_guru FROM mst_guru WHERE id_guru = '$id_guru'");
		if($cek->num_rows() > 0) { 
			$d['judul'] = "Data Guru";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$get = $this->Pengguna_model->guru_edit($id_guru);
			$data = $get->row();
			$d['nip'] = $data->nip;
			$d['nuptk'] = $data->nuptk;
			$d['nik'] = $data->nik;
			$d['nama_guru'] = $data->nama_guru;
			$d['jenis_kelamin'] = $data->jenis_kelamin;
			if(!empty($data->tanggal_lahir) && $data->tanggal_lahir != '0000-00-00') {
				$d['tanggal_lahir'] = date("d-m-Y",strtotime($data->tanggal_lahir));
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
			$d['kewarganegaraan'] = $data->kewarganegaraan;
			$d['foto'] = $data->foto;
			$d['combo_jabatan'] = $this->Combo_model->combo_jabatan_guru($data->id_jabatan);
			$d['id_guru'] = $data->id_guru;
			$d['aktif_guru'] = $data->aktif_guru;
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('guru/guru_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}	
	}

	public function guru_save() {
			$tipe = $this->input->post("tipe");	
			$in['nip'] = $this->input->post("nip");
			$in['nuptk'] = $this->input->post("nuptk");
			$in['nik'] = $this->input->post("nik");
			$in['nama_guru'] = $this->input->post("nama_guru");
			$in['jenis_kelamin'] = $this->input->post("jenis_kelamin");
			$in['tanggal_lahir'] = date("Y-m-d",strtotime($this->input->post("tanggal_lahir")));
			$in['tempat_lahir'] = $this->input->post("tempat_lahir");
			$in['alamat_jalan'] = $this->input->post("alamat_jalan");
			$in['kelurahan'] = $this->input->post("kelurahan");
			$in['kecamatan'] = $this->input->post("kecamatan");
			$in['hp'] = $this->input->post("hp");
			$in['telepon'] = $this->input->post("telepon");
			$in['email'] = $this->input->post("email");
			$in['agama'] = $this->input->post("agama");
			$in['kewarganegaraan'] = $this->input->post("kewarganegaraan");
			$in['id_jabatan'] = $this->input->post("id_jabatan");
			$in['password'] = md5($this->input->post("nip"));


			$config['upload_path'] = './upload/guru';
			$config['allowed_types']= 'jpg|png';
			$config['encrypt_name']	= TRUE;
			$config['remove_spaces']	= TRUE;	
			$config['max_size']     = '0';
			$config['max_width']  	= '0';
			$config['max_height']  	= '0';

			$this->load->library('upload', $config);

			
			if($tipe == "add") {
				$cek = $this->db->query("SELECT nip FROM mst_guru WHERE nip = '$in[nip]'");
				if($cek->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. NIPTK Sudah Digunakan");
					redirect("pengguna/guru_tambah/");
				} else { 	
					if(!empty($_FILES['foto']['name'])) {
						if($this->upload->do_upload("foto")) {
							$data	 	= $this->upload->data();
							$in['foto'] = $data['file_name'];	
							$this->db->insert("mst_guru",$in);

							/*
							$in2['nama'] = $this->input->post("nama_guru");
							$in2['username'] = $this->input->post("nip");
							$in2['password'] = $this->input->post("nip");
							$in2['id_jabatan'] = $this->input->post("id_jabatan");
							$this->db->insert("mst_user",$in2);
							*/
							$this->session->set_flashdata("success","Tambah Data Guru Berhasil");
							redirect("pengguna/guru_detail/".$this->input->post("nip"));	
						} else {
							$this->session->set_flashdata("error",$this->upload->display_errors());
							redirect("pengguna/guru_tambah/");	
						}
					} else {
						$this->session->set_flashdata("error",$this->upload->display_errors());	
						redirect("pengguna/guru_tambah/");
					}
				}
			} elseif($tipe = 'edit') {
				$where['id_guru'] 	= $this->input->post('id_guru');
				$cek = $this->db->query("SELECT nip FROM mst_guru WHERE nip = '$in[nip]' AND id_guru != '$where[id_guru]'");
				if($cek->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input.  NIPTK Sudah Digunakan");
					redirect("pengguna/guru_edit/".$this->input->post("id_guru"));
				}  else { 	
					if(!empty($_FILES['foto']['name'])) {
						if($this->upload->do_upload("foto")) {
							$data	 	= $this->upload->data();
							$in['foto'] = $data['file_name'];	
							$in['aktif_guru'] = $this->input->post("aktif_guru");
							$where['id_guru'] 	= $this->input->post('id_guru');
							$this->db->update("mst_guru",$in,$where);
							/*
							$where2['username'] = $this->input->post("nip_lama");
							$in2['nama'] = $this->input->post("nama_guru");
							$in2['username'] = $this->input->post("nip");
							$in2['password'] = $this->input->post("nip");
							$in2['id_jabatan'] = $this->input->post("id_jabatan");
							$this->db->update("mst_user",$in2,$where2);
							*/
							@unlink("./upload/guru/".$this->input->post("foto_lama"));
							$this->session->set_flashdata("success","Ubah Data Guru Berhasil");
							redirect("pengguna/guru_detail/".$this->input->post("nip"));	
						} else {
							$this->session->set_flashdata("error",$this->upload->display_errors()."gagal");
							redirect("pengguna/guru_detail/".$this->input->post("nip"));
						}
					} else {
						$in['aktif_guru'] = $this->input->post("aktif_guru");
						$this->db->update("mst_guru",$in,$where);
						$where2['username'] = $this->input->post("nip_lama");
						$in2['nama'] = $this->input->post("nama_guru");
						$in2['username'] = $this->input->post("nip");
						$in2['password'] = $this->input->post("nip");
						$in2['id_jabatan'] = $this->input->post("id_jabatan");
						$this->db->update("mst_user",$in2,$where2);
						$this->session->set_flashdata("success","Ubah Data Guru Berhasil");
						redirect("pengguna/guru_detail/".$this->input->post("nip"));	
					}
				}
				
			} else {
				redirect(base_url());
			}
	}


	public function kepala_sekolah() {
		$d['judul'] = "Data Kepala Sekolah";
		$d['kepala_sekolah'] = $this->Pengguna_model->kepala_sekolah();
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('kepala_sekolah/kepala_sekolah');
		$this->load->view('bottom');	
	}


	public function kepala_sekolah_tambah() {
		$d['judul'] = "Data Kepala Sekolah";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['nip'] = "";
		$d['nik'] = "";
		$d['nama_kepala_sekolah'] = "";
		$d['hp'] = "";
		$d['email'] = "";
		$d['foto'] = "";
		$d['id_kepala_sekolah'] = "";
		$d['aktif_kepala_sekolah'] = "";
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('kepala_sekolah/kepala_sekolah_tambah');
		$this->load->view('bottom');
		
	}

	public function kepala_sekolah_edit($id_kepala_sekolah) {
		$cek = $this->db->query("SELECT id_kepala_sekolah FROM mst_kepala_sekolah WHERE id_kepala_sekolah = '$id_kepala_sekolah'");
		if($cek->num_rows() > 0) { 
			$d['judul'] = "Data Kepala Sekolah";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$get = $this->Pengguna_model->kepala_sekolah_edit($id_kepala_sekolah);
			$data = $get->row();
			$d['nip'] = $data->nip;
			$d['nik'] = $data->nik;
			$d['nama_kepala_sekolah'] = $data->nama_kepala_sekolah;
			$d['hp'] = $data->hp;
			$d['email'] = $data->email;
			$d['foto'] = $data->foto;
			$d['aktif_kepala_sekolah'] = $data->aktif_kepala_sekolah;
			$d['id_kepala_sekolah'] = $data->id_kepala_sekolah;
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('kepala_sekolah/kepala_sekolah_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}	
	}


	public function kepala_sekolah_save() {
		$tipe = $this->input->post("tipe");	
		$in['nip'] = $this->input->post("nip");
		$in['nik'] = $this->input->post("nik");
		$in['nama_kepala_sekolah'] = $this->input->post("nama_kepala_sekolah");
		$in['hp'] = $this->input->post("hp");
		$in['email'] = $this->input->post("email");
		$in['password'] = md5($this->input->post("nip"));


		$config['upload_path'] = './upload/kepala_sekolah';
		$config['allowed_types']= 'jpg|png';
		$config['encrypt_name']	= TRUE;
		$config['remove_spaces']	= TRUE;	
		$config['max_size']     = '0';
		$config['max_width']  	= '0';
		$config['max_height']  	= '0';

		$this->load->library('upload', $config);

		
		if($tipe == "add") {
			$cek = $this->db->query("SELECT nip FROM mst_kepala_sekolah WHERE nip = '$in[nip]'");
			$cek2 = $this->db->query("SELECT nik FROM mst_kepala_sekolah WHERE nik = '$in[nik]'");
			if($cek->num_rows() > 0) { 
				$this->session->set_flashdata("error","Gagal Input. NIP Sudah Digunakan");
				redirect("pengguna/kepala_sekolah_tambah/");
			} else if($cek2->num_rows() > 0 && !empty($in['nik'])) { 
				$this->session->set_flashdata("error","Gagal Input. NIK Sudah Digunakan");
				redirect("pengguna/kepala_sekolah_tambah/");
			} else { 	
				if(!empty($_FILES['foto']['name'])) {
					if($this->upload->do_upload("foto")) {
						$data	 	= $this->upload->data();
						$in['foto'] = $data['file_name'];	
						$this->db->query("UPDATE mst_kepala_sekolah SET aktif_kepala_sekolah = '0'");
						$this->db->insert("mst_kepala_sekolah",$in);
						$this->session->set_flashdata("success","Tambah Data Kepala Sekolah Berhasil");
						redirect("pengguna/kepala_sekolah_detail/".$this->input->post("nip"));	
					} else {
						$this->session->set_flashdata("error",$this->upload->display_errors());
						redirect("pengguna/kepala_sekolah_tambah/");	
					}
				} else {
					$this->session->set_flashdata("error",$this->upload->display_errors());	
					redirect("pengguna/kepala_sekolah_tambah/");
				}
			}
		} elseif($tipe = 'edit') {
			$where['id_kepala_sekolah'] 	= $this->input->post('id_kepala_sekolah');
			$cek = $this->db->query("SELECT nik FROM mst_kepala_sekolah WHERE nik = '$in[nik]' AND id_kepala_sekolah != '$where[id_kepala_sekolah]'");
			$cek2 = $this->db->query("SELECT nik FROM mst_kepala_sekolah WHERE nip = '$in[nip]' AND id_kepala_sekolah != '$where[id_kepala_sekolah]'");
			if($cek->num_rows() > 0) { 
				$this->session->set_flashdata("error","Gagal Input.  NIK Sudah Digunakan");
				redirect("pengguna/kepala_sekolah_edit/".$this->input->post("id_kepala_sekolah"));
			} else if($cek2->num_rows() > 0) { 
				$this->session->set_flashdata("error","Gagal Input. NIP Sudah Digunakan");
				redirect("pengguna/kepala_sekolah_edit/".$this->input->post("id_kepala_sekolah"));
			} else { 	
				if(!empty($_FILES['foto']['name'])) {
					if($this->upload->do_upload("foto")) {
						$data	 	= $this->upload->data();
						$in['foto'] = $data['file_name'];	
						$in['aktif_kepala_sekolah'] = $this->input->post("aktif_kepala_sekolah");
						$where['id_kepala_sekolah'] 	= $this->input->post('id_kepala_sekolah');
						$this->db->update("mst_kepala_sekolah",$in,$where);
						@unlink("./upload/kepala_sekolah_detail/".$this->input->post("foto_lama"));
						$this->session->set_flashdata("success","Ubah Data Kepala Sekolah Berhasil");
						redirect("pengguna/kepala_sekolah_detail/".$this->input->post("nip"));	
					}
				} else {
					$in['aktif_kepala_sekolah'] = $this->input->post("aktif_kepala_sekolah");
					$this->db->update("mst_kepala_sekolah",$in,$where);
					$this->session->set_flashdata("success","Ubah Data Kepala Sekolah Berhasil");
					redirect("pengguna/kepala_sekolah_detail/".$this->input->post("nip"));	
				}
			}
			
		} else {
			redirect(base_url());
		}
	}


	public function kepala_sekolah_detail($nip) {
		$d['judul'] = "Data Kepala Sekolah";
		$d['judul2'] = "Detail";
		$get = $this->Pengguna_model->kepala_sekolah_detail($nip);
		if($get->num_rows() == 0) {
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		} else { 
			$data = $get->row();
			$d['nip'] = $data->nip;
			$d['nik'] = $data->nik;
			$d['nama_kepala_sekolah'] = $data->nama_kepala_sekolah;
			$d['hp'] = $data->hp;
			$d['email'] = $data->email;
			$d['foto'] = $data->foto;
			$d['id_kepala_sekolah'] = $data->id_kepala_sekolah;
			$d['aktif_kepala_sekolah'] = $data->aktif_kepala_sekolah;
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('kepala_sekolah/kepala_sekolah_detail');
			$this->load->view('bottom');	
		}
	}


	public function staff() {
		$d['judul'] = "Data Staff";
		$d['staff'] = $this->Pengguna_model->staff();
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('staff/staff');
		$this->load->view('bottom');	
	}

	public function staff_detail($nip) {
		$d['judul'] = "Data staff";
		$d['judul2'] = "Detail";
		$get = $this->Pengguna_model->staff_detail($nip);
		if($get->num_rows() == 0) {
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		} else { 
			$data = $get->row();
			$d['nip'] = $data->nip;
			$d['nama_staff'] = $data->nama_staff;
			$d['jenis_kelamin'] = $data->jenis_kelamin;
			$d['tanggal_lahir'] = date("d-m-Y",strtotime($data->tanggal_lahir));
			$d['tempat_lahir'] = $data->tempat_lahir;
			$d['alamat_jalan'] = $data->alamat_jalan;
			$d['kelurahan'] = $data->kelurahan;
			$d['kecamatan'] = $data->kecamatan;
			$d['hp'] = $data->hp;
			$d['telepon'] = $data->telepon;
			$d['email'] = $data->email;
			$d['agama'] = $data->agama;
			$d['kewarganegaraan'] = $data->kewarganegaraan;
			$d['foto'] = $data->foto;
			$d['id_staff'] = $data->id_staff;
			$d['aktif_staff'] = $data->aktif_staff;
			$d['id_jabatan'] = $data->id_jabatan;
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('staff/staff_detail');
			$this->load->view('bottom');	
		}
	}

	public function staff_tambah() {
		$d['judul'] = "Data staff";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['nip'] = "";
		$d['nik'] = "";
		$d['nama_staff'] = "";
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
		$d['kewarganegaraan'] = "";
		$d['foto'] = "";
		$d['id_staff'] = "";
		$d['aktif_staff'] = "";
		$d['combo_jabatan'] = $this->Combo_model->combo_jabatan_staff();
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('staff/staff_tambah');
		$this->load->view('bottom');
		
	}


	public function staff_edit($id_staff) {
		$cek = $this->db->query("SELECT id_staff FROM mst_staff WHERE id_staff = '$id_staff'");
		if($cek->num_rows() > 0) { 
			$d['judul'] = "Data staff";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$get = $this->Pengguna_model->staff_edit($id_staff);
			$data = $get->row();
			$d['nip'] = $data->nip;
			$d['nama_staff'] = $data->nama_staff;
			$d['jenis_kelamin'] = $data->jenis_kelamin;
			$d['tanggal_lahir'] = date("d-m-Y",strtotime($data->tanggal_lahir));
			$d['tempat_lahir'] = $data->tempat_lahir;
			$d['alamat_jalan'] = $data->alamat_jalan;
			$d['kelurahan'] = $data->kelurahan;
			$d['kecamatan'] = $data->kecamatan;
			$d['hp'] = $data->hp;
			$d['telepon'] = $data->telepon;
			$d['email'] = $data->email;
			$d['agama'] = $data->agama;
			$d['kewarganegaraan'] = $data->kewarganegaraan;
			$d['foto'] = $data->foto;
			$d['id_staff'] = $data->id_staff;
			$d['aktif_staff'] = $data->aktif_staff;
			$d['combo_jabatan'] = $this->Combo_model->combo_jabatan_staff($data->id_jabatan);
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('staff/staff_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}	
	}

	public function staff_save() {
			$tipe = $this->input->post("tipe");	
			$in['nip'] = $this->input->post("nip");
			$in['nama_staff'] = $this->input->post("nama_staff");
			$in['jenis_kelamin'] = $this->input->post("jenis_kelamin");
			$in['tanggal_lahir'] = date("Y-m-d",strtotime($this->input->post("tanggal_lahir")));
			$in['tempat_lahir'] = $this->input->post("tempat_lahir");
			$in['alamat_jalan'] = $this->input->post("alamat_jalan");
			$in['kelurahan'] = $this->input->post("kelurahan");
			$in['kecamatan'] = $this->input->post("kecamatan");
			$in['hp'] = $this->input->post("hp");
			$in['telepon'] = $this->input->post("telepon");
			$in['email'] = $this->input->post("email");
			$in['agama'] = $this->input->post("agama");
			$in['kewarganegaraan'] = $this->input->post("kewarganegaraan");
			$in['password'] = md5($this->input->post("nip"));

			$in['id_jabatan'] = $this->input->post("id_jabatan");


			$config['upload_path'] = './upload/staff';
			$config['allowed_types']= 'jpg|png';
			$config['encrypt_name']	= TRUE;
			$config['remove_spaces']	= TRUE;	
			$config['max_size']     = '0';
			$config['max_width']  	= '0';
			$config['max_height']  	= '0';

			$this->load->library('upload', $config);

			
			if($tipe == "add") {
				$cek = $this->db->query("SELECT nip FROM mst_staff WHERE nip = '$in[nip]'");
				if($cek->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. NIP Sudah Digunakan");
					redirect("pengguna/staff_tambah/");
				}  else { 	
					if(!empty($_FILES['foto']['name'])) {
						if($this->upload->do_upload("foto")) {
							$data	 	= $this->upload->data();
							$in['foto'] = $data['file_name'];	
							$this->db->insert("mst_staff",$in);
							$in2['nama'] = $this->input->post("nama_staff");
							$in2['username'] = $this->input->post("nip");
							$in2['password'] = $this->input->post("nip");
							$in2['id_jabatan'] = $this->input->post("id_jabatan");
							$this->db->insert("mst_user",$in2);

							$this->session->set_flashdata("success","Tambah Data staff Berhasil");
							redirect("pengguna/staff_detail/".$this->input->post("nip"));	
						} else {
							$this->session->set_flashdata("error",$this->upload->display_errors());
							redirect("pengguna/staff_tambah/");	
						}
					} else {
						$this->session->set_flashdata("error",$this->upload->display_errors());	
						redirect("pengguna/staff_tambah/");
					}
				}
			} elseif($tipe = 'edit') {
				$where['id_staff'] 	= $this->input->post('id_staff');
				$cek = $this->db->query("SELECT nip FROM mst_staff WHERE nip = '$in[nip]' AND id_staff != '$where[id_staff]'");
				if($cek->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input.  NIP Sudah Digunakan");
					redirect("pengguna/staff_edit/".$this->input->post("id_staff"));
				}  else { 	
					if(!empty($_FILES['foto']['name'])) {
						if($this->upload->do_upload("foto")) {
							$data	 	= $this->upload->data();
							$in['foto'] = $data['file_name'];	
							$in['aktif_staff'] = $this->input->post("aktif_staff");
							$where['id_staff'] 	= $this->input->post('id_staff');
							$this->db->update("mst_staff",$in,$where);

							$where2['username'] = $this->input->post("nip_lama");
							$in2['nama'] = $this->input->post("nama_staff");
							$in2['username'] = $this->input->post("nip");
							$in2['password'] = $this->input->post("nip");
							$in2['id_jabatan'] = $this->input->post("id_jabatan");
							$this->db->update("mst_user",$in2,$where2);

							@unlink("./upload/staff/".$this->input->post("foto_lama"));
							$this->session->set_flashdata("success","Ubah Data staff Berhasil");
							redirect("pengguna/staff_detail/".$this->input->post("nip"));	
						}
					} else {
						$in['aktif_staff'] = $this->input->post("aktif_staff");
						$this->db->update("mst_staff",$in,$where);

						$where2['username'] = $this->input->post("nip_lama");
						$in2['nama'] = $this->input->post("nama_staff");
						$in2['username'] = $this->input->post("nip");
						$in2['password'] = $this->input->post("nip");
						$in2['id_jabatan'] = $this->input->post("id_jabatan");
						$this->db->update("mst_user",$in2,$where2);

						$this->session->set_flashdata("success","Ubah Data staff Berhasil");
						redirect("pengguna/staff_detail/".$this->input->post("nip"));	
					}
				}
				
			} else {
				redirect(base_url());
			}
	}

	public function guru_import()
	{
		if ($this->session->userdata('hak_akses') != "") {
			$unggah['upload_path']   = './upload/';
			$unggah['allowed_types'] = 'xlsx';
			$unggah['file_name']     = 'guru_import';
			$unggah['overwrite']     = true;
			$unggah['max_size']      = 5120;

			$this->load->library('upload');

			$this->upload->initialize($unggah);
			if ($this->upload->do_upload('file_import')) {
				$file_excel = new unggahexcel('upload/guru_import.xlsx', null);

				if (count($file_excel->Sheets()) == 1) {
					$baris = 1;

					foreach ($file_excel as $kolom) {
						if ($baris >= 2) {
							$cek = $this->db->query("SELECT nip FROM mst_guru WHERE nip = '$kolom[0]'");
							if($cek->num_rows() == 0) { 
								$in['nip'] = $kolom[0];
								$in['nama_guru'] = $kolom[1];
								$in['jenis_kelamin'] = $kolom[2];
								$in['id_jabatan'] = $kolom[3];
								$in['password'] = $kolom[0];
								$this->db->insert("mst_guru", $in);
							}
						}
						$baris++;
					}

					$this->session->set_flashdata("success", "Berhasil Import Data Guru");
				} else {
					$this->session->set_flashdata("error", "Gagal Import Data");
				}
			} else {
				$this->session->set_flashdata("error", $this->upload->display_errors());
			}
			unlink('./upload/guru_import.xlsx');
			redirect("pengguna/guru");
		} else {
			redirect(base_url());
		}
	}
}