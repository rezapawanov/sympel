<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->Model('Laporan_model');
		$this->load->Model('Combo_model');
	}

	public function index() {
		redirect(base_url());
	}

	public function proses_tampil_siswa() {
		$id_kelas = $this->input->post("id_kelas");
		redirect("laporan/siswa/".$id_kelas);
	}

	public function proses_tampil_pembayaran() {
		$tgl_awal 	= $this->input->post("tgl_awal");
		$tgl_akhir 	= $this->input->post("tgl_akhir");
		if(empty($this->input->post("nis"))) {
			$nis = 'all';
		} else {
			$ex = explode("-",$this->input->post("nis"));
			$nis = trim($ex[0]);
		}
		if(empty($this->input->post("angkatan"))) {
			$angkatan = 'all';
		} else {
			$angkatan 	= $this->input->post("angkatan");
		}

		$id_jenis_pembayaran = $this->input->post("id_jenis_pembayaran");
		$kelas 	= $this->input->post("id_kelas");
		redirect("laporan/pembayaran/".$tgl_awal."/".$tgl_akhir."/".$id_jenis_pembayaran."/".$kelas."/".$nis."/".$angkatan);
	}

	public function proses_tampil_jurnal() {
		$tgl_awal 	= $this->input->post("tgl_awal");
		$tgl_akhir 	= $this->input->post("tgl_akhir");
		redirect("laporan/jurnal/".$tgl_awal."/".$tgl_akhir);
	}

	public function proses_tampil_rekapitulasi() {
		$tahun_ajaran 	= str_replace("/","-",$this->input->post("tahun_ajaran"));
		$kelas 	= $this->input->post("id_kelas");
		$id_jenis_pembayaran 	= $this->input->post("id_jenis_pembayaran");
		redirect("laporan/rekapitulasi/".$tahun_ajaran."/".$kelas."/".$id_jenis_pembayaran);
	}

	public function proses_tampil_das() {
		$tahun_ajaran 	= str_replace("/","-",$this->input->post("tahun_ajaran"));
		$id_user 	= $this->input->post("id_user");
		redirect("laporan/das/".$id_user."/".$tahun_ajaran);
	}

	public function proses_tampil_das_bendahara() {
		$tahun_ajaran 	= str_replace("/","-",$this->input->post("tahun_ajaran"));
		$id_user 	= $this->input->post("id_user");
		redirect("laporan/das_bendahara/".$id_user."/".$tahun_ajaran);
	}

	public function proses_tampil_das_harian() {
		$tahun_ajaran 	= str_replace("/","-",$this->input->post("tahun_ajaran"));
		$id_user 	= $this->input->post("id_user");
		redirect("laporan/das_harian/".$id_user."/".$tahun_ajaran);
	}


	public function proses_tampil_das_sisa() {
		$tahun_ajaran 	= str_replace("/","-",$this->input->post("tahun_ajaran"));
		redirect("laporan/das_sisa/".$tahun_ajaran);
	}


	public function das_harian($id_user="",$tahun_ajaran="") {
		$d['judul'] = "Laporan DAS Harian";
		
		if($this->session->userdata("hak_akses") == 'das') {
			$id_user = $this->session->userdata("id");
		}
		
		if($tahun_ajaran == "") { 
			$get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1 LIMIT 1")->row();
			$tahun_ajaran = $get_tahun->tahun_ajaran;
		}
		$tahun_ajaran = str_replace("-","/",$tahun_ajaran);

		$d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran_only($tahun_ajaran);
		$d['combo_user'] = $this->Combo_model->combo_user_rpt($id_user);

		$d['laporan_das'] = $this->Laporan_model->das_harian($id_user,$tahun_ajaran);
		if(empty($id_user)) {
			$d['id_user'] = 'all';

		} else {
			$d['id_user'] = $id_user;
		}
		$d['tahun_ajaran'] = $tahun_ajaran;
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('laporan/das_harian');
		$this->load->view('bottom');	
	}

	public function das_sisa($tahun_ajaran="") {
		$d['judul'] = "Laporan Dana Sisa";
		
		if($tahun_ajaran == "") { 
			$get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1 LIMIT 1")->row();
			$tahun_ajaran = $get_tahun->tahun_ajaran;
		}
		$tahun_ajaran = str_replace("-","/",$tahun_ajaran);

		$d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran_only($tahun_ajaran);

		$d['laporan_das_sisa'] = $this->Laporan_model->das_sisa($tahun_ajaran);
	
		$d['tahun_ajaran'] = $tahun_ajaran;
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('laporan/das_sisa');
		$this->load->view('bottom');	
	}


	public function das_sisa_excel($tahun_ajaran="") {
		$d['judul'] = "Laporan Dana Sisa";
		
		if($tahun_ajaran == "") { 
			$get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1 LIMIT 1")->row();
			$tahun_ajaran = $get_tahun->tahun_ajaran;
		}
		$tahun_ajaran = str_replace("-","/",$tahun_ajaran);

		$d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran_only($tahun_ajaran);

		$d['laporan_das_sisa'] = $this->Laporan_model->das_sisa($tahun_ajaran);
	
		$d['tahun_ajaran'] = $tahun_ajaran;
		$this->load->view('laporan/das_sisa_excel',$d);
	}


	public function das_harian_excel($id_user="",$tahun_ajaran="") {
		$d['judul'] = "Laporan DAS Harian";
		
		if($tahun_ajaran == "") { 
			$get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1 LIMIT 1")->row();
			$tahun_ajaran = $get_tahun->tahun_ajaran;
		}
		$tahun_ajaran = str_replace("-","/",$tahun_ajaran);

		$d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran_only($tahun_ajaran);
		$d['combo_user'] = $this->Combo_model->combo_user_rpt($id_user);

		$d['laporan_das'] = $this->Laporan_model->das_harian($id_user,$tahun_ajaran);
		if(empty($id_user)) {
			$d['id_user'] = 'all';

		} else {
			$d['id_user'] = $id_user;
		}
		$d['tahun_ajaran'] = $tahun_ajaran;
		$this->load->view('laporan/das_harian_excel',$d);
	}


	public function das_bendahara($id_user="",$tahun_ajaran="") {
		$d['judul'] = "Laporan DAS";

		if($this->session->userdata("hak_akses") == 'das') {
			$id_user = $this->session->userdata("id");
			$d['combo_user'] = $this->Combo_model->combo_user_bendahara($id_user);
		} else {
			$d['combo_user'] = $this->Combo_model->combo_user_bendahara($id_user);
		}
		
		if($tahun_ajaran == "") { 
			$get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1 LIMIT 1")->row();
			$tahun_ajaran = $get_tahun->tahun_ajaran;
		}
		$tahun_ajaran = str_replace("-","/",$tahun_ajaran);

		$d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran_only($tahun_ajaran);

		$d['laporan_das'] = $this->Laporan_model->das_bendahara($id_user,$tahun_ajaran);
		if(empty($id_user)) {
			$d['id_user'] = 'all';

		} else {
			$d['id_user'] = $id_user;
		}
		$d['tahun_ajaran'] = $tahun_ajaran;
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('laporan/das_bendahara');
		$this->load->view('bottom');	
	}


	public function das_bendahara_excel($id_user="",$tahun_ajaran="") {
		$d['judul'] = "Laporan DAS";

		if($this->session->userdata("hak_akses") == 'das') {
			$id_user = $this->session->userdata("id");
			$d['combo_user'] = $this->Combo_model->combo_user_bendahara($id_user);
		} else {
			$d['combo_user'] = $this->Combo_model->combo_user_bendahara($id_user);
		}
		
		if($tahun_ajaran == "") { 
			$get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1 LIMIT 1")->row();
			$tahun_ajaran = $get_tahun->tahun_ajaran;
		}
		$tahun_ajaran = str_replace("-","/",$tahun_ajaran);

		$d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran_only($tahun_ajaran);

		$d['laporan_das'] = $this->Laporan_model->das_bendahara($id_user,$tahun_ajaran);
		if(empty($id_user)) {
			$d['id_user'] = 'all';

		} else {
			$d['id_user'] = $id_user;
		}
		$d['tahun_ajaran'] = $tahun_ajaran;
		$this->load->view('laporan/das_bendahara_excel',$d);
	}

	public function das($id_user="",$tahun_ajaran="") {
		$d['judul'] = "Laporan DAS";

		if($this->session->userdata("hak_akses") == 'das') {
			$id_user = $this->session->userdata("id");
		}
		
		if($tahun_ajaran == "") { 
			$get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1 LIMIT 1")->row();
			$tahun_ajaran = $get_tahun->tahun_ajaran;
		}
		$tahun_ajaran = str_replace("-","/",$tahun_ajaran);

		$d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran_only($tahun_ajaran);
		$d['combo_user'] = $this->Combo_model->combo_user_rpt($id_user);

		$d['laporan_das'] = $this->Laporan_model->das($id_user,$tahun_ajaran);
		if(empty($id_user)) {
			$d['id_user'] = 'all';

		} else {
			$d['id_user'] = $id_user;
		}
		$d['tahun_ajaran'] = $tahun_ajaran;
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('laporan/das');
		$this->load->view('bottom');	
	}

	public function das_excel($id_user="",$tahun_ajaran="") {
		$d['judul'] = "Laporan DAS";
		
		if($tahun_ajaran == "") { 
			$get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1 LIMIT 1")->row();
			$tahun_ajaran = $get_tahun->tahun_ajaran;
		}
		$tahun_ajaran = str_replace("-","/",$tahun_ajaran);

		$d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran_only($tahun_ajaran);
		$d['combo_user'] = $this->Combo_model->combo_user_rpt($id_user);

		$d['laporan_das'] = $this->Laporan_model->das($id_user,$tahun_ajaran);

		$d['id_user'] = $id_user;
		$d['tahun_ajaran'] = $tahun_ajaran;
		$this->load->view('laporan/das_excel',$d);
	}

	public function rekapitulasi_excel($tahun_ajaran="",$kelas="", $id_jenis_pembayaran="") {
		if($tahun_ajaran == "") { 
			$get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1 LIMIT 1")->row();
			$tahun_ajaran = $get_tahun->tahun_ajaran;
		}
		$tahun_ajaran = str_replace("-","/",$tahun_ajaran);
		if(!empty($kelas)) {
			$get_kelas = $this->db->query("SELECT nama_kelas FROM mst_kelas WHERE id_kelas = '$kelas'")->row();
			$d['nama_kelas'] = $get_kelas->nama_kelas;
		} else {
			$d['nama_kelas'] = "";
		}

		if(!empty($id_jenis_pembayaran)) {
			$get_pos = $this->db->query("SELECT nama_pos_keuangan,tipe_pembayaran FROM mst_jenis_pembayaran INNER JOIN mst_pos_keuangan ON mst_jenis_pembayaran.id_pos_keuangan = mst_pos_keuangan.id_pos_keuangan WHERE id_jenis_pembayaran = $id_jenis_pembayaran")->row();
			$d['nama_pos'] = $get_pos->nama_pos_keuangan;
			$d['tipe_pembayaran'] = $get_pos->tipe_pembayaran;
		} else {
			$d['nama_pos'] = "";
			$d['tipe_pembayaran'] = "";
		}

		$d['kelas'] = $kelas;
		$d['combo_jenis_pembayaran'] = $this->Combo_model->combo_jenis_pembayaran_wajib($id_jenis_pembayaran,$tahun_ajaran);		
		$d['tahun_ajaran'] = $tahun_ajaran;
		$d['judul'] = "Laporan Rekapitulasi Pembayaran Siswa";
		$d['combo_kelas'] = $this->Combo_model->combo_kelas($kelas);
		$d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran_only($tahun_ajaran);
		$d['id_jenis_pembayaran'] = $id_jenis_pembayaran;
		
		if(!empty($kelas) && !empty($id_jenis_pembayaran)) {
			$d['rekapitulasi'] = $this->Laporan_model->get_rekapitulasi($id_jenis_pembayaran,$kelas);
		} else {
			$d['rekapitulasi'] = "";
		}

		$this->load->view('laporan/rekapitulasi_excel',$d);
	}
	public function rekapitulasi($tahun_ajaran="",$kelas="", $id_jenis_pembayaran="") {
		if($tahun_ajaran == "") { 
			$get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1 LIMIT 1")->row();
			$tahun_ajaran = $get_tahun->tahun_ajaran;
		}
		$tahun_ajaran = str_replace("-","/",$tahun_ajaran);
		if(!empty($kelas)) {
			$get_kelas = $this->db->query("SELECT nama_kelas FROM mst_kelas WHERE id_kelas = '$kelas'")->row();
			$d['nama_kelas'] = $get_kelas->nama_kelas;
		} else {
			$d['nama_kelas'] = "";
		}

		if(!empty($id_jenis_pembayaran)) {
			$get_pos = $this->db->query("SELECT nama_pos_keuangan,tipe_pembayaran FROM mst_jenis_pembayaran INNER JOIN mst_pos_keuangan ON mst_jenis_pembayaran.id_pos_keuangan = mst_pos_keuangan.id_pos_keuangan WHERE id_jenis_pembayaran = $id_jenis_pembayaran")->row();
			$d['nama_pos'] = $get_pos->nama_pos_keuangan;
			$d['tipe_pembayaran'] = $get_pos->tipe_pembayaran;
		} else {
			$d['nama_pos'] = "";
			$d['tipe_pembayaran'] = "";
		}

		$d['kelas'] = $kelas;
		$d['combo_jenis_pembayaran'] = $this->Combo_model->combo_jenis_pembayaran_wajib($id_jenis_pembayaran,$tahun_ajaran);		
		$d['tahun_ajaran'] = $tahun_ajaran;
		$d['judul'] = "Laporan Rekapitulasi Pembayaran Siswa";
		$d['combo_kelas'] = $this->Combo_model->combo_kelas($kelas);
		$d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran_only($tahun_ajaran);
		$d['id_jenis_pembayaran'] = $id_jenis_pembayaran;
		
		if(!empty($kelas) && !empty($id_jenis_pembayaran)) {
			$d['rekapitulasi'] = $this->Laporan_model->get_rekapitulasi($id_jenis_pembayaran,$kelas);
		} else {
			$d['rekapitulasi'] = "";
		}

		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('laporan/rekapitulasi');
		$this->load->view('bottom');	
	}

	public function pembayaran($tgl_awal="",$tgl_akhir="",$id_jenis_pembayaran="",$kelas="",$nis="",$angkatan="") {
		$d['judul'] = "Laporan Pembayaran Siswa";
		$tahun_ajaran = $this->db->query("SELECT * FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = '1' GROUP BY tahun_ajaran")->row();
		$d['combo_jenis_pembayaran'] = $this->Combo_model->combo_jenis_pembayaran($id_jenis_pembayaran,$tahun_ajaran->tahun_ajaran);
		$d['combo_kelas'] = $this->Combo_model->combo_kelas_report();
		$d['nis'] = $nis;
		$d['kelas'] = $kelas;
		$d['angkatan'] = $angkatan;
		$d['id_jenis_pembayaran'] = $id_jenis_pembayaran;
		if(!empty($tgl_awal) && !empty($tgl_akhir)) {
			$d['tgl_awal'] = $tgl_awal;
			$d['tgl_akhir'] = $tgl_akhir;
			$tgl_awal 	= date("Y-m-d",strtotime($tgl_awal));
			$tgl_akhir 	= date("Y-m-d",strtotime($tgl_akhir));
			$d['pembayaran_bulanan'] = $this->Laporan_model->pembayaran_bulanan($tgl_awal,$tgl_akhir,$id_jenis_pembayaran,$kelas,$nis,$angkatan);
			$d['pembayaran_bebas'] = $this->Laporan_model->pembayaran_bebas($tgl_awal,$tgl_akhir,$id_jenis_pembayaran,$kelas,$nis,$angkatan);
		} else {
			$d['pembayaran_bulanan'] = "";
			$d['pembayaran_bebas'] = "";
			$d['tgl_awal'] = date("d-m-Y");
			$d['tgl_akhir'] = date("d-m-Y");
		}
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('laporan/pembayaran');
		$this->load->view('bottom');	
	}


	public function pembayaran_excel($tgl_awal="",$tgl_akhir="",$id_jenis_pembayaran="",$kelas="",$nis="",$angkatan="") {
		if(!empty($tgl_awal) && !empty($tgl_akhir)) {
			$d['tgl_awal'] = $tgl_awal;
			$d['tgl_akhir'] = $tgl_akhir;
			
			$tgl_awal 	= date("Y-m-d",strtotime($tgl_awal));
			$tgl_akhir 	= date("Y-m-d",strtotime($tgl_akhir));
			$d['pembayaran_bulanan'] = $this->Laporan_model->pembayaran_bulanan($tgl_awal,$tgl_akhir,$id_jenis_pembayaran,$kelas,$nis,$angkatan);
			$d['pembayaran_bebas'] = $this->Laporan_model->pembayaran_bebas($tgl_awal,$tgl_akhir,$id_jenis_pembayaran,$kelas,$nis,$angkatan);
			$this->load->view('laporan/pembayaran_excel',$d);
		} 
	}

	
	public function jurnal($tgl_awal="",$tgl_akhir="") {
		$d['judul'] = "Laporan Jurnal Umum";
		
		if(!empty($tgl_awal) && !empty($tgl_akhir)) {
			$d['tgl_awal'] = $tgl_awal;
			$d['tgl_akhir'] = $tgl_akhir;
			$tgl_awal 	= date("Y-m-d",strtotime($tgl_awal));
			$tgl_akhir 	= date("Y-m-d",strtotime($tgl_akhir));
			$d['penerimaan'] = $this->Laporan_model->penerimaan($tgl_awal,$tgl_akhir);
			$d['pengeluaran'] = $this->Laporan_model->pengeluaran($tgl_awal,$tgl_akhir);
		} else {
			$d['penerimaan'] = "";
			$d['pengeluaran'] = "";
			$d['tgl_awal'] = date("d-m-Y");
			$d['tgl_akhir'] = date("d-m-Y");
		}
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('laporan/jurnal');
		$this->load->view('bottom');	
	}

	public function jurnal_excel($tgl_awal="",$tgl_akhir="") {
		if(!empty($tgl_awal) && !empty($tgl_akhir)) {
			$d['tgl_awal'] = $tgl_awal;
			$d['tgl_akhir'] = $tgl_akhir;
			$tgl_awal 	= date("Y-m-d",strtotime($tgl_awal));
			$tgl_akhir 	= date("Y-m-d",strtotime($tgl_akhir));
			$d['penerimaan'] = $this->Laporan_model->penerimaan($tgl_awal,$tgl_akhir);
			$d['pengeluaran'] = $this->Laporan_model->pengeluaran($tgl_awal,$tgl_akhir);
			$this->load->view('laporan/jurnal_excel',$d);
		} 
	}


	public function tabungan_siswa($tgl_awal="",$tgl_akhir="",$tahun_ajaran="",$id_kelas="",$id_siswa="",$id_tabungan_siswa="") {
		if(empty($tahun_ajaran) || $tahun_ajaran == 'all') {
			$get_tahunajaran = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = '1'")->row();
			$tahun_ajaran = $get_tahunajaran->tahun_ajaran;
		} else {
			$tahun_ajaran 	= str_replace("-","/",$tahun_ajaran);
		}
		$d['judul'] = "Laporan tabungan Siswa";
		$d['combo_kelas'] = $this->Combo_model->combo_kelas_report();
		$d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran_only($tahun_ajaran);
		if(!empty($tgl_awal) && !empty($tgl_akhir)) {
			$d['tgl_awal'] = $tgl_awal;
			$d['tgl_akhir'] = $tgl_akhir;
			$tgl_awal 	= date("Y-m-d",strtotime($tgl_awal));
			$tgl_akhir 	= date("Y-m-d",strtotime($tgl_akhir));
			$d['tahun_ajaran'] = $tahun_ajaran;
			$d['tabungan_siswa'] = $this->Laporan_model->tabungan_siswa($tgl_awal,$tgl_akhir,$tahun_ajaran,$id_kelas,$id_siswa,$id_tabungan_siswa);
		} else {
			$d['tabungan_siswa'] = "";
			$d['tgl_awal'] = date("d-m-Y");
			$d['tgl_akhir'] = date("d-m-Y");
		}
		$get = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
			$d['nama_sekolah'] = $get->nama_sekolah;
			$d['alamat_sekolah'] = $get->alamat;
			$d['website'] = $get->website;
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('laporan/tabungan_siswa');
		$this->load->view('bottom');	
	}
	

	public function proses_tampil_tabungan() {
		$tgl_awal 	= $this->input->post("tgl_awal");
		$tgl_akhir 	= $this->input->post("tgl_akhir");

		if(empty($this->input->post("id_siswa"))) {
			$id_siswa = 'all';
		} else {
			$ex = explode("-",$this->input->post("id_siswa"));
			$id_siswa = $ex[0];
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
		
		if(empty($this->input->post("id_tabungan_siswa"))) {
			$id_tabungan_siswa = 'all';
		} else {
			$id_tabungan_siswa 	= $this->input->post("id_tabungan_siswa");
		}
		
		
		redirect("laporan/tabungan_siswa/".$tgl_awal."/".$tgl_akhir."/".$tahun_ajaran.'/'.$id_kelas.'/'.$id_siswa.'/'.$id_tabungan_siswa);
	}


	public function belanja_siswa($tgl_awal="",$tgl_akhir="",$tahun_ajaran="",$id_kelas="",$id_siswa="",$id_belanja_siswa="") {
		if(empty($tahun_ajaran) || $tahun_ajaran == 'all') {
			$get_tahunajaran = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = '1'")->row();
			$tahun_ajaran = $get_tahunajaran->tahun_ajaran;
		} else {
			$tahun_ajaran 	= str_replace("-","/",$tahun_ajaran);
		}
		$d['judul'] = "Laporan belanja Siswa";
		$d['combo_kelas'] = $this->Combo_model->combo_kelas_report();
		$d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran_only($tahun_ajaran);
		if(!empty($tgl_awal) && !empty($tgl_akhir)) {
			$d['tgl_awal'] = $tgl_awal;
			$d['tgl_akhir'] = $tgl_akhir;
			$tgl_awal 	= date("Y-m-d",strtotime($tgl_awal));
			$tgl_akhir 	= date("Y-m-d",strtotime($tgl_akhir));
			$d['tahun_ajaran'] = $tahun_ajaran;
			$d['belanja_siswa'] = $this->Laporan_model->belanja_siswa($tgl_awal,$tgl_akhir,$tahun_ajaran,$id_kelas,$id_siswa,$id_belanja_siswa);
		} else {
			$d['belanja_siswa'] = "";
			$d['tgl_awal'] = date("d-m-Y");
			$d['tgl_akhir'] = date("d-m-Y");
		}
		$get = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
			$d['nama_sekolah'] = $get->nama_sekolah;
			$d['alamat_sekolah'] = $get->alamat;
			$d['website'] = $get->website;
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('laporan/belanja_siswa');
		$this->load->view('bottom');	
	}
	

	public function proses_tampil_belanja() {
		$tgl_awal 	= $this->input->post("tgl_awal");
		$tgl_akhir 	= $this->input->post("tgl_akhir");

		if(empty($this->input->post("id_siswa"))) {
			$id_siswa = 'all';
		} else {
			$ex = explode("-",$this->input->post("id_siswa"));
			$id_siswa = $ex[0];
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
		
		if(empty($this->input->post("id_belanja_siswa"))) {
			$id_belanja_siswa = 'all';
		} else {
			$id_belanja_siswa 	= $this->input->post("id_belanja_siswa");
		}
		
		
		redirect("laporan/belanja_siswa/".$tgl_awal."/".$tgl_akhir."/".$tahun_ajaran.'/'.$id_kelas.'/'.$id_siswa.'/'.$id_belanja_siswa);
	}

	
}