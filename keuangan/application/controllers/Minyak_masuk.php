<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Minyak_masuk extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('hak_akses') != "admin" && $this->session->userdata('hak_akses') != "gurubk" && $this->session->userdata('hak_akses') != "guru") {
			redirect(base_url());
		} else {
			$this->load->Model('Minyak_masuk_model');
			$this->load->Model('Combo_model');
		}
	}



	public function index()
	{
		$d['judul'] = "Data Tabungan Siswa";
		$get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();
		$d['minyak_masuk'] = $this->Minyak_masuk_model->minyak_masuk($get_tahun->tahun_ajaran);
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('minyak_masuk/minyak_masuk');
		$this->load->view('bottom');
	}

	


	

	public function minyak_masuk_tambah()
	{
		$d['judul'] = "Data Minyak Masuk";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['id_mm'] = "";
		$d['mm_tanggal'] = '';
		$d['mm_qty'] = '';
		$d['mm_harga'] = '';
		$d['mm_bayar'] = '';
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('minyak_masuk/minyak_masuk_tambah');
		$this->load->view('bottom');
	}


	public function minyak_masuk_edit($id_mm)
	{
		$cek = $this->db->query("SELECT id_mm FROM minyak_masuk WHERE id_mm = '$id_mm'");
		if ($cek->num_rows() > 0) {
			$d['judul'] = "Data Pelanggaran Siswa";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$get = $this->Minyak_masuk_model->minyak_masuk_edit($id_mm);
			$data = $get->row();
			$d['id_mm'] = $data->id_mm;
			$d['mm_qty'] = $data->mm_qty;
			$d['mm_tanggal'] = date("d-m-Y",strtotime($data->mm_tanggal));
			$d['mm_bayar'] = date("d-m-Y",strtotime($data->mm_bayar));
			$d['mm_harga'] = $data->mm_harga;

			$this->load->view('top', $d);
			$this->load->view('menu');
			$this->load->view('minyak_masuk/minyak_masuk_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}
	}

	public function minyak_masuk_save()
	{
		$tipe = $this->input->post("tipe");

		$id_mm = $this->input->post("id_mm");
		$mm_tanggal = date("Y-m-d", strtotime($this->input->post('mm_tanggal')));
		$mm_qty = $this->input->post("mm_qty");
		$mm_harga = $this->input->post("mm_harga");
		$mm_bayar = date("Y-m-d", strtotime($this->input->post('mm_bayar')));
		if ($tipe == "add") {
			$data = array(
				'id_mm'=> $id_mm,
				'mm_tanggal'=> $mm_tanggal,
				'mm_qty'=> $mm_qty,
				'mm_harga'=> $mm_harga,
				'mm_bayar'=> $mm_bayar,
			);
			$this->db->insert("minyak_masuk", $data);
			$this->session->set_flashdata("success", "Tambah  Tabungan Siswa Berhasil");
			redirect("minyak_masuk");

		} elseif ($tipe = 'edit') {
			$data = array(
				'id_mm'=> $id_mm,
				'mm_tanggal'=> $mm_tanggal,
				'mm_qty'=> $mm_qty,
				'mm_harga'=> $mm_harga,
				'mm_bayar'=> $mm_bayar,
			);
			$where['id_mm'] 	= $this->input->post('id_mm');
			$this->db->update("minyak_masuk", $data, $where);
			$this->session->set_flashdata("success", "Ubah Pelanggaran Siswa Berhasil");
			redirect("minyak_masuk");
	
	
	
		} else {
			redirect(base_url());
		}
	}

	public function minyak_masuk_hapus($id)
	{
		$where['id_mm'] = $id;
		$this->db->delete("minyak_masuk", $where);
		$this->session->set_flashdata("success", "Hapus Pelanggaran Siswa Berhasil");
		redirect("minyak_masuk");
	}
}
