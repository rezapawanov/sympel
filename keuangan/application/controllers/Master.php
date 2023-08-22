<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {


	public function __construct(){
		parent::__construct();
		if($this->session->userdata('hak_akses') != "admin" && $this->session->userdata('hak_akses') != "kasir") { 
			redirect(base_url());
		} else {
			$this->load->Model('Master_model');
			$this->load->Model('Combo_model');
		}
	}


	public function index() {
		redirect(base_url());
	}


	public function pos_keuangan() {
		$d['judul'] = "Data Pos Keuangan";
		$d['pos_keuangan'] = $this->Master_model->pos_keuangan();
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('pos_keuangan/pos_keuangan');
		$this->load->view('bottom');	
	}


	public function pos_keuangan_tambah() {
		$d['judul'] = "Data Pos Keuangan";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['nama_pos_keuangan'] = "";
		$d['id_pos_keuangan'] = "";
		$d['aktif_pos_keuangan'] = "";
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('pos_keuangan/pos_keuangan_tambah');
		$this->load->view('bottom');
		
	}


	public function pos_keuangan_edit($id_pos_keuangan) {
		$cek = $this->db->query("SELECT id_pos_keuangan FROM mst_pos_keuangan WHERE id_pos_keuangan = '$id_pos_keuangan'");
		if($cek->num_rows() > 0) { 
			$d['judul'] = "Data Pos Keuangan";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$get = $this->Master_model->pos_keuangan_edit($id_pos_keuangan);
			$data = $get->row();
			$d['id_pos_keuangan'] = $data->id_pos_keuangan;
			$d['nama_pos_keuangan'] = $data->nama_pos_keuangan;
			$d['aktif_pos_keuangan'] = $data->aktif_pos_keuangan;
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('pos_keuangan/pos_keuangan_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}	
	}

	public function pos_keuangan_save() {
			$tipe = $this->input->post("tipe");	
			$in['nama_pos_keuangan'] = $this->input->post("nama_pos_keuangan");
			
			if($tipe == "add") {
				$cek = $this->db->query("SELECT nama_pos_keuangan FROM mst_pos_keuangan WHERE nama_pos_keuangan = '$in[nama_pos_keuangan]'");
				if($cek->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Nama Pos Keuangan Sudah Digunakan");
					redirect("master/pos_keuangan_tambah");	
				} else { 	
					$this->db->insert("mst_pos_keuangan",$in);
					$this->session->set_flashdata("success","Tambah Data Pos Keuangan Berhasil");
					redirect("master/pos_keuangan");	
				}
			} elseif($tipe = 'edit') {
				$where['id_pos_keuangan'] 	= $this->input->post('id_pos_keuangan');
				$cek = $this->db->query("SELECT nama_pos_keuangan FROM mst_pos_keuangan WHERE nama_pos_keuangan = '$in[nama_pos_keuangan]' AND id_pos_keuangan != '$where[id_pos_keuangan]'");
				if($cek->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input. Nama Pos Keuangan Sudah Digunakan");
					redirect("master/pos_keuangan_edit/".$this->input->post("id_pos_keuangan"));
				} else { 	
					$in['aktif_pos_keuangan'] = $this->input->post("aktif_pos_keuangan");
					$this->db->update("mst_pos_keuangan",$in,$where);
					
					$this->session->set_flashdata("success","Ubah Data Pos Keuangan Berhasil");
					redirect("master/pos_keuangan");	
				}
				
			} else {
				redirect(base_url());
			}
	}

	public function jenis_pembayaran() {
		$d['judul'] = "Data Jenis Pembayaran";
		$d['jenis_pembayaran'] = $this->Master_model->jenis_pembayaran();
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('jenis_pembayaran/jenis_pembayaran');
		$this->load->view('bottom');	
	}


	public function jenis_pembayaran_tambah() {
		$d['judul'] = "Data Jenis Pembayaran";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['tahun_ajaran'] = "";
		$d['id_jenis_pembayaran'] = "";
		$d['tipe_pembayaran'] = "";
		$d['aktif_jenis_pembayaran'] = "";
		$d['combo_pos_keuangan'] = $this->Combo_model->combo_pos_keuangan();
		$d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran_only();

		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('jenis_pembayaran/jenis_pembayaran_tambah');
		$this->load->view('bottom');
		
	}


	public function jenis_pembayaran_edit($id_jenis_pembayaran) {
		$cek = $this->db->query("SELECT * FROM mst_jenis_pembayaran WHERE id_jenis_pembayaran = '$id_jenis_pembayaran'");
		if($cek->num_rows() > 0) { 
			$d['judul'] = "Data Jenis Pembayaran";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$get = $this->Master_model->jenis_pembayaran_edit($id_jenis_pembayaran);
			$data = $get->row();
			$d['id_jenis_pembayaran'] = $data->id_jenis_pembayaran;
			$d['tahun_ajaran'] = $data->tahun_ajaran;
			$d['tipe_pembayaran'] = $data->tipe_pembayaran;
			$d['aktif_jenis_pembayaran'] = $data->aktif_jenis_pembayaran;
			$d['combo_pos_keuangan'] = $this->Combo_model->combo_pos_keuangan($data->id_pos_keuangan);
			$d['combo_tahun_ajaran'] = $this->Combo_model->combo_tahun_ajaran_only($data->tahun_ajaran);
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('jenis_pembayaran/jenis_pembayaran_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}	
	}

	public function jenis_pembayaran_save() {
			$tipe = $this->input->post("tipe");	
			$in['tahun_ajaran'] = $this->input->post("tahun_ajaran");
			$in['id_pos_keuangan'] = $this->input->post("id_pos_keuangan");
			$in['tipe_pembayaran'] = $this->input->post("tipe_pembayaran");

			if($tipe == "add") {
				$cek = $this->db->query("SELECT tahun_ajaran FROM mst_jenis_pembayaran WHERE tahun_ajaran = '$in[tahun_ajaran]' AND id_pos_keuangan = '$in[id_pos_keuangan]'");
				if($cek->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input.  Jenis Pembayaran Sudah Digunakan");
					redirect("master/jenis_pembayaran_tambah");	
				} else { 	
					$this->db->insert("mst_jenis_pembayaran",$in);
					$insert_id = $this->db->insert_id();
					$this->session->set_flashdata("success","Tambah Data Jenis Pembayaran Berhasil");
					redirect("master/tarif_pembayaran/".$insert_id);	
				}
			} elseif($tipe = 'edit') {
				$where['id_jenis_pembayaran'] 	= $this->input->post('id_jenis_pembayaran');
				$cek = $this->db->query("SELECT tahun_ajaran FROM mst_jenis_pembayaran WHERE tahun_ajaran = '$in[tahun_ajaran]' AND id_pos_keuangan = '$in[id_pos_keuangan]' AND id_jenis_pembayaran != '$where[id_jenis_pembayaran]'");
				if($cek->num_rows() > 0) { 
					$this->session->set_flashdata("error","Gagal Input.  Jenis Pembayaran Sudah Digunakan");
					redirect("master/jenis_pembayaran/jenis_pembayaran_edit/".$this->input->post("id_jenis_pembayaran"));
				} else { 	
					$in['aktif_jenis_pembayaran'] = $this->input->post("aktif_jenis_pembayaran");
					$this->db->update("mst_jenis_pembayaran",$in,$where);
					$this->session->set_flashdata("success","Ubah Data Jenis Pembayaran Berhasil");
					redirect("master/jenis_pembayaran");	
				}
				
			} else {
				redirect(base_url());
			}
	}


	public function proses_tarif() {
		$id_jenis_pembayaran = $this->input->post("id_jenis_pembayaran");
		$id_kelas = $this->input->post("id_kelas");
		redirect("master/tarif_pembayaran/".$id_jenis_pembayaran."/".$id_kelas);
	}

	public function tarif_pembayaran($id,$kelas="") {
		$cek = $this->db->query("SELECT * FROM vw_jenis_bayar WHERE id_jenis_pembayaran = $id");
		if($cek->num_rows() > 0) {
			$d['judul'] = "Tarif Pembayaran";
			$d['combo_kelas'] = $this->Combo_model->combo_kelas($kelas);
			$data = $cek->row();
			$d['nama_pos_keuangan'] = $data->nama_pos_keuangan;
			$d['tahun_ajaran'] = $data->tahun_ajaran;
			$d['id_jenis_pembayaran'] = $id;
			$d['tipe_pembayaran'] = $data->tipe_pembayaran;
			if(!empty($kelas)) { 
				$d['siswa'] = $this->Master_model->tarif_bayar_kelas($kelas,$id,$data->tipe_pembayaran);
			} else {
				$d['siswa'] = "";
			}
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('tarif_pembayaran/tarif_pembayaran');
			$this->load->view('bottom');
		} else {
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}
	}

	public function tarif_pembayaran_kelas($id) {
		$cek = $this->db->query("SELECT * FROM vw_jenis_bayar WHERE id_jenis_pembayaran = $id");
		if($cek->num_rows() > 0) {
			$d['judul'] = "Tarif Pembayaran";
			$d['combo_kelas'] = $this->Combo_model->combo_kelas();
			$data = $cek->row();
			$d['nama_pos_keuangan'] = $data->nama_pos_keuangan;
			$d['tahun_ajaran'] = $data->tahun_ajaran;
			$d['tipe_pembayaran'] = $data->tipe_pembayaran;
			$d['id_jenis_pembayaran'] = $id;
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('tarif_pembayaran/tarif_pembayaran_kelas');
			$this->load->view('bottom');
		} else {
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}
	}

	public function tarif_pembayaran_siswa($id) {
		$cek = $this->db->query("SELECT * FROM vw_jenis_bayar WHERE id_jenis_pembayaran = $id");
		if($cek->num_rows() > 0) {
			$d['judul'] = "Tarif Pembayaran";
			$d['combo_kelas'] = $this->Combo_model->combo_kelas();
			$data = $cek->row();
			$d['nama_pos_keuangan'] = $data->nama_pos_keuangan;
			$d['tahun_ajaran'] = $data->tahun_ajaran;
			$d['id_jenis_pembayaran'] = $id;
			$d['tipe_pembayaran'] = $data->tipe_pembayaran;
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('tarif_pembayaran/tarif_pembayaran_siswa');
			$this->load->view('bottom');
		} else {
			$this->load->view('top',$d);
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}
	}

	public function tarif_kelas_save() {
		$in['id_kelas'] = $this->input->post("id_kelas");
		$in['id_jenis_pembayaran'] = $this->input->post("id_jenis_pembayaran");
		$this->db->query("DELETE FROM pembayaran_bulanan WHERE id_kelas = $in[id_kelas] AND id_jenis_pembayaran = $in[id_jenis_pembayaran]");
		$q_siswa = $this->db->query("SELECT id_siswa FROM mst_siswa WHERE id_kelas = $in[id_kelas]");
		if($q_siswa->num_rows() > 0) { 
			foreach($q_siswa->result_array() as $d_siswa) { 
				$q_bulan = $this->db->query("SELECT * FROM mst_bulan ORDER BY id_bulan ASC");
				foreach($q_bulan->result_array() as $d_bulan) {
					$in['id_siswa'] = $d_siswa['id_siswa'];
					$in['bulan'] = $this->input->post("nama_bulan_".$d_bulan['nama_bulan']);
					$in['tagihan'] = $this->input->post("tagihan_".$d_bulan['nama_bulan']);
					$this->db->insert("pembayaran_bulanan",$in);
				}
			}
			$this->session->set_flashdata("success","Berhasil Update Tarif Pembayaran");
			redirect("master/tarif_pembayaran/".$in['id_jenis_pembayaran']."/".$in['id_kelas']);
		} else {
			$this->session->set_flashdata("error","Gagal Input. Data Siswa Tidak Ditemukan Pada Kelas Tersebut");
			redirect("master/tarif_pembayaran/".$in['id_jenis_pembayaran']."/".$in['id_kelas']);
		}
	}


	public function tarif_kelas_save2() {
		$in['id_kelas'] = $this->input->post("id_kelas");
		$in['id_jenis_pembayaran'] = $this->input->post("id_jenis_pembayaran");
		$this->db->query("DELETE FROM pembayaran_bebas WHERE id_kelas = $in[id_kelas] AND id_jenis_pembayaran = $in[id_jenis_pembayaran]");
		$q_siswa = $this->db->query("SELECT id_siswa FROM mst_siswa WHERE id_kelas = $in[id_kelas]");
		if($q_siswa->num_rows() > 0) { 
			foreach($q_siswa->result_array() as $d_siswa) { 
				$in['id_siswa'] = $d_siswa['id_siswa'];
				$in['tagihan'] = $this->input->post("tagihan");
				$this->db->insert("pembayaran_bebas",$in);
			}
			$this->session->set_flashdata("success","Berhasil Update Tarif Pembayaran");
			redirect("master/tarif_pembayaran/".$in['id_jenis_pembayaran']."/".$in['id_kelas']);
		} else {
			$this->session->set_flashdata("error","Gagal Input. Data Siswa Tidak Ditemukan Pada Kelas Tersebut");
			redirect("master/tarif_pembayaran/".$in['id_jenis_pembayaran']."/".$in['id_kelas']);
		}
	}

	public function tarif_siswa_save() {
		$in['id_kelas'] = $this->input->post("id_kelas");
		$in['id_siswa'] = $this->input->post("id_siswa");
		$in['id_jenis_pembayaran'] = $this->input->post("id_jenis_pembayaran");
		$this->db->query("DELETE FROM pembayaran_bulanan WHERE id_kelas = $in[id_kelas] AND id_jenis_pembayaran = $in[id_jenis_pembayaran] AND id_siswa = $in[id_siswa]");
				$q_bulan = $this->db->query("SELECT * FROM mst_bulan ORDER BY id_bulan ASC");
				foreach($q_bulan->result_array() as $d_bulan) {
					$in['bulan'] = $this->input->post("nama_bulan_".$d_bulan['nama_bulan']);
					$in['tagihan'] = $this->input->post("tagihan_".$d_bulan['nama_bulan']);
					$this->db->insert("pembayaran_bulanan",$in);
				}
			$this->session->set_flashdata("success","Berhasil Update Tarif Pembayaran");
			redirect("master/tarif_pembayaran/".$in['id_jenis_pembayaran']."/".$in['id_kelas']);
		
	}

	public function tarif_siswa_save2() {
		$in['id_kelas'] = $this->input->post("id_kelas");
		$in['id_siswa'] = $this->input->post("id_siswa");
		$in['id_jenis_pembayaran'] = $this->input->post("id_jenis_pembayaran");
		$this->db->query("DELETE FROM pembayaran_bebas WHERE id_kelas = $in[id_kelas] AND id_jenis_pembayaran = $in[id_jenis_pembayaran] AND id_siswa = $in[id_siswa]");
		$in['tagihan'] = $this->input->post("tagihan");
		$this->db->insert("pembayaran_bebas",$in);
		$this->session->set_flashdata("success","Berhasil Update Tarif Pembayaran");
		redirect("master/tarif_pembayaran/".$in['id_jenis_pembayaran']."/".$in['id_kelas']);
		
	}

	public function ajax_tarif_detail() {
		$id_siswa = $_GET['id_siswa'];
		$id_kelas = $_GET['id_kelas'];
		$id_jenis_pembayaran = $_GET['id_jenis_pembayaran'];
		$q = $this->db->query("SELECT * FROM pembayaran_bulanan WHERE id_kelas = $id_kelas AND id_siswa = $id_siswa AND id_jenis_pembayaran = $id_jenis_pembayaran");
		echo '<table class="table">
					<tr>
						<th>Bulan</th>
						<th>Tarif (Rp)</th>
					</tr>';
		foreach($q->result_array() as $data) {
			echo '<tr>
					<td>'.$data['bulan'].'</td>
					<td>'.number_format($data['tagihan']).'</td>
				  </tr>';
		}
		echo '</table>';
	}

	public function ajax_combo_siswa() {
		$id_kelas = $_GET['id_kelas'];
		$q = $this->db->query("SELECT nis,id_siswa,nama_siswa FROM mst_siswa WHERE id_kelas = $id_kelas");
		
		foreach($q->result_array() as $data) {
			echo '<option value="'.$data['id_siswa'].'">'.$data['nis'].' - '.$data['nama_siswa'].'</option>';
		}
	}

	public function tarif_pembayaran_hapus($id_siswa,$id_kelas,$id_jenis_pembayaran) {
		$this->db->query("DELETE FROM pembayaran_bulanan WHERE id_kelas = $id_kelas AND id_jenis_pembayaran = $id_jenis_pembayaran AND id_siswa = $id_siswa");
		$this->session->set_flashdata("success","Hapus Pembayaran Berhasil");
		redirect("master/tarif_pembayaran/".$id_jenis_pembayaran."/".$id_kelas);
	}

	public function tarif_pembayaran_hapus2($id_siswa,$id_kelas,$id_jenis_pembayaran) {
		$this->db->query("DELETE FROM pembayaran_bebas WHERE id_kelas = $id_kelas AND id_jenis_pembayaran = $id_jenis_pembayaran AND id_siswa = $id_siswa");
		$this->session->set_flashdata("success","Hapus Pembayaran Berhasil");
		redirect("master/tarif_pembayaran/".$id_jenis_pembayaran."/".$id_kelas);
	}
}