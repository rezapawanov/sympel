<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends CI_Controller
{

	public function index()
	{
		redirect(base_url());
    }
    
	public function denda()
	{
		$d['judul'] = "Pengaturan Denda Perpustakaan";
        $get = $this->db->query("SELECT * FROM pengaturan_perpus WHERE id = 1")->row();
        $d['denda'] = $get->denda;
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('pengaturan/denda');
		$this->load->view('bottom');
	}

	public function denda_save()
	{
		$where['id'] = 1;
		$in['denda'] = $this->input->post("denda");
        $this->db->update("pengaturan_perpus", $in, $where);
        $this->session->set_flashdata("success", "Update Denda Berhasil");
		redirect("pengaturan/denda/");
	}
}
