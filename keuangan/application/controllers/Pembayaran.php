<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pembayaran extends CI_Controller {


	public function __construct(){
		parent::__construct();
		if($this->session->userdata('hak_akses') != "admin" && $this->session->userdata('hak_akses') != "kasir") { 
			redirect(base_url());
		} else {
			$this->load->Model('Pembayaran_model');
			$this->load->Model('Combo_model');
		}
	}

	public function index() {
		redirect(base_url());
	}

	public function ajax_siswa() {
		$query = $_POST['query'];
		$q = $this->db->query("SELECT nis, nama_siswa, nama_kelas FROM mst_siswa 
									INNER JOIN mst_kelas ON mst_siswa.id_kelas = mst_kelas.id_kelas WHERE nama_siswa LIKE '%$query%'");
		if($q->num_rows() > 0) {
			foreach($q->result_array() as $data) {
				$arr[] = $data['nis'].' - '.$data['nama_kelas'].' - '.$data['nama_siswa'];
			}
			echo json_encode($arr);
		}
	}


	public function ajax_history_bayar() {
		$id_pembayaran_bebas = $_GET['id_pembayaran_bebas'];
		$nis = $_GET['nis'];
		$tahun_ajaran = str_replace("/","-",$_GET["tahun_ajaran"]);
		$q = $this->db->query("SELECT * FROM pembayaran_bebas_dt WHERE id_pembayaran_bebas = $id_pembayaran_bebas");
		$no = 1;
		echo '<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Tanggal</th>
						<th>Jumlah Bayar</th>
						<th style="text-align:center;">Aksi</th>
					</tr>
				</thead>
				<tbody>';
		foreach($q->result_array() as $data) {
			echo '<tr>
					<td>'.$no.'</td>
					<td>'.date("d/m/Y",strtotime($data['tanggal'])).'</td>
					<td>Rp '.number_format($data['bayar']).'</td>
					<td style="text-align:center;">
					<a class="btn btn-success btn-xs edit-bayar" href="" data-toggle="modal" data-target="#modalEdit" data-id_pembayaran_bebas_dt="'.$data['id_pembayaran_bebas_dt'].'" data-tanggal="'.$data['tanggal'].'" data-bayar="'.number_format($data['bayar']).'" data-nis="'.$nis.'" data-tahun_ajaran="'.$tahun_ajaran.'"><i class="fa fa-edit"> </i> </a>  |
						<a class="btn btn-danger btn-xs" href="'.base_url().'pembayaran/pembayaran_bebas_hapus/'.$nis.'/'.$tahun_ajaran.'/'.$data['id_pembayaran_bebas_dt'].'"><i class="fa fa-trash"> </i> </a> 
					</td>
				  </tr>';
			$no++;
		}
			echo '</tbody>
				 </table>';
	}


	public function ajax_post_bayar_bulanan() {
		$result['nis'] = $this->input->post("nis");
		$result['tahun_ajaran'] = str_replace("/","-",$this->input->post("tahun_ajaran"));
		$where['id_pembayaran_bulanan'] = $this->input->post("id_pembayaran_bulanan");
		$in['bayar'] = $this->input->post("tagihan");
		$in['tanggal'] = date("Y-m-d");
		$this->db->update("pembayaran_bulanan",$in,$where);
		echo json_encode($result);
	}


	public function ajax_hapus_bayar_bulanan() {
		$result['nis'] = $this->input->post("nis");
		$result['tahun_ajaran'] = str_replace("/","-",$this->input->post("tahun_ajaran"));
		$where['id_pembayaran_bulanan'] = $this->input->post("id_pembayaran_bulanan");
		$in['bayar'] = 0;
		$in['tanggal'] = null;
		$this->db->update("pembayaran_bulanan",$in,$where);
		echo json_encode($result);
	}


	public function pembayaran_bebas_hapus($nis,$tahun_ajaran,$id_pembayaran_bebas_dt) {
		$where['id_pembayaran_bebas_dt'] = $id_pembayaran_bebas_dt;
		$this->db->delete("pembayaran_bebas_dt",$where);
		$this->session->set_flashdata("success","Hapus Pembayaran Berhasil");
		redirect("pembayaran/pembayaran_siswa/".$tahun_ajaran."/".$nis);
	}

	public function proses_cari_siswa() {
		$nis = explode("-",$this->input->post("nis"));
		$tahun_ajaran = str_replace("/","-",$this->input->post("tahun_ajaran"));
		redirect("pembayaran/pembayaran_siswa/".$tahun_ajaran."/".$nis[0]);
	}

	public function proses_cari_daftar_pembayaran() {
		$tahun_ajaran = str_replace("/","-",$this->input->post("tahun_ajaran"));
		redirect("pembayaran/daftar_pembayaran/".$tahun_ajaran."/".$_POST['cari']);
	}


	public function daftar_pembayaran($tahun_ajaran="",$query="") {
		if($tahun_ajaran == "") { 
			$get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1 LIMIT 1")->row();
			$tahun_ajaran = $get_tahun->tahun_ajaran;
		}
		$tahun_ajaran = str_replace("-","/",$tahun_ajaran);
		$d['judul'] = "Daftar Pembayaran Siswa";
		$d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran_only($tahun_ajaran);
		$d['tampil'] = true;
		$d['daftar_pembayaran_bulanan'] = $this->Pembayaran_model->daftar_pembayaran_bulanan($tahun_ajaran,$query);
		$d['daftar_pembayaran_bebas'] = $this->Pembayaran_model->daftar_pembayaran_bebas($tahun_ajaran,$query);
		$d['query'] = $query;
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('pembayaran_siswa/daftar_pembayaran');
		$this->load->view('bottom');
	}

	public function pembayaran_siswa($tahun_ajaran="",$nis="") {
		if($tahun_ajaran == "") { 
			$get_tahun = $this->db->query("SELECT tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1 LIMIT 1")->row();
			$tahun_ajaran = $get_tahun->tahun_ajaran;
		}

		$tahun_ajaran = str_replace("-","/",$tahun_ajaran);
		
		$d['judul'] = "Pembayaran Siswa";
		$d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran_only($tahun_ajaran);
		$d['tampil'] = true;
		if(!empty($nis) && !empty($tahun_ajaran)) {
			$cek = $this->db->query("SELECT nis,nama_siswa,nama_kelas,id_siswa,foto FROM mst_siswa 
								INNER JOIN mst_kelas ON mst_siswa.id_kelas = mst_kelas.id_kelas 
								WHERE nis = '$nis'");
			if($cek->num_rows() > 0) { 
				$data = $cek->row();
				$d['tahun_ajaran'] = $tahun_ajaran;
				$d['nis'] = $data->nis;
				$d['foto'] = $data->foto;
				$d['nama_siswa'] = $data->nama_siswa;
				$d['nama_kelas'] = $data->nama_kelas;
				$d['id_siswa'] = $data->id_siswa;
				$d['jenis_pembayaran_bulanan'] = $this->Pembayaran_model->jenis_pembayaran_bulanan($tahun_ajaran,$data->id_siswa);
				$d['jenis_pembayaran_bebas'] = $this->Pembayaran_model->jenis_pembayaran_bebas($tahun_ajaran,$data->id_siswa);
				$d['pembayaran_bulanan'] = $this->Pembayaran_model->pembayaran_siswa_bulanan($tahun_ajaran,$data->id_siswa);
				$d['pembayaran_bebas'] = $this->Pembayaran_model->pembayaran_siswa_bebas($tahun_ajaran,$data->id_siswa);
				$d['pembayaran_bulanan_terakhir'] = $this->Pembayaran_model->pembayaran_bulanan_terakhir($tahun_ajaran,$data->id_siswa);
				$d['pembayaran_bebas_terakhir'] = $this->Pembayaran_model->pembayaran_bebas_terakhir($tahun_ajaran,$data->id_siswa);
			} else {
				echo '<script>
						alert("Data siswa tidak ditemukan");
						document.location.href="'.base_url().'pembayaran/pembayaran_siswa";
					  </script>';
			}
		} else {
			$d['tampil'] = false;
			$d['tahun_ajaran'] = "";
			$d['nis'] = "";
			$d['nama_siswa'] = "";
			$d['nama_kelas'] = "";
		}
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('pembayaran_siswa/pembayaran_siswa');
		$this->load->view('bottom');	
	}

	public function pembayaran_siswa_detail($id_jenis_pembayaran,$id_siswa) {
		$d['judul'] = "Pembayaran Siswa";
		if($id_jenis_pembayaran != "" && $id_siswa != "") {
			$get = $this->db->query("SELECT * FROM vw_bayar_siswa WHERE id_siswa = '$id_siswa' AND id_jenis_pembayaran = '$id_jenis_pembayaran'")->row();
			$d['nama_siswa'] = $get->nama_siswa;
			$d['nama_pos_keuangan'] = $get->nama_pos_keuangan.' '.$get->tahun_ajaran;
			$d['nis'] = $get->nis;
			$d['nama_kelas'] = $get->nama_kelas;
			$d['tahun_ajaran'] = str_replace("/","-",$get->tahun_ajaran);
			$d['tipe_pembayaran'] = $get->tipe_pembayaran;
			$d['id_siswa'] = $get->id_siswa;
			$d['id_jenis_pembayaran'] = $id_jenis_pembayaran;
			$d['pembayaran_bulanan_detail'] = $this->Pembayaran_model->pembayaran_siswa_bulanan_detail($id_jenis_pembayaran,$id_siswa);

			$get_total = $this->db->query("SELECT SUM(tagihan) total_tagihan FROM pembayaran_bulanan WHERE id_jenis_pembayaran = '$id_jenis_pembayaran' AND id_siswa = '$id_siswa'")->row();
			$d['total_tagihan'] = $get_total->total_tagihan;

			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('pembayaran_siswa/pembayaran_siswa_detail');
			$this->load->view('bottom');	
		} else {
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}
	}

	public function pembayaran_bulanan_save() {
		$id_pembayaran_bulanan = $this->input->post("id_pembayaran_bulanan");
		$id_siswa = $this->input->post("id_siswa");
		$tot_bayar = $this->db->query("SELECT tagihan,id_jenis_pembayaran FROM pembayaran_bulanan WHERE id_pembayaran_bulanan = '$id_pembayaran_bulanan'")->row();
		$in['bayar'] = $tot_bayar->tagihan;
		$in['tanggal'] = date("Y-m-d",strtotime($this->input->post("tanggal")));
		$where['id_pembayaran_bulanan'] = $id_pembayaran_bulanan;
		$this->db->update("pembayaran_bulanan",$in,$where);
		$this->session->set_flashdata("success","Berhasil Melakukan Pembayaran");
		redirect("pembayaran/pembayaran_siswa_detail/".$tot_bayar->id_jenis_pembayaran."/".$id_siswa);
	}

	public function pembayaran_bulanan_hapus($id_pembayaran_bulanan,$id_siswa) {
		$getid = $this->db->query("SELECT id_jenis_pembayaran FROM pembayaran_bulanan WHERE id_pembayaran_bulanan = '$id_pembayaran_bulanan'")->row();
		$in['bayar'] = 0;
		$in['tanggal'] = null;
		$where['id_pembayaran_bulanan'] = $id_pembayaran_bulanan;
		$this->db->update("pembayaran_bulanan",$in,$where);
		$this->session->set_flashdata("success","Berhasil Hapus Pembayaran");
		redirect("pembayaran/pembayaran_siswa_detail/".$getid->id_jenis_pembayaran."/".$id_siswa);
	}


	public function pembayaran_bebas_save() {
		$nis = $this->input->post("nis");
		$tahun_ajaran = str_replace("/","-",$this->input->post("tahun_ajaran"));
		$in['bayar'] = $this->input->post("bayar");
		$in['tanggal'] = date("Y-m-d",strtotime($this->input->post("tanggal")));
		$in['id_pembayaran_bebas'] = $this->input->post("id_pembayaran_bebas");
		$this->db->insert("pembayaran_bebas_dt",$in);
		$this->session->set_flashdata("success","Berhasil Update Pembayaran");
		redirect("pembayaran/pembayaran_siswa/".$tahun_ajaran."/".$nis);
	}

	public function pembayaran_bebas_saveedit() {
		$in['bayar'] = $this->input->post("bayar");
		$nis = $this->input->post("nis");
		$tahun_ajaran = str_replace("/","-",$this->input->post("tahun_ajaran"));
		$where['id_pembayaran_bebas_dt'] = $this->input->post("id_pembayaran_bebas_dt");
		$this->db->update("pembayaran_bebas_dt",$in,$where);
		$this->session->set_flashdata("success","Berhasil Update Pembayaran");
		redirect("pembayaran/pembayaran_siswa/".$tahun_ajaran."/".$nis);
	}
	
	public function cetak_semua_tagihan($tahun_ajaran, $id_siswa) {
		$sekolah = $this->db->query("SELECT * FROM mst_sekolah")->row();
		$siswa = $this->db->query("SELECT nama_siswa,nis,id_siswa,nama_kelas FROM mst_siswa INNER JOIN mst_kelas ON mst_siswa.id_kelas = mst_kelas.id_kelas WHERE id_siswa = '$id_siswa'")->row();
		$d['nama_siswa'] = $siswa->nama_siswa;
		$d['nis'] = $siswa->nis;
		$d['id_siswa'] = $siswa->id_siswa;
		$d['nama_sekolah'] = $sekolah->nama_sekolah;
		$d['alamat'] = $sekolah->alamat;
		$d['no_telepon'] = $sekolah->no_telepon;
		$d['email'] = $sekolah->email;
		$d['logo'] = $sekolah->logo;
		$d['tahun_ajaran'] = str_replace("-","/",$tahun_ajaran);
		$d['nis'] = $siswa->nis;
		$d['nama_kelas'] = $siswa->nama_kelas;
		$this->load->view("cetak/bukti_semua_tagihan",$d);
	}

	public function cetak_bukti() {
		$sekolah = $this->db->query("SELECT * FROM mst_sekolah")->row();
		$siswa = $this->db->query("SELECT nama_siswa,nis,id_siswa FROM mst_siswa WHERE nis = '$_GET[nis]'")->row();
		$d['nama_siswa'] = $siswa->nama_siswa;
		$d['nis'] = $siswa->nis;
		$d['id_siswa'] = $siswa->id_siswa;
		$d['nama_sekolah'] = $sekolah->nama_sekolah;
		$d['alamat'] = $sekolah->alamat;
		$d['no_telepon'] = $sekolah->no_telepon;
		$d['email'] = $sekolah->email;
		$d['logo'] = $sekolah->logo;

		$d['nis'] = $_GET['nis'];
		$d['nama_kelas'] = $_GET['kelas'];
		$d['tanggal'] = date("Y-m-d",strtotime($_GET['tanggal']));
		$this->load->view("cetak/bukti_bayar",$d);
	}


	public function cetak_bukti_bulanan($id_pembayaran_bulanan,$id_siswa) {
		$sekolah = $this->db->query("SELECT * FROM mst_sekolah")->row();
		$siswa = $this->db->query("SELECT nama_siswa,nama_kelas,nis,id_siswa FROM mst_siswa 
									INNER JOIN mst_kelas ON mst_siswa.id_kelas = mst_kelas.id_kelas WHERE id_siswa = '$id_siswa'")->row();
		$d['id_pembayaran_bulanan'] = $id_pembayaran_bulanan;
		$d['nama_siswa'] = $siswa->nama_siswa;
		$d['nama_kelas'] = $siswa->nama_kelas;
		$d['nis'] = $siswa->nis;
		$d['id_siswa'] = $siswa->id_siswa;
		$d['nama_sekolah'] = $sekolah->nama_sekolah;
		$d['alamat'] = $sekolah->alamat;
		$d['no_telepon'] = $sekolah->no_telepon;
		$d['email'] = $sekolah->email;
		$d['logo'] = $sekolah->logo;

		$this->load->view("cetak/bukti_bayar_bulanan",$d);
	}

	public function cetak_bukti_bulanan_all() {
		
		$id_siswa = $this->input->post("id_siswa");
		$id_jenis_pembayaran = $this->input->post("id_jenis_pembayaran");
		$id_pembayaran_bulanan = $this->input->post("id_pembayaran_bulanan");
		if(empty($id_pembayaran_bulanan)) {
			echo '<script>
						alert("Silahkan pilih bulan yang ingin dicetak terlebih dahulu");
						document.location.href="'.base_url().'pembayaran/pembayaran_siswa_detail/'.$id_jenis_pembayaran.'/'.$id_siswa.'";
					  </script>';
		} else {
			$d['id_pembayaran_bulanan'] = implode(",",$id_pembayaran_bulanan);
			$sekolah = $this->db->query("SELECT * FROM mst_sekolah")->row();
			$siswa = $this->db->query("SELECT nama_siswa,nama_kelas,nis,id_siswa FROM mst_siswa 
										INNER JOIN mst_kelas ON mst_siswa.id_kelas = mst_kelas.id_kelas WHERE id_siswa = '$id_siswa'")->row();
			$d['nama_siswa'] = $siswa->nama_siswa;
			$d['nama_kelas'] = $siswa->nama_kelas;
			$d['nis'] = $siswa->nis;
			$d['id_siswa'] = $siswa->id_siswa;
			$d['nama_sekolah'] = $sekolah->nama_sekolah;
			$d['alamat'] = $sekolah->alamat;
			$d['no_telepon'] = $sekolah->no_telepon;
			$d['email'] = $sekolah->email;
			$d['logo'] = $sekolah->logo;
			$d['id_jenis_pembayaran'] = $id_jenis_pembayaran;
			$this->load->view("cetak/bukti_bayar_bulanan_all",$d);
		}
	}

	public function cetak_bukti_bayar_bebas($id_pembayaran_bebas,$id_siswa) {
		$sekolah = $this->db->query("SELECT * FROM mst_sekolah")->row();
		$siswa = $this->db->query("SELECT nama_siswa,nama_kelas,nis,id_siswa FROM mst_siswa 
									INNER JOIN mst_kelas ON mst_siswa.id_kelas = mst_kelas.id_kelas WHERE id_siswa = '$id_siswa'")->row();
		$d['id_pembayaran_bebas'] = $id_pembayaran_bebas;
		$d['nama_siswa'] = $siswa->nama_siswa;
		$d['nama_kelas'] = $siswa->nama_kelas;
		$d['nis'] = $siswa->nis;
		$d['id_siswa'] = $siswa->id_siswa;
		$d['nama_sekolah'] = $sekolah->nama_sekolah;
		$d['alamat'] = $sekolah->alamat;
		$d['no_telepon'] = $sekolah->no_telepon;
		$d['email'] = $sekolah->email;
		$d['logo'] = $sekolah->logo;

		$this->load->view("cetak/bukti_bayar_bebas",$d);
	}
}