<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('tipe') != "root") {
			redirect("../" . $this->session->userdata('tipe'));
		} else {
			$this->load->Model('Master_model');
		}
	}


	public function index()
	{
		redirect(base_url());
	}


	public function jabatan()
	{
		$d['judul'] = "Data Jabatan";
		$d['jabatan'] = $this->Master_model->jabatan();
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('jabatan/jabatan');
		$this->load->view('bottom');
	}

	public function pemeliharaan()
	{
		$d['judul'] = "Backup Database";
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('pemeliharaan/pemeliharaan');
		$this->load->view('bottom');
	}

	public function identitas_sekolah()
	{
		$cek = $this->db->query("SELECT * FROM mst_sekolah ");
		if ($cek->num_rows() > 0) {
			$d['judul'] = "Identitas Sekolah";
			$d['judul2'] = "Ubah";
			$data = $cek->row();
			$d['nama_sekolah'] = $data->nama_sekolah;
			$d['npsn'] = $data->npsn;
			$d['nss'] = $data->nss;
			$d['provinsi'] = $data->provinsi;
			$d['kabupaten'] = $data->kabupaten;
			$d['kecamatan'] = $data->kecamatan;
			$d['kelurahan'] = $data->kelurahan;
			$d['kodepos'] = $data->kodepos;
			$d['alamat'] = $data->alamat;
			$d['no_telepon'] = $data->no_telepon;
			$d['website'] = $data->website;
			$d['email'] = $data->email;
			$d['logo'] = $data->logo;
			$d['wa'] = $data->wa;
			$d['fb'] = $data->fb;
			$d['ig'] = $data->ig;
			$d['youtube'] = $data->youtube;
			$this->load->view('top', $d);
			$this->load->view('menu');
			$this->load->view('identitas_sekolah/identitas_sekolah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}
	}


	public function identitas_sekolah_save()
	{
		$where['id'] = 1;
		$in['nama_sekolah'] = $this->input->post("nama_sekolah");
		$in['npsn'] = $this->input->post("npsn");
		$in['nss'] = $this->input->post("nss");
		$in['provinsi'] = $this->input->post("provinsi");
		$in['kabupaten'] = $this->input->post("kabupaten");
		$in['kecamatan'] = $this->input->post("kecamatan");
		$in['kelurahan'] = $this->input->post("kelurahan");
		$in['kodepos'] = $this->input->post("kodepos");
		$in['alamat'] = $this->input->post("alamat");
		$in['no_telepon'] = $this->input->post("no_telepon");
		$in['website'] = $this->input->post("website");
		$in['email'] = $this->input->post("email");
		$in['wa'] = $this->input->post("wa");
		$in['fb'] = $this->input->post("fb");
		$in['ig'] = $this->input->post("ig");
		$in['youtube'] = $this->input->post("youtube");

		$config['upload_path'] = './upload/';
		$config['allowed_types'] = 'jpg|png';
		$config['encrypt_name']	= TRUE;
		$config['remove_spaces']	= TRUE;
		$config['max_size']     = '0';
		$config['max_width']  	= '0';
		$config['max_height']  	= '0';

		$this->load->library('upload', $config);


		if(!empty($_FILES['logo']['name'])) {
			if($this->upload->do_upload("logo")) {
				$data	 	= $this->upload->data();
				$in['logo'] = $data['file_name'];	
				$this->db->update("mst_sekolah", $in, $where);
				@unlink("./upload/".$this->input->post("logo_lama"));
				$this->session->set_flashdata("success","Update Identitas Sekolah Berhasil");
				redirect("master/identitas_sekolah/");	
			} else {
				$this->session->set_flashdata("error",$this->upload->display_errors());
				redirect("master/identitas_sekolah/");	
			}
		} else {
			$this->session->set_flashdata("success","Update Identitas Sekolah Berhasil");
			$this->db->update("mst_sekolah", $in, $where);
			redirect("master/identitas_sekolah/");
		}
	}
}
