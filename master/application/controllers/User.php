<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {


	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('tipe') != "root") {
			redirect("../" . $this->session->userdata('tipe'));
		} else {
			$this->load->Model('User_model');
			$this->load->Model('Combo_model');
		}
	}


	public function index() {
		redirect(base_url());
	}


	public function admin() {
		$d['judul'] = "Data User";
		$d['admin'] = $this->User_model->admin();
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('admin/admin');
		$this->load->view('bottom');	
	}



	public function admin_tambah() {
		$d['judul'] = "Data User";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['combo_jabatan'] = $this->Combo_model->combo_jabatan();
		$d['nama'] = "";
		$d['username'] = "";
		$d['password'] = "";
		$d['id_user'] = "";
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('admin/admin_tambah');
		$this->load->view('bottom');
		
	}


	public function admin_edit($id_user) {
		$cek = $this->db->query("SELECT id_user FROM mst_user WHERE id_user = '$id_user'");
		if($cek->num_rows() > 0) { 
			$d['judul'] = "Data Admin";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$get = $this->User_model->admin_edit($id_user);
			$data = $get->row();
			$d['nama'] = $data->nama;
			$d['username'] = $data->username;
			$d['password'] = $data->password;
			$d['combo_jabatan'] = $this->Combo_model->combo_jabatan($data->id_jabatan);
			$d['id_user'] = $data->id_user;
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('admin/admin_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}	
	}

	public function admin_save() {
			$tipe = $this->input->post("tipe");	
			$in['nama'] = $this->input->post("nama");
			$in['username'] = $this->input->post("username");
			$in['password'] = md5($this->input->post("password"));
			$in['id_jabatan'] = $this->input->post("id_jabatan");
			
			if($tipe == "add") {
				$cek = $this->db->query("SELECT username FROM mst_user WHERE username = '$in[username]'");
				if($cek->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Username Sudah Digunakan");
					redirect("user/admin_tambah/");
				}  else { 	
					$this->db->insert("mst_user",$in);
					$this->session->set_flashdata("success","Tambah Data Admin Berhasil");
					redirect("user/admin/");	
				}
			} elseif($tipe = 'edit') {
				$where['id_user'] 	= $this->input->post('id_user');
				$cek = $this->db->query("SELECT username FROM mst_user WHERE username = '$in[username]' AND id_user != '$where[id_user]'");
				if($cek->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Username Sudah Digunakan");
					redirect("user/admin_edit/".$this->input->post("id_user"));
				} else { 	
					$this->db->update("mst_user",$in,$where);
					$this->session->set_flashdata("success","Ubah Data Admin Berhasil");
					redirect("user/admin/");
				}
				
			} else {
				redirect(base_url());
			}
	}

	public function admin_hapus($id) {
		$where['id_user'] = $id;
		$this->db->delete("mst_user",$where);
		$this->session->set_flashdata("success","Hapus Data Admin Berhasil");
		redirect("user/admin");
	}
}