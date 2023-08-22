<?php
defined('BASEPATH') or exit('No direct script access allowed');

class App extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->Model('Master_model');

	}

	public function index()
	{
		if ($this->session->userdata('hak_akses') != "") {
			redirect(base_url() . 'home');
		} else {
			redirect("../");
		}
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

	public function ajax_siswa()
	{
		$nis = $_GET['nis'];
		$get = $this->db->query("SELECT mst_siswa.id_kelas,nama_kelas,nama_siswa FROM mst_siswa INNER JOIN mst_kelas ON mst_siswa.id_kelas = mst_kelas.id_kelas WHERE nis = '$nis'");
		$arr = array();
		if($get->num_rows() > 0) {
			foreach ($get->result_array() as $data) {
				$d['id_kelas'] = $data['id_kelas'];
				$d['nama_siswa'] = $data['nama_siswa'];
				$d['nama_kelas'] = $data['nama_kelas'];
				$d['status'] = 'ok';
				$arr[] = $d;
			}
		} else {
			$d['status'] = 'no';
			$arr[] = $d;
		}
		echo json_encode(array($d));
	}

	public function home()
	{
		$get = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
		$d['nama_sekolah'] = $get->nama_sekolah;
		$d['alamat_sekolah'] = $get->alamat;
		$d['title'] = "Home";
		$d['buku'] = $this->Master_model->buku();
		$d['book'] = $this->Master_model->book();

		$d['pengunjung'] = $this->Master_model->pengunjung_today();
		$this->load->view('front/top', $d);
		$this->load->view('front/home/home');
		$this->load->view('front/bottom');
	}


	


	public function agenda_save()
	{
		$tanggal = $this->input->post("date");
		$ex_tanggal = explode("-", $tanggal);
		$in['title'] = $this->input->post("info");
		$in['start'] = date("Y-m-d", strtotime($tanggal));
		$in['end'] = date("Y-m-d", strtotime($tanggal));
		$in['year'] = $ex_tanggal[0];
		$this->db->insert("calendar_perpustakaan", $in);
		redirect(base_url() . 'home');
	}

	public function agenda_hapus()
	{
		$where['id'] = $this->input->post("id");
		$this->db->delete("calendar_perpustakaan", $where);
		redirect(base_url() . 'home');
	}


	public function save_pengunjung()
	{
		$in['nis'] = $this->input->post("nis");
		$in['id_kelas'] = $this->input->post("id_kelas");
		$in['keperluan'] = $this->input->post("keperluan");
		$this->db->insert("pengunjung_perpus", $in);
		redirect('app/home');
	}

	public function password()
	{
		$d['judul'] = "Ubah Password";
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('password/password');
		$this->load->view('bottom');
	}

	public function password_save()
	{
		$password_lama = $this->input->post("password_lama");
		$password_baru = $this->input->post("password_baru");
		$hak_akses = $this->session->userdata("hak_akses");
		$username = $this->session->userdata("username");
		if($hak_akses == "admin") {
			$cek = $this->db->query("SELECT * FROM mst_user WHERE username = '$username' AND password = '$password_lama'");
			if($cek->num_rows() > 0) {
				$where['username'] = $username;
				$in['password'] = $password_baru;
				$this->db->update("mst_user",$in,$where);
				$this->session->set_flashdata("success", "Ubah Password Berhasil");
			} else {
				$this->session->set_flashdata("error", "Ubah Password Gagal. Password Lama Salah");
			}
		}
		redirect("app/password/");
	}
}
