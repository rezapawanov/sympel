<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->Model('Master_model');
			$this->load->Model('Combo_model');
	}


	public function index()
	{
		redirect(base_url());
	}


	

	public function ajax_detail_buku()
	{
		$id_buku = $_GET['id_buku'];
		$get = $this->db->query("SELECT * FROM mst_buku 
									LEFT JOIN mst_sumber ON mst_buku.id_sumber = mst_sumber.id_sumber 
									LEFT JOIN mst_kategori ON mst_buku.id_kategori = mst_kategori.id_kategori WHERE id_buku = '$id_buku'")->row();

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

		echo '<table class="table table-bordered table-sm">
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
				<table class="table table-bordered table-sm">
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






	public function ajax_detail_book()
	{
		$id_buku = $_GET['id_buku'];
		$get = $this->db->query("SELECT * FROM mst_book 
									LEFT JOIN mst_sumber ON mst_book.id_sumber = mst_sumber.id_sumber 
									LEFT JOIN mst_kategori ON mst_book.id_kategori = mst_kategori.id_kategori WHERE id_buku = '$id_buku'")->row();

		if(!empty($get->foto_buku)) {
			$foto_buku = 'book/'.$get->foto_buku;
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

		echo '<table class="table table-bordered table-sm">
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
						<td>DDC</td>
						<td>:</td>
						<td>' . $get->ddc . '</td>
					</tr>
					
				</table>
				</div>
				<div class="col-md-6">
				<table class="table table-bordered table-sm">
					<tr>
						<td>ISBN</td>
						<td>:</td>
						<td>' . $get->isbn . '</td>
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


	public function book()
	{
		$d['judul'] = "Data Buku Online";
		$d['buku'] = $this->Master_model->book();
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('book/buku');
		$this->load->view('bottom');
	}
	public function booku()

	{
		$d['judul'] = "Data Buku Online";
		$d['buku'] = $this->Master_model->book();
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('book/book');
		$this->load->view('bottom');
	}


	public function book_export()
	{
		$d['judul'] = "Data Buku";
		$d['buku'] = $this->Master_model->book();
		$this->load->view('book/buku_export',$d);
	}

	public function book_tambah()
	{
		$d['judul'] = "Data Buku Online";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['id_buku'] = "";
		$d['kode_buku'] = "";
		$d['judul_buku'] = "";
		$d['pengarang'] = "";
		$d['penerbit'] = "";
		$d['tahun_terbit'] = "";
		$d['tempat_terbit'] = "";
		$d['ddc'] = "";
		$d['isbn'] = "";
		$d['jumlah_buku'] = "";
		$d['tanggal_masuk'] = "";
		$d['no_inventaris'] = "";
		$d['deskripsi_buku'] = "";
		$d['foto_buku'] = "";
		$d['file_buku'] = "";
		$d['url_buku'] = "";
		$d['combo_sumber'] = $this->Combo_model->combo_sumber();
		$d['combo_kategori'] = $this->Combo_model->combo_kategori();
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('book/buku_tambah');
		$this->load->view('bottom');
	}


	public function book_edit($id_buku)
	{
		$cek = $this->db->query("SELECT * FROM mst_book WHERE id_buku = '$id_buku'");
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
			$d['ddc'] = $data->ddc;
			$d['isbn'] = $data->isbn;
			$d['tanggal_masuk'] = date("d-m-Y", strtotime($data->tanggal_masuk));
			$d['no_inventaris'] = $data->no_inventaris;
			$d['deskripsi_buku'] = $data->deskripsi_buku;
			$d['foto_buku'] = $data->foto_buku;
			$d['file_buku'] = $data->file_buku;
			$d['url_buku'] = $data->url_buku;


			$d['combo_sumber'] = $this->Combo_model->combo_sumber($data->id_sumber);
			$d['combo_kategori'] = $this->Combo_model->combo_kategori($data->id_kategori);
			$this->load->view('top', $d);
			$this->load->view('menu');
			$this->load->view('book/buku_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}
	}

	public function book_save()
	{
		$tipe = $this->input->post("tipe");
		$in['kode_buku'] = $this->input->post("kode_buku");
		$in['judul_buku'] = $this->input->post("judul_buku");
		$in['pengarang'] = $this->input->post("pengarang");
		$in['penerbit'] = $this->input->post("penerbit");
		$in['tahun_terbit'] = $this->input->post("tahun_terbit");
		$in['tempat_terbit'] = $this->input->post("tempat_terbit");
		$in['ddc'] = $this->input->post("ddc");
		$in['isbn'] = $this->input->post("isbn");
		$in['tanggal_masuk'] = date("Y-m-d", strtotime($this->input->post("tanggal_masuk")));
		$in['no_inventaris'] = $this->input->post("no_inventaris");
		$in['deskripsi_buku'] = $this->input->post("deskripsi_buku");
		$in['id_sumber'] = $this->input->post("id_sumber");
		$in['id_kategori'] = $this->input->post("id_kategori");
		$in['url_buku'] = $this->input->post("url_buku");

		$config['upload_path'] = './upload/book';
		$config['allowed_types'] = 'jpg|png|pdf';
		$config['encrypt_name']	= TRUE;
		$config['remove_spaces']	= TRUE;
		$config['max_size']     = '2000';
		$config['max_width']  	= '2000';
		$config['max_height']  	= '2000';

		$this->load->library('upload', $config);


		if ($tipe == 'add') {

			if (!empty($_FILES['foto_buku']['name'])) {

				$this->upload->do_upload('foto_buku');
				$data1 = $this->upload->data();
				$in['foto_buku'] = $data1['file_name'];

				$this->upload->do_upload('file_buku');
				$data2 = $this->upload->data();
				$in['file_buku'] = $data2['file_name'];


				$this->db->insert("mst_book", $in);
				$this->session->set_flashdata("success", "Tambah Data Buku Berhasil");
				redirect("master/book/");

			} else {
				$this->db->insert("mst_book", $in);
				$this->session->set_flashdata("success", "Tambah Data Buku Berhasil");
				redirect("master/book/");
			}
				
			
		} elseif ($tipe = 'edit') {
			$where['id_buku'] 	= $this->input->post('id_buku');
			if (!empty($_FILES['foto_buku']['name'])) {
			
				$this->upload->do_upload('foto_buku');
				$data1 = $this->upload->data();
				$in['foto_buku'] = $data1['file_name'];
				@unlink("./upload/book/" . $this->input->post("foto_lama"));

				$this->upload->do_upload('file_buku');
				$data2 = $this->upload->data();
				$in['file_buku'] = $data2['file_name'];
				@unlink("./upload/book/" . $this->input->post("file_lama"));

				$this->session->set_flashdata("success", "Ubah Data Buku Berhasil");

					$this->db->update("mst_book", $in, $where);

					redirect("master/book/");
			
			} else {
				$this->db->update("mst_book", $in, $where);
				$this->session->set_flashdata("success", "Ubah Data Buku Berhasil");
				redirect("master/book/");
			}
		} else {
			redirect(base_url());
		}
	}

	public function book_hapus($id)
	{
		$where['id_buku'] = $id;
		$this->db->delete("mst_book", $where);
		$this->session->set_flashdata("success", "Hapus Data Buku Berhasil");
		redirect("master/book/");
	}

	public function book_import()
	{
		if ($this->session->userdata('hak_akses') != "") {
			$unggah['upload_path']   = './upload/';
			$unggah['allowed_types'] = 'xlsx';
			$unggah['file_name']     = 'book_import';
			$unggah['overwrite']     = true;
			$unggah['max_size']      = 5120;

			$this->upload->initialize($unggah);
			if ($this->upload->do_upload('file_import')) {
				$file_excel = new unggahexcel('upload/book_import.xlsx', null);

				if (count($file_excel->Sheets()) == 1) {
					$baris = 1;

					foreach ($file_excel as $kolom) {
						if ($baris >= 2) {
							$in['kode_buku'] = $kolom[0];
							$in['judul_buku'] = $kolom[1];
							$in['pengarang'] = $kolom[2];
							$in['penerbit'] = $kolom[3];
							$in['tahun_terbit'] = $kolom[4];
							$in['ddc'] = $kolom[5];
							$in['isbn'] = $kolom[6];
							$in['tanggal_masuk'] = $kolom[7];
							$in['no_inventaris'] = $kolom[8];
							$in['deskripsi_buku'] = $kolom[9];
							$in['foto_buku'] = $kolom[10];
							$in['id_sumber'] = $kolom[11];
							$in['id_kategori'] = $kolom[12];
							$in['file_buku'] = $kolom[13];
							$in['url_buku'] = $kolom[14];

							$this->db->insert("mst_book", $in);
						}
						$baris++;
					}

					$this->session->set_flashdata("success", "Berhasil Import Data Buku ");
				} else {
					$this->session->set_flashdata("error", "Gagal Import Data");
				}
			} else {
				$this->session->set_flashdata("error", $this->upload->display_errors());
			}
			unlink('./upload/book_import.xlsx');
			redirect("master/book");
		} else {
			redirect(base_url());
		}
	}




















	public function ajax_detail_jurnal()
	{
		$id_jurnal = $_GET['id_jurnal'];
		$get = $this->db->query("SELECT * FROM mst_jurnal 
									LEFT JOIN mst_kelas ON mst_jurnal.id_kelas = mst_kelas.id_kelas 
									LEFT JOIN mst_mapel ON mst_jurnal.id_mapel = mst_mapel.id_mapel 
									LEFT JOIN mst_jurusan ON mst_jurnal.id_jurusan = mst_jurusan.id_jurusan WHERE id_jurnal = '$id_jurnal'")->row();
	
	if(!empty($get->file_jurnal)) {
			$file_jurnal = 'jurnal/'.$get->file_jurnal;
		} else {
			$file_jurnal = 'noimage.jpg';
		}

	

		echo '<table class="table table-bordered table-sm">
				<tbody>
					
			
				<div class="col-md-6">
				<table class="table table-bordered table-sm">
				



				<tr>
				<td colspan=3>  <iframe src="'.base_url().'upload/'.$file_jurnal.'" width="100%" height="500px">
				</iframe></td>
			</tr>
					


				<tr>
				<td>Judul</td>
				<td>:</td>
				<td>' . $get->judul_jurnal . '</td>
			</tr>
					


			<tr>
			<td>Jurnal</td>
			<td>:</td>
			<td>' . $get->file_jurnal . '</td>
		</tr>




		<tr>
		<td>Url Jurnal</td>
		<td>:</td>
		<td><a href="' . $get->url_jurnal . '">KLIK</a></td>
	</tr>
						<tr>
						<td>Mapel</td>
						<td>:</td>
						<td>' . $get->nama_mapel . '</td>
					</tr>
							
						
				
					
					<tr>
						<td>Kelas</td>
						<td>:</td>
						<td>' . $get->nama_kelas . '</td>
					</tr>
					<tr>
						<td>Jurusan</td>
						<td>:</td>
						<td>' . $get->nama_jurusan . '</td>
					</tr>
					<tr>
						<td>Deskripsi</td>
						<td>:</td>
						<td>' . $get->deskripsi_jurnal . '</td>
					</tr>
					
				


				<tr>
					<td>Tanggal Upload</td>
					<td>:</td>
					<td>' . $get->tanggal_jurnal . '</td>
				</tr>

			

				</tbody>
			  </table>
			  </div>
			  </div>';
	}



    
    public function jurnal()
	{
		$d['judul'] = "Data Jurnal";
		$d['jurnal'] = $this->Master_model->jurnal();
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('jurnal/jurnal');
		$this->load->view('bottom');
	}
	


	public function jurnal_export()
	{
		$d['judul'] = "Data Jurnal";
		$d['jurnal'] = $this->Master_model->jurnal();
		$this->load->view('jurnal/jurnal_export',$d);
	}

	public function jurnal_tambah()
	{
		$d['judul'] = "Data Jurnal Online";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['id_jurnal'] = "";
		$d['judul_jurnal'] = "";
		$d['tanggal_jurnal'] = "";
		$d['deskripsi_jurnal'] = "";
		$d['file_jurnal'] = "";
		$d['url_jurnal'] = "";
		$d['combo_mapel'] = $this->Combo_model->combo_mapel();
		$d['combo_kelas'] = $this->Combo_model->combo_kelas();
		$d['combo_jurusan'] = $this->Combo_model->combo_jurusan();
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('jurnal/jurnal_tambah');
		$this->load->view('bottom');
	}


	public function jurnal_edit($id_jurnal)
	{
		$cek = $this->db->query("SELECT * FROM mst_jurnal WHERE id_jurnal = '$id_jurnal'");
		if ($cek->num_rows() > 0) {
			$d['judul'] = "Data Jurnal";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$data = $cek->row();
			$d['id_jurnal'] = $data->id_jurnal;
			$d['judul_jurnal'] = $data->judul_jurnal;
			$d['tanggal_jurnal'] = date("d-m-Y", strtotime($data->tanggal_jurnal));
			$d['deskripsi_jurnal'] = $data->deskripsi_jurnal;
			$d['file_jurnal'] = $data->file_jurnal;
			$d['url_jurnal'] = $data->url_jurnal;
			$d['combo_mapel'] = $this->Combo_model->combo_mapel($data->id_mapel);
			$d['combo_kelas'] = $this->Combo_model->combo_kelas($data->id_kelas);
			$d['combo_jurusan'] = $this->Combo_model->combo_jurusan($data->id_jurusan);
			$this->load->view('top', $d);
			$this->load->view('menu');
			$this->load->view('jurnal/jurnal_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}
	}

	public function jurnal_save()
	{
		$get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();

		$tipe = $this->input->post("tipe");
		$in['judul_jurnal'] = $this->input->post("judul_jurnal");
		$in['tanggal_jurnal'] = date("Y-m-d", strtotime($this->input->post("tanggal_jurnal")));
		$in['deskripsi_jurnal'] = $this->input->post("deskripsi_jurnal");
		$in['id_mapel'] = $this->input->post("id_mapel");
		$in['id_kelas'] = $this->input->post("id_kelas");
		$in['id_jurusan'] = $this->input->post("id_jurusan");
		$in['url_jurnal'] = $this->input->post("url_jurnal");
		$in['id_guru'] =  $this->session->userdata("id");
		$in['tahun_ajaran'] =  $get_tahun->tahun_ajaran;


		$config['upload_path'] = './upload/jurnal';
		$config['allowed_types'] = 'jpg|png|pdf';
		$config['encrypt_name']	= TRUE;
		$config['remove_spaces']	= TRUE;
		$config['max_size']     = '2000';
		$config['max_width']  	= '2000';
		$config['max_height']  	= '2000';

		$this->load->library('upload', $config);


		if ($tipe == 'add') {

			if (!empty($_FILES['file_jurnal']['name'])) {

				$this->upload->do_upload('file_jurnal');
				$data2 = $this->upload->data();
				$in['file_jurnal'] = $data2['file_name'];


				$this->db->insert("mst_jurnal", $in);
				$this->session->set_flashdata("success", "Tambah Data Jurnal Berhasil");
				redirect("master/jurnal/");

			} else {
				$this->db->insert("mst_jurnal", $in);
				$this->session->set_flashdata("success", "Tambah Data Jurnal Berhasil");
				redirect("master/jurnal/");
			}
				
			
		} elseif ($tipe = 'edit') {
			$where['id_jurnal'] 	= $this->input->post('id_jurnal');
			if (!empty($_FILES['file_jurnal']['name'])) {
			
			
				$this->upload->do_upload('file_jurnal');
				$data2 = $this->upload->data();
				$in['file_jurnal'] = $data2['file_name'];
				@unlink("./upload/jurnal/" . $this->input->post("file_lama"));

				$this->session->set_flashdata("success", "Ubah Data Jurnal Berhasil");

					$this->db->update("mst_jurnal", $in, $where);

					redirect("master/jurnal/");
			
			} else {
				$this->db->update("mst_jurnal", $in, $where);
				$this->session->set_flashdata("success", "Ubah Data Jurnal Berhasil");
				redirect("master/jurnal/");
			}
		} else {
			redirect(base_url());
		}
	}

	public function jurnal_hapus($id)
	{
		$where['id_jurnal'] = $id;
		$this->db->delete("mst_jurnal", $where);
		$this->session->set_flashdata("success", "Hapus Data Jurnal Berhasil");
		redirect("master/jurnal/");
	}

	public function jurnal_import()
	{
		if ($this->session->userdata('hak_akses') != "") {
			$unggah['upload_path']   = './upload/';
			$unggah['allowed_types'] = 'xlsx';
			$unggah['file_name']     = 'jurnal_import';
			$unggah['overwrite']     = true;
			$unggah['max_size']      = 5120;

			$this->upload->initialize($unggah);
			if ($this->upload->do_upload('file_import')) {
				$file_excel = new unggahexcel('upload/jurnal_import.xlsx', null);

				if (count($file_excel->Sheets()) == 1) {
					$baris = 1;

					foreach ($file_excel as $kolom) {
						if ($baris >= 2) {
							$in['judul_jurnal'] = $kolom[1];
							$in['tanggal_jurnal'] = $kolom[2];
							$in['deskripsi_jurnal'] = $kolom[3];
        					$in['id_sumber'] = $kolom[4];
							$in['id_jurusan'] = $kolom[5];
							$in['file_jurnal'] = $kolom[6];
							$in['url_jurnal'] = $kolom[7];

							$this->db->insert("mst_jurnal", $in);
						}
						$baris++;
					}

					$this->session->set_flashdata("success", "Berhasil Import Data Jurnal ");
				} else {
					$this->session->set_flashdata("error", "Gagal Import Data");
				}
			} else {
				$this->session->set_flashdata("error", $this->upload->display_errors());
			}
			unlink('./upload/jurnal_import.xlsx');
			redirect("master/jurnal");
		} else {
			redirect(base_url());
		}
	}





	public function ajax_detail_materi()
	{
		$id_materi = $_GET['id_materi'];
		$get = $this->db->query("SELECT * FROM mst_materi 
									LEFT JOIN mst_kelas ON mst_materi.id_kelas = mst_kelas.id_kelas 
									LEFT JOIN mst_mapel ON mst_materi.id_mapel = mst_mapel.id_mapel 
									LEFT JOIN mst_jurusan ON mst_materi.id_jurusan = mst_jurusan.id_jurusan WHERE id_materi = '$id_materi'")->row();
	
	if(!empty($get->file_materi)) {
			$file_materi = 'materi/'.$get->file_materi;
		} else {
			$file_materi = 'noimage.jpg';
		}

	

		echo '<table class="table table-bordered table-sm">
				<tbody>
					
			
				<div class="col-md-6">
				<table class="table table-bordered table-sm">
				



				<tr>
				<td colspan=3>  <iframe src="'.base_url().'upload/'.$file_materi.'" width="100%" height="500px">
				</iframe></td>
			</tr>
					


				<tr>
				<td>Judul</td>
				<td>:</td>
				<td>' . $get->judul_materi . '</td>
			</tr>
					


			<tr>
			<td>Materi</td>
			<td>:</td>
			<td>' . $get->file_materi . '</td>
		</tr>




		<tr>
		<td>Url Materi</td>
		<td>:</td>
		<td><a href="' . $get->url_materi . '">KLIK</a></td>
	</tr>
						<tr>
						<td>Mapel</td>
						<td>:</td>
						<td>' . $get->nama_mapel . '</td>
					</tr>
							
						
				
					
					<tr>
						<td>Kelas</td>
						<td>:</td>
						<td>' . $get->nama_kelas . '</td>
					</tr>
					<tr>
						<td>Jurusan</td>
						<td>:</td>
						<td>' . $get->nama_jurusan . '</td>
					</tr>
					<tr>
						<td>Deskripsi</td>
						<td>:</td>
						<td>' . $get->deskripsi_materi . '</td>
					</tr>
					
				


				<tr>
					<td>Tanggal Upload</td>
					<td>:</td>
					<td>' . $get->tanggal_materi . '</td>
				</tr>

			

				</tbody>
			  </table>
			  </div>
			  </div>';
	}



    
    public function materi()
	{
		$d['judul'] = "Data Materi";
		$d['materi'] = $this->Master_model->materi();
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('materi/materi');
		$this->load->view('bottom');
	}
	


	public function materi_export()
	{
		$d['judul'] = "Data Materi";
		$d['materi'] = $this->Master_model->materi();
		$this->load->view('materi/materi_export',$d);
	}

	public function materi_tambah()
	{
		$d['judul'] = "Data Materi Online";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['id_materi'] = "";
		$d['judul_materi'] = "";
		$d['tanggal_materi'] = "";
		$d['deskripsi_materi'] = "";
		$d['file_materi'] = "";
		$d['url_materi'] = "";
		$d['combo_mapel'] = $this->Combo_model->combo_mapel();
		$d['combo_kelas'] = $this->Combo_model->combo_kelas();
		$d['combo_jurusan'] = $this->Combo_model->combo_jurusan();
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('materi/materi_tambah');
		$this->load->view('bottom');
	}


	public function materi_edit($id_materi)
	{
		$cek = $this->db->query("SELECT * FROM mst_materi WHERE id_materi = '$id_materi'");
		if ($cek->num_rows() > 0) {
			$d['judul'] = "Data Materi";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$data = $cek->row();
			$d['id_materi'] = $data->id_materi;
			$d['judul_materi'] = $data->judul_materi;
			$d['tanggal_materi'] = date("d-m-Y", strtotime($data->tanggal_materi));
			$d['deskripsi_materi'] = $data->deskripsi_materi;
			$d['file_materi'] = $data->file_materi;
			$d['url_materi'] = $data->url_materi;
			$d['combo_mapel'] = $this->Combo_model->combo_mapel($data->id_mapel);
			$d['combo_kelas'] = $this->Combo_model->combo_kelas($data->id_kelas);
			$d['combo_jurusan'] = $this->Combo_model->combo_jurusan($data->id_jurusan);
			$this->load->view('top', $d);
			$this->load->view('menu');
			$this->load->view('materi/materi_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}
	}

	public function materi_save()
	{
		$get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();
		$tipe = $this->input->post("tipe");
		$in['judul_materi'] = $this->input->post("judul_materi");
		$in['tanggal_materi'] = date("Y-m-d", strtotime($this->input->post("tanggal_materi")));
		$in['deskripsi_materi'] = $this->input->post("deskripsi_materi");
		$in['id_mapel'] = $this->input->post("id_mapel");
		$in['id_kelas'] = $this->input->post("id_kelas");
		$in['id_jurusan'] = $this->input->post("id_jurusan");
		$in['url_materi'] = $this->input->post("url_materi");
		$in['id_guru'] =  $this->session->userdata("id");
		$in['tahun_ajaran'] =  $get_tahun->tahun_ajaran;


		$config['upload_path'] = './upload/materi';
		$config['allowed_types'] = 'mp4|3gp|avi|mpg|webm|mkv|gifv|wmv';
		$config['encrypt_name']	= TRUE;
		$config['remove_spaces']	= TRUE;
		$config['max_size']     = '2000';
		$config['max_width']  	= '2000';
		$config['max_height']  	= '2000';

		$this->load->library('upload', $config);


		if ($tipe == 'add') {

			if (!empty($_FILES['file_materi']['name'])) {

				$this->upload->do_upload('file_materi');
				$data2 = $this->upload->data();
				$in['file_materi'] = $data2['file_name'];


				$this->db->insert("mst_materi", $in);
				$this->session->set_flashdata("success", "Tambah Data Materi Berhasil");
				redirect("master/materi/");

			} else {
				$this->db->insert("mst_materi", $in);
				$this->session->set_flashdata("success", "Tambah Data Materi Berhasil");
				redirect("master/materi/");
			}
				
			
		} elseif ($tipe = 'edit') {
			$where['id_materi'] 	= $this->input->post('id_materi');
			if (!empty($_FILES['file_materi']['name'])) {
			
			
				$this->upload->do_upload('file_materi');
				$data2 = $this->upload->data();
				$in['file_materi'] = $data2['file_name'];
				@unlink("./upload/materi/" . $this->input->post("file_lama"));

				$this->session->set_flashdata("success", "Ubah Data Materi Berhasil");

					$this->db->update("mst_materi", $in, $where);

					redirect("master/materi/");
			
			} else {
				$this->db->update("mst_materi", $in, $where);
				$this->session->set_flashdata("success", "Ubah Data Materi Berhasil");
				redirect("master/materi/");
			}
		} else {
			redirect(base_url());
		}
	}

	public function materi_hapus($id)
	{
		$where['id_materi'] = $id;
		$this->db->delete("mst_materi", $where);
		$this->session->set_flashdata("success", "Hapus Data Materi Berhasil");
		redirect("master/materi/");
	}

	public function materi_import()
	{
		if ($this->session->userdata('hak_akses') != "") {
			$unggah['upload_path']   = './upload/';
			$unggah['allowed_types'] = 'xlsx';
			$unggah['file_name']     = 'materi_import';
			$unggah['overwrite']     = true;
			$unggah['max_size']      = 5120;

			$this->upload->initialize($unggah);
			if ($this->upload->do_upload('file_import')) {
				$file_excel = new unggahexcel('upload/materi_import.xlsx', null);

				if (count($file_excel->Sheets()) == 1) {
					$baris = 1;

					foreach ($file_excel as $kolom) {
						if ($baris >= 2) {
							$in['judul_materi'] = $kolom[1];
							$in['tanggal_materi'] = $kolom[2];
							$in['deskripsi_materi'] = $kolom[3];
        					$in['id_sumber'] = $kolom[4];
							$in['id_jurusan'] = $kolom[5];
							$in['file_materi'] = $kolom[6];
							$in['url_materi'] = $kolom[7];

							$this->db->insert("mst_materi", $in);
						}
						$baris++;
					}

					$this->session->set_flashdata("success", "Berhasil Import Data Materi ");
				} else {
					$this->session->set_flashdata("error", "Gagal Import Data");
				}
			} else {
				$this->session->set_flashdata("error", $this->upload->display_errors());
			}
			unlink('./upload/materi_import.xlsx');
			redirect("master/materi");
		} else {
			redirect(base_url());
		}
	}
















}
