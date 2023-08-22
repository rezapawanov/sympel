<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('hak_akses') != "admin" && $this->session->userdata('hak_akses') != "gurubk" && $this->session->userdata('hak_akses') != "guru") {
			redirect(base_url());
		} else {
			$this->load->Model('Peminjaman_siswa_model');
			$this->load->Model('Combo_model');
		}
	}



	public function index()
	{
		$d['judul'] = "Data Peminjaman";
		$get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();
		$d['peminjaman'] = $this->Peminjaman_siswa_model->peminjaman($get_tahun->tahun_ajaran);
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('peminjaman/peminjaman');
		$this->load->view('bottom');
	}

	

	public function peminjaman_siswa_tambah()
	{
		$d['judul'] = "Data Peminjaman Siswa";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['tanggal_pinjam'] = "";
		$d['id_peminjaman_siswa'] = '';
		$d['keterangan_pinjam'] = '';
		$d['siswa'] = '';
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('peminjaman/peminjaman_tambah');
		$this->load->view('bottom');
	}

	public function peminjaman_siswa_edit($id_peminjaman_siswa)
	{
		$cek = $this->db->query("SELECT id_peminjaman_siswa FROM peminjaman_siswa WHERE id_peminjaman_siswa = '$id_peminjaman_siswa'");
		if ($cek->num_rows() > 0) {
			$d['judul'] = "Data Pelanggaran Siswa";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$get = $this->db->query("SELECT id_peminjaman_siswa,peminjaman_siswa.id_siswa, nama_kelas, nama_siswa, tanggal_pinjam, keterangan_pinjam FROM peminjaman_siswa 
										INNER JOIN mst_siswa ON peminjaman_siswa.id_siswa = mst_siswa.id_siswa 
										INNER JOIN mst_kelas ON peminjaman_siswa.id_kelas = mst_kelas.id_kelas WHERE id_peminjaman_siswa = '$id_peminjaman_siswa'");
			$data = $get->row();
			$d['siswa'] = $data->id_siswa.'-'.$data->nama_siswa.'-'.$data->nama_kelas;
			$d['id_peminjaman_siswa'] = $data->id_peminjaman_siswa;
			$d['tanggal_pinjam'] = date("d-m-Y",strtotime($data->tanggal_pinjam));
			$d['keterangan_pinjam'] = $data->keterangan_pinjam;
			$this->load->view('top', $d);
			$this->load->view('menu');
			$this->load->view('peminjaman/peminjaman_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}
	}


	public function peminjaman_siswa_save()
	{
		$tipe = $this->input->post("tipe");

		$get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();

		$ex = explode("-",$this->input->post("id_siswa"));
		$in['id_siswa'] = $ex[0];
		$in['id_penginput'] = $this->session->userdata("id");
		$in['tahun_ajaran'] = $get_tahun->tahun_ajaran;
		$in['keterangan_pinjam'] = $this->input->post("keterangan_pinjam");
		$in['tanggal_pinjam'] = date("Y-m-d", strtotime($this->input->post('tanggal_pinjam')));
		if ($tipe == "add") {
			$get_kelas = $this->db->query("SELECT id_kelas FROM mst_siswa WHERE id_siswa = '$in[id_siswa]'")->row();
			$in['id_kelas'] = $get_kelas->id_kelas;
			$this->db->insert("peminjaman_siswa", $in);
			$this->session->set_flashdata("success", "Tambah Peminjaman Siswa Berhasil");
			redirect("peminjaman");
		} elseif ($tipe = 'edit') {
			$where['id_peminjaman_siswa'] 	= $this->input->post('id_peminjaman_siswa');
			$this->db->update("peminjaman_siswa", $in, $where);
			$this->session->set_flashdata("success", "Ubah peminjaman Siswa Berhasil");
			redirect("peminjaman");
		} else {
			redirect(base_url());
		}
	}

	public function peminjaman_siswa_hapus($id)
	{
		$where['id_peminjaman_siswa'] = $id;
		$this->db->delete("peminjaman_siswa", $where);
		$this->session->set_flashdata("success", "Hapus Peminjaman Siswa Berhasil");
		redirect("peminjaman");
	}
}
