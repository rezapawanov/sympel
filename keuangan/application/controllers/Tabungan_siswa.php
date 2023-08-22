<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tabungan_siswa extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('hak_akses') != "admin" && $this->session->userdata('hak_akses') != "gurubk" && $this->session->userdata('hak_akses') != "guru") {
			redirect(base_url());
		} else {
			$this->load->Model('Tabungan_siswa_model');
			$this->load->Model('Combo_model');
		}
	}



	public function index()
	{
		$d['judul'] = "Data Tabungan Siswa";
		$get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();
		$d['tabungan_siswa'] = $this->Tabungan_siswa_model->tabungan_siswa($get_tahun->tahun_ajaran);
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('tabungan_siswa/tabungan_siswa');
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


	public function tabungan_siswa_detail($id_siswa)
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
			$d['tabungan_siswa'] = $this->Tabungan_siswa_model->tabungan_siswa_id($id_siswa, $get_tahun->tahun_ajaran);
			$d['total'] = $this->Tabungan_siswa_model->total($id_siswa, $get_tahun->tahun_ajaran);
			$d['belanja_siswa'] = $this->Tabungan_siswa_model->belanja_siswa_id($id_siswa, $get_tahun->tahun_ajaran);

			$this->load->view('top', $d);
			$this->load->view('menu');
			$this->load->view('tabungan_siswa/tabungan_siswa_detail');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}
	}

	public function tabungan_siswa_tambah()
	{
		$d['judul'] = "Data Pelanggaran Siswa";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['tanggal'] = "";
		$d['id_tabungan_siswa'] = '';
		$d['siswa'] = '';
		$d['saldo'] = '';
		$d['pengeluaran'] = '';
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('tabungan_siswa/tabungan_siswa_tambah');
		$this->load->view('bottom');
	}


	public function tabungan_siswa_edit($id_tabungan_siswa)
	{
		$cek = $this->db->query("SELECT id_tabungan_siswa FROM tabungan_siswa WHERE id_tabungan_siswa = '$id_tabungan_siswa'");
		if ($cek->num_rows() > 0) {
			$d['judul'] = "Data Pelanggaran Siswa";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$get = $this->Tabungan_siswa_model->tabungan_siswa_edit($id_tabungan_siswa);
			$data = $get->row();
			$d['siswa'] = $data->id_siswa.'-'.$data->nama_siswa.'-'.$data->nama_kelas;
			$d['id_tabungan_siswa'] = $data->id_tabungan_siswa;
			$d['pengeluaran'] = $data->pengeluaran;
			$d['tanggal'] = date("d-m-Y",strtotime($data->tanggal));
			$d['saldo'] ='';
			$this->load->view('top', $d);
			$this->load->view('menu');
			$this->load->view('tabungan_siswa/tabungan_siswa_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}
	}

	public function tabungan_siswa_save()
	{
		$tipe = $this->input->post("tipe");

		$get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();

		$ex = explode("-",$this->input->post("id_siswa"));
		$id_tabungan_siswa = $this->input->post("id_tabungan_siswa");
		$id_siswa = $ex[0];
		$id_penginput = $this->session->userdata("id");
		$tahun_ajaran = $get_tahun->tahun_ajaran;
		$tanggal = date("Y-m-d", strtotime($this->input->post('tanggal')));
		$saldo = $this->input->post("saldo");
		if ($tipe == "add") {
			$cek = $this->db->query("SELECT id_siswa FROM tabungan_siswa WHERE id_siswa = '$id_siswa[id_siswa]'");
			if ($cek->num_rows() > 0) {


				
			$get_kelas = $this->db->query("SELECT id_kelas FROM mst_siswa WHERE id_siswa = '$id_siswa[id_siswa]'")->row();
			$id_kelas = $get_kelas->id_kelas;
			$data = array(
				'id_tabungan_siswa'=> $id_tabungan_siswa,
				'id_siswa'=> $id_siswa,
				'id_penginput'=> $id_penginput,
				'tahun_ajaran'=> $tahun_ajaran,
				'tanggal'=> $tanggal,
				'saldo'=> $saldo,
				'id_kelas' => $id_kelas,
			);
			$this->db->insert("dt_tabungan_siswa", $data);
			$this->db->query("UPDATE tabungan_siswa SET saldo=saldo+'$saldo' WHERE id_siswa='$id_siswa'");
			$this->session->set_flashdata("success", "Tambah  Tabungan Siswa Berhasil");
			redirect("tabungan_siswa");

			
			} else {

			$get_kelas = $this->db->query("SELECT id_kelas FROM mst_siswa WHERE id_siswa = '$id_siswa[id_siswa]'")->row();
			$id_kelas = $get_kelas->id_kelas;
			$data = array(
				'id_tabungan_siswa'=> $id_tabungan_siswa,
				'id_siswa'=> $id_siswa,
				'id_penginput'=> $id_penginput,
				'tahun_ajaran'=> $tahun_ajaran,
				'tanggal'=> $tanggal,
				'saldo'=> $saldo,
				'id_kelas' => $id_kelas,
			);
			$this->db->insert("tabungan_siswa", $data);
			$this->session->set_flashdata("success", "Tambah  Tabungan Siswa Berhasil");
			redirect("tabungan_siswa");
		}

		} elseif ($tipe = 'edit') {
			$where['id_tabungan_siswa'] 	= $this->input->post('id_tabungan_siswa');
			$this->db->update("tabungan_siswa", $in, $where);
			$this->session->set_flashdata("success", "Ubah Pelanggaran Siswa Berhasil");
			redirect("tabungan_siswa");
		} else {
			redirect(base_url());
		}
	}

	public function tabungan_siswa_hapus($id)
	{
		$where['id_tabungan_siswa'] = $id;
		$this->db->delete("tabungan_siswa", $where);
		$this->session->set_flashdata("success", "Hapus Pelanggaran Siswa Berhasil");
		redirect("tabungan_siswa");
	}
}
