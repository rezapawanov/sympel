<?php
defined('BASEPATH') or exit('No direct script access allowed');

class App extends CI_Controller
{

	
	public function index()
	{
		if ($this->session->userdata('hak_akses') != "") {
			if ($this->session->userdata('tipe') != "root") {
				redirect("../" . $this->session->userdata('tipe'));
			} else {
				redirect(base_url() . 'home');
			}
		} else {
			$this->load->view("login");
		}
	}


	public function manualbook()
	{
		$this->load->view('top');
		$this->load->view('menu');
		$this->load->view('home/manualbook');
		$this->load->view('bottom');
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
		if($hak_akses == "admin") {
			$cek = $this->db->query("SELECT * FROM mst_admin WHERE username = '$username' AND password = '$password_lama'");
			if($cek->num_rows() > 0) {
				$where['username'] = $username;
				$in['password'] = $password_baru;
				$this->db->update("mst_admin",$in,$where);
				$this->session->set_flashdata("success", "Ubah Password Berhasil");
			} else {
				$this->session->set_flashdata("error", "Ubah Password Gagal. Password Lama Salah");
			}
		}
		redirect("app/password/");
	}
}
