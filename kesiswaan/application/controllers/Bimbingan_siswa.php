<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bimbingan_siswa extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('hak_akses') != "admin" && $this->session->userdata('hak_akses') != "gurubk" && $this->session->userdata('hak_akses') != "guru") {
			redirect(base_url());
		} else {
			$this->load->Model('Bimbingan_siswa_model');
			$this->load->Model('Combo_model');
		}
	}



	public function index()
	{
		$d['judul'] = "Data Bimbingan Siswa";
		$get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();
		$d['bimbingan_siswa'] = $this->Bimbingan_siswa_model->bimbingan_siswa($get_tahun->tahun_ajaran);
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('bimbingan_siswa/bimbingan_siswa');
		$this->load->view('bottom');
	}

	public function ajax_siswa() {
		$query = $_POST['query'];
		$q = $this->db->query("SELECT id_siswa, nama_siswa, nama_kelas FROM mst_siswa 
									INNER JOIN mst_kelas ON mst_siswa.id_kelas = mst_kelas.id_kelas WHERE nama_siswa LIKE '%$query%'");
		if($q->num_rows() > 0) {
			foreach($q->result_array() as $data) {
				$arr[] = $data['id_siswa'].' - '.$data['nama_kelas'].' - '.$data['nama_siswa'];
			}
			echo json_encode($arr);
		}
	}


	public function bimbingan_siswa_detail($id_siswa)
	{
		$cek = $this->db->query("SELECT * FROM mst_siswa INNER JOIN mst_kelas ON mst_siswa.id_kelas = mst_kelas.id_kelas WHERE id_siswa = '$id_siswa'");
		if($cek->num_rows() > 0) {
			$data = $cek->row();
			$get = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
			$d['nama_sekolah'] = $get->nama_sekolah;
			$d['alamat_sekolah'] = $get->alamat;
			$d['website'] = $get->website;
			$get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();
			$d['judul'] = "Detail Bimbingan Siswa";
			$d['nama_siswa']  = $data->nama_siswa;
			$d['nama_kelas']  = $data->nama_kelas;
			$d['foto']  = $data->foto;
			$d['alamat_jalan']  = $data->alamat_jalan;	
			$d['kelurahan']  = $data->kelurahan;	
			$d['kecamatan']  = $data->kecamatan;	
			$d['kode_pos']  = $data->kode_pos;	
			$d['hp']  = $data->hp;	
			$d['no_hp_ayah']  = $data->no_hp_ayah;	
			$d['no_hp_ibu']  = $data->no_hp_ibu;	
			$d['tahun_ajaran'] = $get_tahun->tahun_ajaran;
			$d['bimbingan_siswa'] = $this->Bimbingan_siswa_model->bimbingan_siswa_id($id_siswa, $get_tahun->tahun_ajaran);
			$this->load->view('top', $d);
			$this->load->view('menu');
			$this->load->view('bimbingan_siswa/bimbingan_siswa_detail');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}
	}

	public function bimbingan_siswa_tambah()
	{
		$d['judul'] = "Data Pelanggaran Siswa";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['tanggal'] = "";
		$d['id_bimbingan_siswa'] = '';
		$d['siswa'] = '';
		$d['jenis_bimbingan_siswa'] = '';
		$d['perihal'] = '';
		$d['email'] = '';
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('bimbingan_siswa/bimbingan_siswa_tambah');
		$this->load->view('bottom');
	}


	public function bimbingan_siswa_edit($id_bimbingan_siswa)
	{
		$cek = $this->db->query("SELECT id_bimbingan_siswa FROM bimbingan_siswa WHERE id_bimbingan_siswa = '$id_bimbingan_siswa'");
		if ($cek->num_rows() > 0) {
			$d['judul'] = "Data Pelanggaran Siswa";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$get = $this->Bimbingan_siswa_model->bimbingan_siswa_edit($id_bimbingan_siswa);
			$data = $get->row();
			$d['siswa'] = $data->id_siswa.'-'.$data->nama_siswa.'-'.$data->nama_kelas;
			$d['id_bimbingan_siswa'] = $data->id_bimbingan_siswa;
			$d['perihal'] = $data->perihal;
			$d['email'] = $data->email;
			$d['tanggal'] = date("d-m-Y",strtotime($data->tanggal));
			$d['jenis_bimbingan_siswa'] ='';
			$this->load->view('top', $d);
			$this->load->view('menu');
			$this->load->view('bimbingan_siswa/bimbingan_siswa_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}
	}

	public function bimbingan_siswa_save()
	{
		$this->load->library('mailer');
		$tipe = $this->input->post("tipe");

		$get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();

		$ex = explode("-",$this->input->post("id_siswa"));
		$in['id_bimbingan_siswa'] = $this->input->post("id_bimbingan_siswa");
		$in['id_siswa'] = $ex[0];
		$in['id_penginput'] = $this->session->userdata("id");
		$in['tahun_ajaran'] = $get_tahun->tahun_ajaran;
		$in['tanggal'] = date("Y-m-d", strtotime($this->input->post('tanggal')));
		$in['perihal'] = $this->input->post("perihal");
		$in['email'] = $this->input->post("email");
		$in['jenis_bimbingan_siswa'] = $this->input->post("jenis_bimbingan_siswa");
		$sendmail = array(   
			'email'=>$email, 
		     'perihal'=>$perihal,    
			   'jenis_bimbingan_siswa'=>$jenis_bimbingan_siswa   
			       );
		if ($tipe == "add") {
			$get_kelas = $this->db->query("SELECT id_kelas FROM mst_siswa WHERE id_siswa = '$in[id_siswa]'")->row();
			$in['id_kelas'] = $get_kelas->id_kelas;
			$send = $this->mailer->send($sendmail);
			$this->db->insert("bimbingan_siswa", $in);
			$this->session->set_flashdata("success", "Tambah  Pelanggaran Siswa Berhasil");
			redirect("bimbingan_siswa");
		} elseif ($tipe = 'edit') {
			$where['id_bimbingan_siswa'] 	= $this->input->post('id_bimbingan_siswa');
			$send = $this->mailer->send($sendmail);
			$this->db->update("bimbingan_siswa", $in, $where);
			$this->session->set_flashdata("success", "Ubah Pelanggaran Siswa Berhasil");
			redirect("bimbingan_siswa");
		} else {
			redirect(base_url());
		}
	}

	public function bimbingan_siswa_hapus($id)
	{
		$where['id_bimbingan_siswa'] = $id;
		$this->db->delete("bimbingan_siswa", $where);
		$this->session->set_flashdata("success", "Hapus Pelanggaran Siswa Berhasil");
		redirect("bimbingan_siswa");
	}


}
