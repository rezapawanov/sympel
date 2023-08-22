<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('hak_akses') != "admin" && $this->session->userdata('hak_akses') != "gurubk" && $this->session->userdata('hak_akses') != "guru") {
			redirect(base_url());
		} else {
			$this->load->Model('Laporan_model');
			$this->load->Model('Combo_model');
		}
	}

	public function index() {
		redirect(base_url());
	}

	public function buku()
	{
		$d['judul'] = "Laporan Data Buku";
		$d['buku'] = $this->Laporan_model->buku();
		$get = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
			$d['nama_sekolah'] = $get->nama_sekolah;
			$d['alamat_sekolah'] = $get->alamat;
			$d['website'] = $get->website;
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('laporan/buku');
		$this->load->view('bottom');
	}

	public function buku_excel()
	{
		$d['judul'] = "Laporan Data Buku";
		$d['buku'] = $this->Laporan_model->buku();
		$this->load->view('laporan/buku_excel',$d);
	}


	public function proses_tampil_peminjaman() {
		$tgl_awal 	= $this->input->post("tgl_awal");
		$tgl_akhir 	= $this->input->post("tgl_akhir");
		redirect("laporan/peminjaman/".$tgl_awal."/".$tgl_akhir);
	}

	public function proses_tampil_pengunjung() {
		$tgl_awal 	= $this->input->post("tgl_awal");
		$tgl_akhir 	= $this->input->post("tgl_akhir");
		redirect("laporan/pengunjung/".$tgl_awal."/".$tgl_akhir."/".$this->input->post("keperluan"));
	}


	public function peminjaman($tgl_awal="",$tgl_akhir="") {
		$d['judul'] = "Laporan Data Peminjaman Buku";
		if(!empty($tgl_awal) && !empty($tgl_akhir)) {
			$d['tgl_awal'] = $tgl_awal;
			$d['tgl_akhir'] = $tgl_akhir;
		
			$tgl_awal 	= date("Y-m-d",strtotime($tgl_awal));
			$tgl_akhir 	= date("Y-m-d",strtotime($tgl_akhir));
			$d['peminjaman'] = $this->Laporan_model->peminjaman($tgl_awal,$tgl_akhir);
		} else {
			$d['peminjaman'] = "";
			$d['tgl_awal'] = date("d-m-Y");
			$d['tgl_akhir'] = date("d-m-Y");
		}
		$get = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
			$d['nama_sekolah'] = $get->nama_sekolah;
			$d['alamat_sekolah'] = $get->alamat;
			$d['website'] = $get->website;
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('laporan/peminjaman');
		$this->load->view('bottom');	
	}

	public function peminjaman_excel($tgl_awal="",$tgl_akhir="") {
		$d['judul'] = "Laporan  Peminjaman Buku";
		if(!empty($tgl_awal) && !empty($tgl_akhir)) {
			$d['tgl_awal'] = $tgl_awal;
			$d['tgl_akhir'] = $tgl_akhir;
		
			$tgl_awal 	= date("Y-m-d",strtotime($tgl_awal));
			$tgl_akhir 	= date("Y-m-d",strtotime($tgl_akhir));
			$d['peminjaman'] = $this->Laporan_model->peminjaman($tgl_awal,$tgl_akhir);
		} else {
			$d['peminjaman'] = "";
			$d['tgl_awal'] = date("d-m-Y");
			$d['tgl_akhir'] = date("d-m-Y");
		}
		$this->load->view('laporan/peminjaman_excel',$d);
	}


	public function pengunjung($tgl_awal="",$tgl_akhir="",$keperluan="") {
		$d['judul'] = "Laporan  Pengunjung Perpustakaan";
		if(!empty($tgl_awal) && !empty($tgl_akhir)) {
			$keperluan = urldecode($keperluan);
			$d['tgl_awal'] = $tgl_awal;
			$d['tgl_akhir'] = $tgl_akhir;
			$tgl_awal 	= date("Y-m-d",strtotime($tgl_awal));
			$tgl_akhir 	= date("Y-m-d",strtotime($tgl_akhir));
			$d['pengunjung'] = $this->Laporan_model->pengunjung($tgl_awal,$tgl_akhir,$keperluan);
		} else {
			$d['pengunjung'] = "";
			$d['tgl_awal'] = date("d-m-Y");
			$d['tgl_akhir'] = date("d-m-Y");
		}
		$get = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
			$d['nama_sekolah'] = $get->nama_sekolah;
			$d['alamat_sekolah'] = $get->alamat;
			$d['website'] = $get->website;
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('laporan/pengunjung');
		$this->load->view('bottom');	
	}

	public function pengunjung_excel($tgl_awal="",$tgl_akhir="",$keperluan="") {
		$d['judul'] = "Laporan  Pengunjung Perpustakaan";
		if(!empty($tgl_awal) && !empty($tgl_akhir)) {
			$keperluan = urldecode($keperluan);
			$d['tgl_awal'] = $tgl_awal;
			$d['tgl_akhir'] = $tgl_akhir;
			$tgl_awal 	= date("Y-m-d",strtotime($tgl_awal));
			$tgl_akhir 	= date("Y-m-d",strtotime($tgl_akhir));
			$d['pengunjung'] = $this->Laporan_model->pengunjung($tgl_awal,$tgl_akhir,$keperluan);
		} else {
			$d['pengunjung'] = "";
			$d['tgl_awal'] = date("d-m-Y");
			$d['tgl_akhir'] = date("d-m-Y");
		}
		$this->load->view('laporan/pengunjung_excel',$d);
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
					
	

				</tbody>
			  </table>
			  </div>
			  </div>';
	}




    public function jurnal($tgl_awal="",$tgl_akhir="",$tahun_ajaran="",$id_kelas="",$id_jurusan="",$id_mapel="",$id_guru="",$id_jurnal="") {
		if(empty($tahun_ajaran) || $tahun_ajaran == 'all') {
			$get_tahunajaran = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = '1'")->row();
			$tahun_ajaran = $get_tahunajaran->tahun_ajaran;
		} else {
			$tahun_ajaran 	= str_replace("-","/",$tahun_ajaran);
		}
		$d['judul'] = "Jurnal";
		$d['combo_kelas'] = $this->Combo_model->combo_kelas();
		$d['combo_jurusan'] = $this->Combo_model->combo_jurusan();
		$d['combo_mapel'] = $this->Combo_model->combo_mapel();
		$d['combo_guru'] = $this->Combo_model->combo_guru();
		$d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran($tahun_ajaran);
		if(!empty($tgl_awal) && !empty($tgl_akhir)) {
			$d['tgl_awal']  =  $tgl_awal;
			$d['tgl_akhir'] = $tgl_akhir;
			$tgl_awal 	= date("Y-m-d",strtotime($tgl_awal));
			$tgl_akhir 	= date("Y-m-d",strtotime($tgl_akhir));
			$d['tahun_ajaran'] = $tahun_ajaran;
			$d['jurnal'] = $this->Laporan_model->jurnal($tgl_awal,$tgl_akhir,$tahun_ajaran,$id_kelas,$id_jurusan,$id_mapel,$id_guru,$id_jurnal);
		} else {
			$d['jurnal'] = "";
			$d['tgl_awal'] = date("d-m-Y");
			$d['tgl_akhir'] = date("d-m-Y");
		}
		$get = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
			$d['nama_sekolah'] = $get->nama_sekolah;
			$d['alamat_sekolah'] = $get->alamat;
			$d['website'] = $get->website;
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('laporan/jurnal');
		$this->load->view('bottom');	
	}
	

	public function proses_tampil_jurnal() {
		$tgl_awal 	= $this->input->post("tgl_awal");
		$tgl_akhir 	= $this->input->post("tgl_akhir");

	
		if(empty($this->input->post("id_mapel"))) {
			$id_mapel = 'all';
		} else {
			$id_mapel 	= str_replace("/","-",$this->input->post("id_mapel"));
		}



		if(empty($this->input->post("tahun_ajaran"))) {
			$tahun_ajaran = 'all';
		} else {
			$tahun_ajaran 	= str_replace("/","-",$this->input->post("tahun_ajaran"));
		}

		if(empty($this->input->post("id_kelas"))) {
			$id_kelas = 'all';
		} else {
			$id_kelas 	= $this->input->post("id_kelas");
		}


        if(empty($this->input->post("id_jurusan"))) {
			$id_jurusan = 'all';
		} else {
			$id_jurusan 	= $this->input->post("id_jurusan");
		}

        if(empty($this->input->post("id_guru"))) {
			$id_guru = 'all';
		} else {
			$id_guru 	= $this->input->post("id_guru");
		}
		
		if(empty($this->input->post("id_jurnal"))) {
			$id_jurnal = 'all';
		} else {
			$id_jurnal 	= $this->input->post("id_jurnal");
		}
		
		
		redirect("laporan/jurnal/".$tgl_awal."/".$tgl_akhir."/".$tahun_ajaran.'/'.$id_kelas.'/'.$id_jurusan.'/'.$id_guru.'/'.$id_mapel.'/'.$id_jurnal);
	
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

					


				</tbody>
			  </table>
			  </div>
			  </div>';
	}




    public function materi($tgl_awal="",$tgl_akhir="",$tahun_ajaran="",$id_kelas="",$id_jurusan="",$id_mapel="",$id_guru="",$id_materi="") {
		if(empty($tahun_ajaran) || $tahun_ajaran == 'all') {
			$get_tahunajaran = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = '1'")->row();
			$tahun_ajaran = $get_tahunajaran->tahun_ajaran;
		} else {
			$tahun_ajaran 	= str_replace("-","/",$tahun_ajaran);
		}
		$d['judul'] = "Materi";
		$d['combo_kelas'] = $this->Combo_model->combo_kelas();
		$d['combo_jurusan'] = $this->Combo_model->combo_jurusan();
		$d['combo_mapel'] = $this->Combo_model->combo_mapel();
		$d['combo_guru'] = $this->Combo_model->combo_guru();
		$d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran($tahun_ajaran);
		if(!empty($tgl_awal) && !empty($tgl_akhir)) {
			$d['tgl_awal']  =  $tgl_awal;
			$d['tgl_akhir'] = $tgl_akhir;
			$tgl_awal 	= date("Y-m-d",strtotime($tgl_awal));
			$tgl_akhir 	= date("Y-m-d",strtotime($tgl_akhir));
			$d['tahun_ajaran'] = $tahun_ajaran;
			$d['materi'] = $this->Laporan_model->materi($tgl_awal,$tgl_akhir,$tahun_ajaran,$id_kelas,$id_jurusan,$id_mapel,$id_guru,$id_materi);
		} else {
			$d['materi'] = "";
			$d['tgl_awal'] = date("d-m-Y");
			$d['tgl_akhir'] = date("d-m-Y");
		}
		$get = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
			$d['nama_sekolah'] = $get->nama_sekolah;
			$d['alamat_sekolah'] = $get->alamat;
			$d['website'] = $get->website;
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('laporan/materi');
		$this->load->view('bottom');	
	}
	

	public function proses_tampil_materi() {
		$tgl_awal 	= $this->input->post("tgl_awal");
		$tgl_akhir 	= $this->input->post("tgl_akhir");

	
		if(empty($this->input->post("id_mapel"))) {
			$id_mapel = 'all';
		} else {
			$id_mapel 	= str_replace("/","-",$this->input->post("id_mapel"));
		}



		if(empty($this->input->post("tahun_ajaran"))) {
			$tahun_ajaran = 'all';
		} else {
			$tahun_ajaran 	= str_replace("/","-",$this->input->post("tahun_ajaran"));
		}

		if(empty($this->input->post("id_kelas"))) {
			$id_kelas = 'all';
		} else {
			$id_kelas 	= $this->input->post("id_kelas");
		}


        if(empty($this->input->post("id_jurusan"))) {
			$id_jurusan = 'all';
		} else {
			$id_jurusan 	= $this->input->post("id_jurusan");
		}

        if(empty($this->input->post("id_guru"))) {
			$id_guru = 'all';
		} else {
			$id_guru 	= $this->input->post("id_guru");
		}
		
		if(empty($this->input->post("id_materi"))) {
			$id_materi = 'all';
		} else {
			$id_materi 	= $this->input->post("id_materi");
		}
		
		
		redirect("laporan/materi/".$tgl_awal."/".$tgl_akhir."/".$tahun_ajaran.'/'.$id_kelas.'/'.$id_jurusan.'/'.$id_guru.'/'.$id_mapel.'/'.$id_materi);
	
	}



}