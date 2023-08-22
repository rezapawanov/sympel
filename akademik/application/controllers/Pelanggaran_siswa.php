<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggaran_siswa extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('hak_akses') != "admin" && $this->session->userdata('hak_akses') != "gurubk" && $this->session->userdata('hak_akses') != "guru") {
			redirect(base_url());
		} else {
			$this->load->Model('Pelanggaran_siswa_model');
			$this->load->Model('Combo_model');
		}
	}



	public function index()
	{
		$d['judul'] = "Data Pelanggaran Siswa";
		$get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();
		$d['pelanggaran_siswa'] = $this->Pelanggaran_siswa_model->pelanggaran_siswa($get_tahun->tahun_ajaran);
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('pelanggaran_siswa/pelanggaran_siswa');
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


	public function pelanggaran_siswa_detail($id_siswa)
	{
		$cek = $this->db->query("SELECT * FROM mst_siswa INNER JOIN mst_kelas ON mst_siswa.id_kelas = mst_kelas.id_kelas WHERE id_siswa = '$id_siswa'");
		if($cek->num_rows() > 0) {
			$data = $cek->row();
			$get = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
			$d['nama_sekolah'] = $get->nama_sekolah;
			$d['alamat_sekolah'] = $get->alamat;
			$d['website'] = $get->website;
			$get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();
			$d['judul'] = "Detail Pelanggaran Siswa";
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
			$d['pelanggaran_siswa'] = $this->Pelanggaran_siswa_model->pelanggaran_siswa_id($id_siswa, $get_tahun->tahun_ajaran);
			$this->load->view('top', $d);
			$this->load->view('menu');
			$this->load->view('pelanggaran_siswa/pelanggaran_siswa_detail');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}
	}

	public function pelanggaran_siswa_tambah()
	{
		$d['judul'] = "Data Pelanggaran Siswa";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['tanggal'] = "";
		$d['id_pelanggaran_siswa'] = '';
		$d['siswa'] = '';
		$d['poin_pelanggaran'] = '';
		$d['combo_pelanggaran'] = $this->Combo_model->combo_pelanggaran();
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('pelanggaran_siswa/pelanggaran_siswa_tambah');
		$this->load->view('bottom');
	}


	public function pelanggaran_siswa_edit($id_pelanggaran_siswa)
	{
		$cek = $this->db->query("SELECT id_pelanggaran_siswa FROM pelanggaran_siswa WHERE id_pelanggaran_siswa = '$id_pelanggaran_siswa'");
		if ($cek->num_rows() > 0) {
			$d['judul'] = "Data Pelanggaran Siswa";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$get = $this->Pelanggaran_siswa_model->pelanggaran_siswa_edit($id_pelanggaran_siswa);
			$data = $get->row();
			$d['siswa'] = $data->id_siswa.'-'.$data->nama_siswa.'-'.$data->nama_kelas;
			$d['id_pelanggaran_siswa'] = $data->id_pelanggaran_siswa;
			$d['poin_pelanggaran'] = $data->poin_minus;
			$d['tanggal'] = date("d-m-Y",strtotime($data->tanggal));
			$d['combo_pelanggaran'] = $this->Combo_model->combo_pelanggaran($data->id_poin_pelanggaran);
			$this->load->view('top', $d);
			$this->load->view('menu');
			$this->load->view('pelanggaran_siswa/pelanggaran_siswa_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}
	}

	public function pelanggaran_siswa_save()
	{
		$tipe = $this->input->post("tipe");

		$get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();

		$ex = explode("-",$this->input->post("id_siswa"));
		$in['id_poin_pelanggaran'] = $this->input->post("id_poin_pelanggaran");
		$in['id_siswa'] = $ex[0];
		$in['id_penginput'] = $this->session->userdata("id");
		$in['tahun_ajaran'] = $get_tahun->tahun_ajaran;
		$in['tanggal'] = date("Y-m-d", strtotime($this->input->post('tanggal')));
		$get_poin = $this->db->query("SELECT poin FROM mst_poin_pelanggaran WHERE id_poin_pelanggaran = '$in[id_poin_pelanggaran]'")->row();
		$in['poin_minus'] = $get_poin->poin;
		if ($tipe == "add") {
			$get_kelas = $this->db->query("SELECT id_kelas FROM mst_siswa WHERE id_siswa = '$in[id_siswa]'")->row();
			$in['id_kelas'] = $get_kelas->id_kelas;
			$this->db->insert("pelanggaran_siswa", $in);
			$this->session->set_flashdata("success", "Tambah  Pelanggaran Siswa Berhasil");
			redirect("pelanggaran_siswa");
		} elseif ($tipe = 'edit') {
			$where['id_pelanggaran_siswa'] 	= $this->input->post('id_pelanggaran_siswa');
			$this->db->update("pelanggaran_siswa", $in, $where);
			$this->session->set_flashdata("success", "Ubah Pelanggaran Siswa Berhasil");
			redirect("pelanggaran_siswa");
		} else {
			redirect(base_url());
		}
	}

	public function pelanggaran_siswa_hapus($id)
	{
		$where['id_pelanggaran_siswa'] = $id;
		$this->db->delete("pelanggaran_siswa", $where);
		$this->session->set_flashdata("success", "Hapus Pelanggaran Siswa Berhasil");
		redirect("pelanggaran_siswa");
	}
}
