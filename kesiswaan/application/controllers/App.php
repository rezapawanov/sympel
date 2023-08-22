<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {


	public function index() {
		if($this->session->userdata('hak_akses') != "") {
			redirect(base_url().'home'); 
		} else {
			redirect("../"); 
		}
	}

	
	public function agenda_save() {
		$tanggal = $this->input->post("date");
		$ex_tanggal = explode("-",$tanggal);
		$in['title'] = $this->input->post("info");
		$in['start'] = date("Y-m-d",strtotime($tanggal));
		$in['end'] = date("Y-m-d",strtotime($tanggal));
		$in['year'] = $ex_tanggal[0];
		$this->db->insert("calendar_poinpelanggaran",$in);
		redirect(base_url().'home');	
	}

	public function agenda_hapus() {
		$where['id'] = $this->input->post("id");	
		$this->db->delete("calendar_poinpelanggaran",$where);
		redirect(base_url().'home');	
	}

	public function password()
	{
		$d['judul'] = "Ubah Password";
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('password/password');
		$this->load->view('bottom');
	}

	public function password_save()
	{
		$password_lama = $this->input->post("password_lama");
		$password_baru = $this->input->post("password_baru");
		$hak_akses = $this->session->userdata("hak_akses");
		$username = $this->session->userdata("username");
		if($hak_akses == "guru" || $hak_akses == "gurubk") {
			$cek = $this->db->query("SELECT * FROM mst_guru WHERE nip = '$username' AND password = '$password_lama'");
			if($cek->num_rows() > 0) {
				$where['nip'] = $username;
				$in['password'] = $password_baru;
				$this->db->update("mst_guru",$in,$where);
				$this->session->set_flashdata("success", "Ubah Password Berhasil");
			} else {
				$this->session->set_flashdata("error", "Ubah Password Gagal. Password Lama Salah");
			}
		}
		redirect("app/password/");
	}
}
