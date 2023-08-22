<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Password extends CI_Controller {

	public function index() {
		$d['judul'] = "Ubah Password";
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('password/password');
		$this->load->view('bottom');	
    }

    public function save() {
        $password_lama = $this->input->post("password_lama");
        $password_baru = $this->input->post("password_baru");
        $id = $this->session->userdata("id");
        $cek = $this->db->query("SELECT * FROM mst_user WHERE id_user = '$id' AND password = '$password_lama'");
        if($cek->num_rows() == 0) {
            $this->session->set_flashdata("error","Gagal Ubah Password, Password Lama Salah");
        } else {
            $in['password'] = $password_baru;
            $where['id_user'] = $id;
            $this->db->update("mst_user",$in,$where);
            $this->session->set_flashdata("success","Berhasil Ubah Password");
        }
        redirect("password");
    }
}