<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BarangSita extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('hak_akses') != "admin" && $this->session->userdata('hak_akses') != "gurubk" && $this->session->userdata('hak_akses') != "guru") {
			redirect(base_url());
		} else {
			$this->load->Model('BarangSita_siswa_model');
			$this->load->Model('Combo_model');
		}
	}



	public function index()
	{
		$d['judul'] = "Data Barang Sita";
		$get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();
		$d['barangsita'] = $this->BarangSita_siswa_model->barangsita($get_tahun->tahun_ajaran);
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('barangsita/barangsita');
		$this->load->view('bottom');
	}

	

	public function barangsita_siswa_tambah()
	{
		$d['judul'] = "Data Barang Sita Siswa";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['tanggal_sita'] = "";
		$d['id_barangsita_siswa'] = '';
		$d['keterangan_sita'] = '';
		$d['siswa'] = '';
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('barangsita/barangsita_tambah');
		$this->load->view('bottom');
	}

	public function barangsita_siswa_edit($id_barangsita_siswa)
	{
		$cek = $this->db->query("SELECT id_barangsita_siswa FROM barangsita_siswa WHERE id_barangsita_siswa = '$id_barangsita_siswa'");
		if ($cek->num_rows() > 0) {
			$d['judul'] = "Data Barang Sita";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$get = $this->db->query("SELECT id_barangsita_siswa,barangsita_siswa.id_siswa, nama_kelas, nama_siswa, tanggal_sita, keterangan_sita FROM barangsita_siswa 
										INNER JOIN mst_siswa ON barangsita_siswa.id_siswa = mst_siswa.id_siswa 
										INNER JOIN mst_kelas ON barangsita_siswa.id_kelas = mst_kelas.id_kelas WHERE id_barangsita_siswa = '$id_barangsita_siswa'");
			$data = $get->row();
			$d['siswa'] = $data->id_siswa.'-'.$data->nama_siswa.'-'.$data->nama_kelas;
			$d['id_barangsita_siswa'] = $data->id_barangsita_siswa;
			$d['tanggal_sita'] = date("d-m-Y",strtotime($data->tanggal_sita));
			$d['keterangan_sita'] = $data->keterangan_sita;
			$this->load->view('top', $d);
			$this->load->view('menu');
			$this->load->view('barangsita/barangsita_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}
	}


	public function barangsita_siswa_save()
	{
		$tipe = $this->input->post("tipe");

		$get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();

		$ex = explode("-",$this->input->post("id_siswa"));
		$in['id_siswa'] = $ex[0];
		$in['id_penginput'] = $this->session->userdata("id");
		$in['tahun_ajaran'] = $get_tahun->tahun_ajaran;
		$in['keterangan_sita'] = $this->input->post("keterangan_sita");
		$in['tanggal_sita'] = date("Y-m-d", strtotime($this->input->post('tanggal_sita')));
		if ($tipe == "add") {
			$get_kelas = $this->db->query("SELECT id_kelas FROM mst_siswa WHERE id_siswa = '$in[id_siswa]'")->row();
			$in['id_kelas'] = $get_kelas->id_kelas;
			$this->db->insert("barangsita_siswa", $in);
			$this->session->set_flashdata("success", "Tambah barangsita Siswa Berhasil");
			redirect("BarangSita");
		} elseif ($tipe = 'edit') {
			$where['id_barangsita_siswa'] 	= $this->input->post('id_barangsita_siswa');
			$this->db->update("barangsita_siswa", $in, $where);
			$this->session->set_flashdata("success", "Ubah barangsita Siswa Berhasil");
			redirect("BarangSita");
		} else {
			redirect(base_url());
		}
	}

	public function barangsita_siswa_hapus($id)
	{
		$where['id_barangsita_siswa'] = $id;
		$this->db->delete("barangsita_siswa", $where);
		$this->session->set_flashdata("success", "Hapus barangsita Siswa Berhasil");
		redirect("BarangSita");
	}
}
