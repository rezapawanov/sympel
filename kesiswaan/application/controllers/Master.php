<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('hak_akses') != "admin" && $this->session->userdata('hak_akses') != "gurubk" && $this->session->userdata('hak_akses') != "guru") {
			redirect(base_url());
		} else {
			$this->load->Model('Master_model');
		}
	}


	public function index()
	{
		redirect(base_url());
	}


	public function get_poin_pelanggaran()
	{
		$id_poin_pelanggaran = $_GET['id_poin_pelanggaran'];
		$get = $this->db->query("SELECT * FROM mst_poin_pelanggaran WHERE id_poin_pelanggaran = '$id_poin_pelanggaran'")->row();
		echo $get->poin;
	}


	public function sanksi()
	{
		$d['judul'] = "Data Sanksi";
		$d['sanksi'] = $this->Master_model->sanksi();
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('sanksi/sanksi');
		$this->load->view('bottom');
	}

	public function sanksi_tambah()
	{
		$d['judul'] = "Data Sanksi";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['dari_poin'] = "";
		$d['sampai_poin'] = "";
		$d['sanksi'] = "";
		$d['id_sanksi'] = "";
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('sanksi/sanksi_tambah');
		$this->load->view('bottom');
	}


	public function sanksi_edit($id_sanksi)
	{
		$cek = $this->db->query("SELECT * FROM mst_sanksi WHERE id_sanksi = '$id_sanksi'");
		if ($cek->num_rows() > 0) {
			$d['judul'] = "Data Sanksi";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$data = $cek->row();
			$d['dari_poin'] = $data->dari_poin;
			$d['sampai_poin'] = $data->sampai_poin;
			$d['sanksi'] = $data->sanksi;
			$d['id_sanksi'] = $data->id_sanksi;
			$this->load->view('top', $d);
			$this->load->view('menu');
			$this->load->view('sanksi/sanksi_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}
	}

	public function sanksi_save()
	{
		$tipe = $this->input->post("tipe");
		$in['dari_poin'] = $this->input->post("dari_poin");
		$in['sampai_poin'] = $this->input->post("sampai_poin");
		$in['sanksi'] = $this->input->post("sanksi");
		if ($tipe == "add") {
			$this->db->insert("mst_sanksi", $in);
			$this->session->set_flashdata("success", "Tambah Data Sanksi Berhasil");
			redirect("master/sanksi/");
		} elseif ($tipe = 'edit') {
			$where['id_sanksi'] = $this->input->post('id_sanksi');
			$this->db->update("mst_sanksi", $in, $where);
			$this->session->set_flashdata("success", "Ubah Data Sanksi Berhasil");
			redirect("master/sanksi/");
		} else {
			redirect(base_url());
		}
	}

	public function sanksi_hapus($id)
	{
		$where['id_sanksi'] = $id;
		$this->db->delete("mst_sanksi", $where);
		$this->session->set_flashdata("success", "Hapus Sanksi Berhasil");
		redirect("master/sanksi/");
	}



	public function poin_pelanggaran()
	{
		$d['judul'] = "Data Poin Pelanggaran";
		$d['poin_pelanggaran'] = $this->Master_model->poin_pelanggaran();
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('poin_pelanggaran/poin_pelanggaran');
		$this->load->view('bottom');
	}



	public function poin_pelanggaran_tambah()
	{
		$d['judul'] = "Data Poin Pelanggaran";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['nama_poin_pelanggaran'] = "";
		$d['poin'] = "";
		$d['id_poin_pelanggaran'] = "";
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('poin_pelanggaran/poin_pelanggaran_tambah');
		$this->load->view('bottom');
	}


	public function poin_pelanggaran_edit($id_poin_pelanggaran)
	{
		$cek = $this->db->query("SELECT id_poin_pelanggaran FROM mst_poin_pelanggaran WHERE id_poin_pelanggaran = '$id_poin_pelanggaran'");
		if ($cek->num_rows() > 0) {
			$d['judul'] = "Data Poin Pelanggaran";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$get = $this->Master_model->poin_pelanggaran_edit($id_poin_pelanggaran);
			$data = $get->row();
			$d['nama_poin_pelanggaran'] = $data->nama_poin_pelanggaran;
			$d['poin'] = $data->poin;
			$d['id_poin_pelanggaran'] = $data->id_poin_pelanggaran;
			$this->load->view('top', $d);
			$this->load->view('menu');
			$this->load->view('poin_pelanggaran/poin_pelanggaran_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}
	}

	public function poin_pelanggaran_save()
	{
		$tipe = $this->input->post("tipe");
		$in['nama_poin_pelanggaran'] = $this->input->post("nama_poin_pelanggaran");
		$in['poin'] = $this->input->post("poin");
		if ($tipe == "add") {
			$cek = $this->db->query("SELECT nama_poin_pelanggaran FROM mst_poin_pelanggaran WHERE nama_poin_pelanggaran = '$in[nama_poin_pelanggaran]'");
			if ($cek->num_rows() > 0) {
				$this->session->set_flashdata("error", "Gagal Input. Nama Poin Pelanggaran Sudah Digunakan");
				redirect("master/poin_pelanggaran_tambah/");
			} else {
				$this->db->insert("mst_poin_pelanggaran", $in);
				$this->session->set_flashdata("success", "Tambah Data Poin Pelanggaran Berhasil");
				redirect("master/poin_pelanggaran/");
			}
		} elseif ($tipe = 'edit') {
			$where['id_poin_pelanggaran'] 	= $this->input->post('id_poin_pelanggaran');
			$cek = $this->db->query("SELECT nama_poin_pelanggaran FROM mst_poin_pelanggaran WHERE nama_poin_pelanggaran = '$in[nama_poin_pelanggaran]' AND id_poin_pelanggaran != '$where[id_poin_pelanggaran]'");
			if ($cek->num_rows() > 0) {
				$this->session->set_flashdata("error", "Gagal Input. Nama Poin Pelanggaran Sudah Digunakan");
				redirect("master/poin_pelanggaran_edit/" . $this->input->post("id_poin_pelanggaran"));
			} else {
				$this->db->update("mst_poin_pelanggaran", $in, $where);
				$this->session->set_flashdata("success", "Ubah Data Poin Pelanggaran Berhasil");
				redirect("master/poin_pelanggaran/");
			}
		} else {
			redirect(base_url());
		}
	}

	public function poin_pelanggaran_hapus($id)
	{
		$where['id_poin_pelanggaran'] = $id;
		$this->db->delete("mst_poin_pelanggaran", $where);
		$this->session->set_flashdata("success", "Hapus Poin Pelanggaran Berhasil");
		redirect("master/poin_pelanggaran/");
	}


	public function poin_import()
	{
		if ($this->session->userdata('hak_akses') != "") {
			$unggah['upload_path']   = './upload/';
			$unggah['allowed_types'] = 'xlsx';
			$unggah['file_name']     = 'poin_import';
			$unggah['overwrite']     = true;
			$unggah['max_size']      = 5120;

			$this->upload->initialize($unggah);
			if ($this->upload->do_upload('file_import')) {
				$file_excel = new unggahexcel('upload/poin_import.xlsx', null);

				if (count($file_excel->Sheets()) == 1) {
					$baris = 1;

					foreach ($file_excel as $kolom) {
						if ($baris >= 2) {
							$in['nama_poin_pelanggaran'] = $kolom[0];
							$in['poin'] = $kolom[1];
							$this->db->insert("mst_poin_pelanggaran", $in);
						}
						$baris++;
					}

					$this->session->set_flashdata("success", "Berhasil Import Data Poin Pelanggaran");
				} else {
					$this->session->set_flashdata("error", "Gagal Import Data");
				}
			} else {
				$this->session->set_flashdata("error", $this->upload->display_errors());
			}
			unlink('./upload/poin_import.xlsx');
			redirect("master/poin_pelanggaran");
		} else {
			redirect(base_url());
		}
	}
}
