<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class absen extends CI_Controller {


	public function __construct(){
		parent::__construct();
		if($this->session->userdata('hak_akses') != "admin" && $this->session->userdata('hak_akses') != "gurubk" && $this->session->userdata('hak_akses') != "guru") { 
			redirect(base_url());
		} else {
			$this->load->Model('Absen_model');
		}
	}


	public function index() {
		$d['judul'] = "Data Absen Siswa";
		$get_tahunajaran = $this->db->query("SELECT id_tahun_ajaran,tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();
		$d['absen'] = $this->Absen_model->absen($get_tahunajaran->id_tahun_ajaran);
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('absen/absen');
		$this->load->view('bottom');
	}
	

	public function absen_tambah() {
		$d['judul'] = "Data Absen";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['id_absen'] = "";
		$d['keterangan'] = "";
		$d['alasan'] = "";
		$d['siswa'] = '';
		$d['tanggal_absen'] = '';
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('absen/absen_tambah');
		$this->load->view('bottom');
		
	}

	public function absen_edit($id_absen)
	{
		$cek = $this->db->query("SELECT * FROM vw_absen WHERE id_absen = '$id_absen'");
		if ($cek->num_rows() > 0) {
			$d['judul'] = "Data Absen Siswa";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$data = $cek->row();
			$d['id_absen'] = $data->id_absen;
			$d['keterangan'] = $data->keterangan;
			$d['alasan'] = $data->alasan;
			$d['siswa'] = $data->id_siswa.'-'.$data->nama_siswa.'-'.$data->nama_kelas;
			$d['tanggal_absen'] = $data->tanggal_absen;
			$this->load->view('top', $d);
			$this->load->view('menu');
			$this->load->view('absen/absen_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}
	}

	public function absen_save()
	{
		$get_tahunajaran = $this->db->query("SELECT id_tahun_ajaran,tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();
        
        $tipe = $this->input->post("tipe");
        $ex = explode("-",$this->input->post("id_siswa"));
        $get_kelas = $this->db->query("SELECT id_kelas FROM mst_siswa WHERE id_siswa = '$ex[0]'")->row();
		$in['keterangan'] = $this->input->post("keterangan");
		$in['alasan'] = $this->input->post("alasan");
		$in['id_siswa'] = $ex[0];
		$in['id_kelas'] = $get_kelas->id_kelas;
		$in['id_tahun_ajaran'] = $get_tahunajaran->id_tahun_ajaran;

		if($this->session->userdata("hak_akses") == 'guru' || $this->session->userdata("hak_akses") == 'gurubk') {
			$in['id_guru'] = $this->session->userdata("id");
		} 
		
		$in['tanggal_absen'] = date("Y-m-d", strtotime($this->input->post('tanggal_absen')));
		if ($tipe == "add") {
			$this->db->insert("absen", $in);
			$last_id = $this->db->insert_id();

			if($in['keterangan'] == 'ALPA') {
				$get_poin = $this->db->query("SELECT poin FROM mst_poin_pelanggaran WHERE id_poin_pelanggaran = 1")->row();
				$in2['id_absen'] = $last_id;
				$in2['id_poin_pelanggaran'] = 1;
				$in2['id_kelas'] = $get_kelas->id_kelas;
				$in2['tahun_ajaran'] = $get_tahunajaran->tahun_ajaran;
				$in2['poin_minus'] = $get_poin->poin;
				$in2['tanggal'] = $in['tanggal_absen'];
				$in2['id_siswa'] = $in['id_siswa'];
				$this->db->insert("pelanggaran_siswa",$in2);
			}

			$this->session->set_flashdata("success", "Tambah  Absen Siswa Berhasil");
			redirect("absen");
		} elseif ($tipe = 'edit') {
			$where['id_absen'] 	= $this->input->post('id_absen');
			$this->db->update("absen", $in, $where);
			$this->session->set_flashdata("success", "Ubah Absen Siswa Berhasil");
			redirect("absen");
		} else {
			redirect(base_url());
		}
	}

	public function absen_hapus($id)
	{
		$where['id_absen'] = $id;
		$this->db->delete("absen", $where);
		$this->db->delete("pelanggaran_siswa",$where);
		$this->session->set_flashdata("success", "Hapus Absen Berhasil");
		redirect("absen");
	}
}