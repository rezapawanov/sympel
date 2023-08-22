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
			$this->load->Model('Combo_model');
		}
	}


	public function index()
	{
		redirect(base_url());
	}

	public function ajax_detail_buku()
	{
		$id_buku = $_GET['id_buku'];
		$get = $this->db->query("SELECT * FROM mst_buku 
									INNER JOIN mst_sumber ON mst_buku.id_sumber = mst_sumber.id_sumber 
									INNER JOIN mst_kategori ON mst_buku.id_kategori = mst_kategori.id_kategori WHERE id_buku = '$id_buku'")->row();

		if(!empty($get->foto_buku)) {
			$foto_buku = 'buku/'.$get->foto_buku;
		} else {
			$foto_buku = 'noimage.jpg';
		}

		echo 	'<div class"row">
				<div class="col-md-12 text-center">
					<a href="'.base_url().'/upload/'.$foto_buku.'" target="_blank"><img style="width:80px;height:120px;border:1px solid #ccc;" src="'.base_url().'/upload/'.$foto_buku.'"></a>
					<br><br>
				</div>
				</div>';
		echo '<div class="row">
				<div class="col-md-6">';

		echo '<table class="table table-bordered">
				<tbody>
					<tr>
						<td style="width:200px;">Kode Buku</td>
						<td style="width:20px;">:</td>
						<td>' . $get->kode_buku . '</td>
					</tr>
					<tr>
						<td>Judul Buku</td>
						<td>:</td>
						<td>' . $get->judul_buku . '</td>
					</tr>
					<tr>
						<td>Pengarang</td>
						<td>:</td>
						<td>' . $get->pengarang . '</td>
					</tr>
					<tr>
						<td>Tahun Terbit</td>
						<td>:</td>
						<td>' . $get->tahun_terbit . '</td>
					</tr>
					<tr>
						<td>Tempat Terbit</td>
						<td>:</td>
						<td>' . $get->tempat_terbit . '</td>
					</tr>
					<tr>
						<td>Total Halaman</td>
						<td>:</td>
						<td>' . $get->total_halaman . '</td>
					</tr>
					<tr>
						<td>Tinggi Buku</td>
						<td>:</td>
						<td>' . $get->tinggi_buku . '</td>
					</tr>
					<tr>
						<td>DDC</td>
						<td>:</td>
						<td>' . $get->ddc . '</td>
					</tr>
					
				</table>
				</div>
				<div class="col-md-6">
				<table class="table table-bordered">
					<tr>
						<td>ISBN</td>
						<td>:</td>
						<td>' . $get->isbn . '</td>
					</tr>
					<tr>
						<td>Jumlah Buku</td>
						<td>:</td>
						<td>' . $get->jumlah_buku . '</td>
					</tr>
					<tr>
						<td>Tanggal Masuk</td>
						<td>:</td>
						<td>' . $get->tanggal_masuk . '</td>
					</tr>
					<tr>
						<td>No Inventaris</td>
						<td>:</td>
						<td>' . $get->no_inventaris . '</td>
					</tr>
					<tr>
						<td>Lokasi Penyimpanan</td>
						<td>:</td>
						<td>' . $get->lokasi . '</td>
					</tr>
					<tr>
						<td>Sumber Buku</td>
						<td>:</td>
						<td>' . $get->nama_sumber . '</td>
					</tr>
					<tr>
						<td>Kategori Buku</td>
						<td>:</td>
						<td>' . $get->nama_kategori . '</td>
					</tr>
					<tr>
						<td>Deskripsi</td>
						<td>:</td>
						<td>' . $get->deskripsi_buku . '</td>
					</tr>
				</tbody>
			  </table>
			  </div>
			  </div>';
	}

	public function sumber()
	{
		$d['judul'] = "Data Sumber";
		$d['sumber'] = $this->Master_model->sumber();
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('sumber/sumber');
		$this->load->view('bottom');
	}

	public function sumber_tambah()
	{
		$d['judul'] = "Data Sumber";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['nama_sumber'] = "";
		$d['id_sumber'] = "";
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('sumber/sumber_tambah');
		$this->load->view('bottom');
	}


	public function sumber_edit($id_sumber)
	{
		$cek = $this->db->query("SELECT * FROM mst_sumber WHERE id_sumber = '$id_sumber'");
		if ($cek->num_rows() > 0) {
			$d['judul'] = "Data Sumber Buku";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$data = $cek->row();
			$d['nama_sumber'] = $data->nama_sumber;
			$d['id_sumber'] = $data->id_sumber;
			$this->load->view('top', $d);
			$this->load->view('menu');
			$this->load->view('sumber/sumber_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}
	}

	public function sumber_save()
	{
		$tipe = $this->input->post("tipe");
		$in['nama_sumber'] = $this->input->post("nama_sumber");
		if ($tipe == "add") {
			$this->db->insert("mst_sumber", $in);
			$this->session->set_flashdata("success", "Tambah Data Sumber Berhasil");
			redirect("master/sumber/");
		} elseif ($tipe = 'edit') {
			$where['id_sumber'] = $this->input->post('id_sumber');
			$this->db->update("mst_sumber", $in, $where);
			$this->session->set_flashdata("success", "Ubah Data Sumber Berhasil");
			redirect("master/sumber/");
		} else {
			redirect(base_url());
		}
	}

	public function sumber_hapus($id)
	{
		$where['id_sumber'] = $id;
		$this->db->delete("mst_sumber", $where);
		$this->session->set_flashdata("success", "Hapus Sumber Berhasil");
		redirect("master/sumber/");
	}


	public function kategori()
	{
		$d['judul'] = "Data Kategori";
		$d['kategori'] = $this->Master_model->kategori();
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('kategori/kategori');
		$this->load->view('bottom');
	}

	public function kategori_tambah()
	{
		$d['judul'] = "Data Kategori";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['nama_kategori'] = "";
		$d['id_kategori'] = "";
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('kategori/kategori_tambah');
		$this->load->view('bottom');
	}


	public function kategori_edit($id_kategori)
	{
		$cek = $this->db->query("SELECT * FROM mst_kategori WHERE id_kategori = '$id_kategori'");
		if ($cek->num_rows() > 0) {
			$d['judul'] = "Data Kategori Buku";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$data = $cek->row();
			$d['nama_kategori'] = $data->nama_kategori;
			$d['id_kategori'] = $data->id_kategori;
			$this->load->view('top', $d);
			$this->load->view('menu');
			$this->load->view('kategori/kategori_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}
	}

	public function kategori_save()
	{
		$tipe = $this->input->post("tipe");
		$in['nama_kategori'] = $this->input->post("nama_kategori");
		if ($tipe == "add") {
			$this->db->insert("mst_kategori", $in);
			$this->session->set_flashdata("success", "Tambah Data kategori Berhasil");
			redirect("master/kategori/");
		} elseif ($tipe = 'edit') {
			$where['id_kategori'] = $this->input->post('id_kategori');
			$this->db->update("mst_kategori", $in, $where);
			$this->session->set_flashdata("success", "Ubah Data kategori Berhasil");
			redirect("master/kategori/");
		} else {
			redirect(base_url());
		}
	}

	public function kategori_hapus($id)
	{
		$where['id_kategori'] = $id;
		$this->db->delete("mst_kategori", $where);
		$this->session->set_flashdata("success", "Hapus kategori Berhasil");
		redirect("master/kategori/");
	}



	public function buku()
	{
		$d['judul'] = "Data Buku";
		$d['buku'] = $this->Master_model->buku();
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('buku/buku');
		$this->load->view('bottom');
	}

	public function buku_tambah()
	{
		$d['judul'] = "Data Buku";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['id_buku'] = "";
		$d['kode_buku'] = "";
		$d['judul_buku'] = "";
		$d['pengarang'] = "";
		$d['penerbit'] = "";
		$d['tahun_terbit'] = "";
		$d['tempat_terbit'] = "";
		$d['total_halaman'] = "";
		$d['tinggi_buku'] = "";
		$d['ddc'] = "";
		$d['isbn'] = "";
		$d['jumlah_buku'] = "";
		$d['tanggal_masuk'] = "";
		$d['no_inventaris'] = "";
		$d['lokasi'] = "";
		$d['deskripsi_buku'] = "";
		$d['foto_buku'] = "";
		$d['combo_sumber'] = $this->Combo_model->combo_sumber();
		$d['combo_kategori'] = $this->Combo_model->combo_kategori();
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('buku/buku_tambah');
		$this->load->view('bottom');
	}


	public function buku_edit($id_buku)
	{
		$cek = $this->db->query("SELECT * FROM mst_buku WHERE id_buku = '$id_buku'");
		if ($cek->num_rows() > 0) {
			$d['judul'] = "Data  Buku";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$data = $cek->row();
			$d['id_buku'] = $data->id_buku;
			$d['kode_buku'] = $data->kode_buku;
			$d['judul_buku'] = $data->judul_buku;
			$d['pengarang'] = $data->pengarang;
			$d['penerbit'] = $data->penerbit;
			$d['tahun_terbit'] = $data->tahun_terbit;
			$d['tempat_terbit'] = $data->tempat_terbit;
			$d['total_halaman'] = $data->total_halaman;
			$d['tinggi_buku'] = $data->tinggi_buku;
			$d['ddc'] = $data->ddc;
			$d['isbn'] = $data->isbn;
			$d['jumlah_buku'] = $data->jumlah_buku;
			$d['tanggal_masuk'] = date("d-m-Y", strtotime($data->tanggal_masuk));
			$d['no_inventaris'] = $data->no_inventaris;
			$d['lokasi'] = $data->lokasi;
			$d['deskripsi_buku'] = $data->deskripsi_buku;
			$d['foto_buku'] = $data->foto_buku;
			$d['combo_sumber'] = $this->Combo_model->combo_sumber($data->id_sumber);
			$d['combo_kategori'] = $this->Combo_model->combo_kategori($data->id_kategori);
			$this->load->view('top', $d);
			$this->load->view('menu');
			$this->load->view('buku/buku_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}
	}

	public function buku_save()
	{
		$tipe = $this->input->post("tipe");
		$in['kode_buku'] = $this->input->post("kode_buku");
		$in['judul_buku'] = $this->input->post("judul_buku");
		$in['pengarang'] = $this->input->post("pengarang");
		$in['penerbit'] = $this->input->post("penerbit");
		$in['tahun_terbit'] = $this->input->post("tahun_terbit");
		$in['tempat_terbit'] = $this->input->post("tempat_terbit");
		$in['total_halaman'] = $this->input->post("total_halaman");
		$in['tinggi_buku'] = $this->input->post("tinggi_buku");
		$in['ddc'] = $this->input->post("ddc");
		$in['isbn'] = $this->input->post("isbn");
		$in['jumlah_buku'] = $this->input->post("jumlah_buku");
		$in['tanggal_masuk'] = date("Y-m-d", strtotime($this->input->post("tanggal_masuk")));
		$in['no_inventaris'] = $this->input->post("no_inventaris");
		$in['lokasi'] = $this->input->post("lokasi");
		$in['deskripsi_buku'] = $this->input->post("deskripsi_buku");
		$in['id_sumber'] = $this->input->post("id_sumber");
		$in['id_kategori'] = $this->input->post("id_kategori");

		$config['upload_path'] = './upload/buku';
		$config['allowed_types'] = 'jpg|png';
		$config['encrypt_name']	= TRUE;
		$config['remove_spaces']	= TRUE;
		$config['max_size']     = '0';
		$config['max_width']  	= '0';
		$config['max_height']  	= '0';

		$this->load->library('upload', $config);


		if ($tipe == "add") {
			if (!empty($_FILES['foto_buku']['name'])) {
				if ($this->upload->do_upload("foto_buku")) {
					$data	 	= $this->upload->data();
					$in['foto_buku'] = $data['file_name'];
					$this->db->insert("mst_buku", $in);
					$this->session->set_flashdata("success", "Tambah Data Buku Berhasil");
					redirect("master/buku/");
				} else {
					$this->session->set_flashdata("error", $this->upload->display_errors());
					redirect("master/buku_tambah/");
				}
			} else {
				$this->db->insert("mst_buku", $in);
				$this->session->set_flashdata("success", "Tambah Data Buku Berhasil");
				redirect("master/buku/");
			}
		} elseif ($tipe = 'edit') {
			$where['id_buku'] 	= $this->input->post('id_buku');
			if (!empty($_FILES['foto_buku']['name'])) {
				if ($this->upload->do_upload("foto_buku")) {
					$data	 	= $this->upload->data();
					$in['foto_buku'] = $data['file_name'];
					$this->db->update("mst_buku", $in, $where);
					@unlink("./upload/buku/" . $this->input->post("foto_lama"));
					$this->session->set_flashdata("success", "Ubah Data Buku Berhasil");
					redirect("master/buku/");
				} else {
					$this->session->set_flashdata("error", $this->upload->display_errors());
					redirect("master/buku_edit/" . $where['id_buku']);
				}
			} else {
				$this->db->update("mst_buku", $in, $where);
				$this->session->set_flashdata("success", "Ubah Data Buku Berhasil");
				redirect("master/buku/");
			}
		} else {
			redirect(base_url());
		}
	}

	public function buku_hapus($id)
	{
		$where['id_buku'] = $id;
		$this->db->delete("mst_buku", $where);
		$this->session->set_flashdata("success", "Hapus Data Buku Berhasil");
		redirect("master/buku/");
	}
}
