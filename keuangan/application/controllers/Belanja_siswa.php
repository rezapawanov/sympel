<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Belanja_siswa extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('hak_akses') != "admin" && $this->session->userdata('hak_akses') != "kantin" && $this->session->userdata('hak_akses') != "guru") {
			redirect(base_url());
		} else {
			$this->load->Model('Belanja_siswa_model');
			$this->load->Model('Combo_model');
		}
	}



	public function index()
	{
		$d['judul'] = "Data Belanja Siswa";
		$get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();
		$d['belanja_siswa'] = $this->Belanja_siswa_model->belanja_siswa($get_tahun->tahun_ajaran);
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('belanja_siswa/belanja_siswa');
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


	public function belanja_siswa_detail($id_siswa)
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
			$d['belanja_siswa'] = $this->Belanja_siswa_model->belanja_siswa_id($id_siswa, $get_tahun->tahun_ajaran);
			$this->load->view('top', $d);
			$this->load->view('menu');
			$this->load->view('belanja_siswa/belanja_siswa_detail');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}
	}

	public function belanja_siswa_tambah()
	{
		$d['judul'] = "Data Pelanggaran Siswa";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['tanggal'] = "";
		$d['id_belanja_siswa'] = '';
		$d['siswa'] = '';
		$d['harga'] = '';
		
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('belanja_siswa/belanja_siswa_tambah');
		$this->load->view('bottom');
	}


	public function belanja_siswa_edit($id_belanja_siswa)
	{
		$cek = $this->db->query("SELECT id_belanja_siswa FROM belanja_siswa WHERE id_belanja_siswa = '$id_belanja_siswa'");
		if ($cek->num_rows() > 0) {
			$d['judul'] = "Data Pelanggaran Siswa";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$get = $this->Belanja_siswa_model->belanja_siswa_edit($id_belanja_siswa);
			$data = $get->row();
			$d['siswa'] = $data->id_siswa.'-'.$data->nama_siswa.'-'.$data->nama_kelas;
			$d['id_belanja_siswa'] = $data->id_belanja_siswa;
			$d['tanggal'] = date("d-m-Y",strtotime($data->tanggal));
			$d['harga'] ='';
			$this->load->view('top', $d);
			$this->load->view('menu');
			$this->load->view('belanja_siswa/belanja_siswa_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}
	}

	public function belanja_siswa_save()
	{
		$tipe = $this->input->post("tipe");

		$get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();

		$ex = explode("-",$this->input->post("id_siswa"));
		$id_belanja_siswa = $this->input->post("id_belanja_siswa");
		$id_siswa = $ex[0];
		$id_penginput = $this->session->userdata("id");
		$tahun_ajaran = $get_tahun->tahun_ajaran;
		$tanggal = date("Y-m-d", strtotime($this->input->post('tanggal')));
		$harga = $this->input->post("harga");
		if ($tipe == "add") {
			$get_kelas = $this->db->query("SELECT id_kelas FROM mst_siswa WHERE id_siswa = '$id_siswa[id_siswa]'")->row();
			$id_kelas = $get_kelas->id_kelas;
			$data = array(
				'id_belanja_siswa'=> $id_belanja_siswa,
				'id_siswa'=> $id_siswa,
				'id_penginput'=> $id_penginput,
				'tahun_ajaran'=> $tahun_ajaran,
				'tanggal'=> $tanggal,
				'harga'=> $harga,
				'id_kelas' => $id_kelas,
			);
			$this->db->insert("belanja_siswa", $data);
			$this->db->query("UPDATE mst_user SET saldo=saldo+'$harga' WHERE id_user='$id_penginput'");
			$this->db->query("UPDATE tabungan_siswa SET saldo=saldo-'$harga', pengeluaran=pengeluaran+'$harga' WHERE id_siswa='$id_siswa'");
			$this->session->set_flashdata("success", "Tambah  Belanja Siswa Berhasil");
			redirect("belanja_siswa");
		} elseif ($tipe = 'edit') {
			$get_kelas = $this->db->query("SELECT id_kelas FROM mst_siswa WHERE id_siswa = '$id_siswa[id_siswa]'")->row();
			$id_kelas = $get_kelas->id_kelas;
			$data = array(
				'id_belanja_siswa'=> $id_belanja_siswa,
				'id_siswa'=> $id_siswa,
				'id_penginput'=> $id_penginput,
				'tahun_ajaran'=> $tahun_ajaran,
				'tanggal'=> $tanggal,
				'harga'=> $harga,
				'id_kelas' => $id_kelas,
			);
			$where['id_belanja_siswa'] 	= $this->input->post('id_belanja_siswa');
			$this->db->update("belanja_siswa", $data, $where);
			$this->db->query("UPDATE tabungan_siswa SET saldo=saldo-'$harga', pengeluaran=pengeluaran+'$harga' WHERE id_siswa='$id_siswa'");
			$this->session->set_flashdata("success", "Ubah Pelanggaran Siswa Berhasil");
			redirect("belanja_siswa");
		} else {
			redirect(base_url());
		}
	}

	public function belanja_siswa_hapus($id)
	{
		$where['id_belanja_siswa'] = $id;
		$this->db->delete("belanja_siswa", $where);
		$this->session->set_flashdata("success", "Hapus Pelanggaran Siswa Berhasil");
		redirect("belanja_siswa");
	}
}
