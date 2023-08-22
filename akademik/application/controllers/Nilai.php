<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->Model('Nilai_model');
	}

	public function index() {
		redirect(base_url());
	}



	public function nilai_capaian_hasil_belajar() {
		if($this->session->userdata('hak_akses') == "guru" || $this->session->userdata('hak_akses') == "admin") { 
			$d['judul'] = "Nilai Capaian Hasil Belajar";
			$id_guru = $this->session->userdata("id_guru");
			if($this->session->userdata('hak_akses') == "guru") {
				$d['walikelas'] = $this->Nilai_model->walikelas($id_guru);
			} else {
				$d['walikelas'] = $this->Nilai_model->walikelas_all();
			}

			$this->load->view('top',$d);
			if($this->session->userdata('hak_akses') == "guru") {
				$this->load->view('menu_guru');
			} else {
				$this->load->view('menu');
			}
			$this->load->view('nilai/nilai_capaian_hasil_belajar');
			$this->load->view('bottom');
		} else {
			redirect(base_url());
		}
	}

	public function input_nilai_capaian_hasil_belajar($id_kelas) {
		if($this->session->userdata('hak_akses') == "guru" || $this->session->userdata('hak_akses') == "admin" && $id_kelas != "") { 
			$get_tahun_ajaran = $this->db->query("SELECT * FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();
			$id_kelas = preg_replace( '/[^0-9]/', '', $id_kelas );
			$id_tahun_ajaran = $get_tahun_ajaran->id_tahun_ajaran;
			$cek = $this->db->query("SELECT nama_kelas FROM mst_walikelas 
										INNER JOIN mst_kelas ON mst_walikelas.id_kelas = mst_kelas.id_kelas WHERE mst_walikelas.id_kelas = $id_kelas AND tahun_ajaran = '$get_tahun_ajaran->tahun_ajaran'");
			if($cek->num_rows() > 0) { 
				$nilai_capaian_hasil_belajar = $cek->row();
				$d['judul'] = "Nilai Capaian Hasil Belajar ".$nilai_capaian_hasil_belajar->nama_kelas." - Tahun Ajaran ".$get_tahun_ajaran->tahun_ajaran." - Semester ".$get_tahun_ajaran->semester;
				$cek = $this->db->query("SELECT id_nilai_capaian_hasil_belajar FROM nilai_capaian_hasil_belajar WHERE id_kelas = $id_kelas AND id_tahun_ajaran = $id_tahun_ajaran");
				if($cek->num_rows() == 0) {
					$get = $this->db->query("SELECT id_siswa FROM mst_siswa WHERE id_kelas = '$id_kelas'");
					foreach($get->result_array() as $data) {
						$in['id_siswa'] = $data['id_siswa'];
						$in['id_kelas'] = $id_kelas;
						$in['id_tahun_ajaran'] = $id_tahun_ajaran;
						$this->db->insert("nilai_capaian_hasil_belajar",$in);
					}
				}
				$d['nilai_siswa'] = $this->Nilai_model->nilai_capaian_hasil_belajar_siswa($id_kelas,$id_tahun_ajaran);
				$this->load->view('top',$d);
				if($this->session->userdata('hak_akses') == "guru") {
					$this->load->view('menu_guru');
				} else {
					$this->load->view('menu');
				}
				$this->load->view('nilai/nilai_capaian_hasil_belajar_input');
				$this->load->view('bottom');
			} else {
				$this->load->view('404');
			}
		} else {
			redirect(base_url());
		}
	}

	public function nilai_capaian_hasil_belajar_save() {
		if(!empty($this->input->post("id_nilai_capaian_hasil_belajar"))) {
			if(!empty($this->input->post("spiritual_predikat"))) {
				$in['spiritual_predikat'] = $this->input->post("spiritual_predikat");
			}
		
			if(!empty($this->input->post("spiritual_deskripsi"))) {
				$in['spiritual_deskripsi'] = $this->input->post("spiritual_deskripsi");
			}

			if(!empty($this->input->post("sosial_predikat"))) {
				$in['sosial_predikat'] = $this->input->post("sosial_predikat");
			}

			if(!empty($this->input->post("sosial_deskripsi"))) {
				$in['sosial_deskripsi'] = $this->input->post("sosial_deskripsi");
			}
			
			$where['id_nilai_capaian_hasil_belajar'] = $this->input->post("id_nilai_capaian_hasil_belajar");
			$this->db->update("nilai_capaian_hasil_belajar",$in,$where);
		}
	}


	public function nilai_ekstrakulikuler() {
		if($this->session->userdata('hak_akses') == "guru" || $this->session->userdata('hak_akses') == "admin") { 
			$d['judul'] = "Nilai Ekstrakulikuler";
			$id_guru = $this->session->userdata("id_guru");
			if($this->session->userdata('hak_akses') == "guru") {
				$d['walikelas'] = $this->Nilai_model->walikelas($id_guru);
			} else {
				$d['walikelas'] = $this->Nilai_model->walikelas_all();
			}

			$this->load->view('top',$d);
			if($this->session->userdata('hak_akses') == "guru") {
				$this->load->view('menu_guru');
			} else {
				$this->load->view('menu');
			}
			$this->load->view('nilai/nilai_ekstrakulikuler');
			$this->load->view('bottom');
		} else {
			redirect(base_url());
		}
	}


	public function input_nilai_ekstrakulikuler($id_kelas) {
		if($this->session->userdata('hak_akses') == "guru" || $this->session->userdata('hak_akses') == "admin" && $id_kelas != "") { 
			$get_tahun_ajaran = $this->db->query("SELECT * FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();
			$id_kelas = preg_replace( '/[^0-9]/', '', $id_kelas );
			$id_tahun_ajaran = $get_tahun_ajaran->id_tahun_ajaran;
			$cek = $this->db->query("SELECT nama_kelas FROM mst_walikelas 
										INNER JOIN mst_kelas ON mst_walikelas.id_kelas = mst_kelas.id_kelas WHERE mst_walikelas.id_kelas = $id_kelas AND tahun_ajaran = '$get_tahun_ajaran->tahun_ajaran'");
			if($cek->num_rows() > 0) { 
				$nilai_ekstrakulikuler = $cek->row();
				$d['judul'] = "Nilai Prestasi ".$nilai_ekstrakulikuler->nama_kelas." - Tahun Ajaran ".$get_tahun_ajaran->tahun_ajaran." - Semester ".$get_tahun_ajaran->semester;
				$cek = $this->db->query("SELECT id_nilai_ekstrakulikuler FROM nilai_ekstrakulikuler WHERE id_kelas = $id_kelas AND id_tahun_ajaran = $id_tahun_ajaran");
				if($cek->num_rows() == 0) {
					$get = $this->db->query("SELECT id_siswa FROM mst_siswa WHERE id_kelas = '$id_kelas'");
					foreach($get->result_array() as $data) {
						$in['id_siswa'] = $data['id_siswa'];
						$in['id_kelas'] = $id_kelas;
						$in['id_tahun_ajaran'] = $id_tahun_ajaran;
						$this->db->insert("nilai_ekstrakulikuler",$in);
					}
				}
				$d['nilai_siswa'] = $this->Nilai_model->nilai_ekstrakulikuler_siswa($id_kelas,$id_tahun_ajaran);
				$this->load->view('top',$d);
				if($this->session->userdata('hak_akses') == "guru") {
					$this->load->view('menu_guru');
				} else {
					$this->load->view('menu');
				}
				$this->load->view('nilai/nilai_ekstrakulikuler_input');
				$this->load->view('bottom');
			} else {
				$this->load->view('404');
			}
		} else {
			redirect(base_url());
		}
	}

	public function nilai_ekstrakulikuler_save() {
		if(!empty($this->input->post("id_nilai_ekstrakulikuler"))) {
			if(!empty($this->input->post("kegiatan"))) {
				$in['kegiatan'] = $this->input->post("kegiatan");
			}
		
			if(!empty($this->input->post("deskripsi"))) {
				$in['deskripsi'] = $this->input->post("deskripsi");
			}

			if(!empty($this->input->post("nilai"))) {
				$in['nilai'] = $this->input->post("nilai");
			}
			
			$where['id_nilai_ekstrakulikuler'] = $this->input->post("id_nilai_ekstrakulikuler");
			$this->db->update("nilai_ekstrakulikuler",$in,$where);
		}
	}

	public function nilai_prestasi() {
		if($this->session->userdata('hak_akses') == "guru" || $this->session->userdata('hak_akses') == "admin") { 
			$d['judul'] = "Nilai Prestasi";
			if($this->session->userdata('hak_akses') == "guru") {
				$id_guru = $this->session->userdata("id_guru");
				$d['walikelas'] = $this->Nilai_model->walikelas($id_guru);
			} else {
				$d['walikelas'] = $this->Nilai_model->walikelas_all();
			}

			$this->load->view('top',$d);
			if($this->session->userdata('hak_akses') == "guru") {
				$this->load->view('menu_guru');
			} else {
				$this->load->view('menu');
			}
			$this->load->view('nilai/nilai_prestasi');
			$this->load->view('bottom');
		} else {
			redirect(base_url());
		}
	}

	public function input_nilai_prestasi($id_kelas) {
		if($this->session->userdata('hak_akses') == "guru" || $this->session->userdata('hak_akses') == "admin" && $id_kelas != "") { 
			$get_tahun_ajaran = $this->db->query("SELECT * FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();
			$id_kelas = preg_replace( '/[^0-9]/', '', $id_kelas );
			$id_tahun_ajaran = $get_tahun_ajaran->id_tahun_ajaran;
			$cek = $this->db->query("SELECT nama_kelas FROM mst_walikelas 
										INNER JOIN mst_kelas ON mst_walikelas.id_kelas = mst_kelas.id_kelas WHERE mst_walikelas.id_kelas = $id_kelas AND tahun_ajaran = '$get_tahun_ajaran->tahun_ajaran'");
			if($cek->num_rows() > 0) { 
				$nilai_prestasi = $cek->row();
				$d['judul'] = "Nilai Prestasi ".$nilai_prestasi->nama_kelas." - Tahun Ajaran ".$get_tahun_ajaran->tahun_ajaran." - Semester ".$get_tahun_ajaran->semester;
				$cek = $this->db->query("SELECT id_nilai_prestasi FROM nilai_prestasi WHERE id_kelas = $id_kelas AND id_tahun_ajaran = $id_tahun_ajaran");
				if($cek->num_rows() == 0) {
					$get = $this->db->query("SELECT id_siswa FROM mst_siswa WHERE id_kelas = '$id_kelas'");
					foreach($get->result_array() as $data) {
						$in['id_siswa'] = $data['id_siswa'];
						$in['id_kelas'] = $id_kelas;
						$in['id_tahun_ajaran'] = $id_tahun_ajaran;
						$this->db->insert("nilai_prestasi",$in);
					}
				}
				$d['nilai_siswa'] = $this->Nilai_model->nilai_prestasi_siswa($id_kelas,$id_tahun_ajaran);
				$this->load->view('top',$d);
				if($this->session->userdata('hak_akses') == "guru") {
					$this->load->view('menu_guru');
				} else {
					$this->load->view('menu');
				}
				$this->load->view('nilai/nilai_prestasi_input');
				$this->load->view('bottom');
			} else {
				$this->load->view('404');
			}
		} else {
			redirect(base_url());
		}
	}

	public function nilai_prestasi_save() {
		if(!empty($this->input->post("id_nilai_prestasi"))) {
			if(!empty($this->input->post("kegiatan"))) {
				$in['kegiatan'] = $this->input->post("kegiatan");
			}
		
			if(!empty($this->input->post("keterangan"))) {
				$in['keterangan'] = $this->input->post("keterangan");
			}
			
			$where['id_nilai_prestasi'] = $this->input->post("id_nilai_prestasi");
			$this->db->update("nilai_prestasi",$in,$where);
		}
	}

	public function nilai_raport() {
		if($this->session->userdata('hak_akses') == "guru" || $this->session->userdata('hak_akses') == "admin") { 
			$d['judul'] = "Nilai Raport";
			if($this->session->userdata('hak_akses') == "guru") {
				$id_guru = $this->session->userdata("id_guru");
				$d['jadwal'] = $this->Nilai_model->jadwal($id_guru);
			} else {
				$d['jadwal'] = $this->Nilai_model->jadwal_all();
			}

			$this->load->view('top',$d);
			if($this->session->userdata('hak_akses') == "guru") {
				$this->load->view('menu_guru');
			} else {
				$this->load->view('menu');
			}
			$this->load->view('nilai/nilai_raport');
			$this->load->view('bottom');
		} else {
			redirect(base_url());
		}
	}

	public function input_nilai_raport($id_jadwal_pelajaran) {
		if($this->session->userdata('hak_akses') == "guru" || $this->session->userdata('hak_akses') == "admin" && $id_jadwal_pelajaran != "") { 
			$id_jadwal_pelajaran = preg_replace( '/[^0-9]/', '', $id_jadwal_pelajaran );
			$cek = $this->db->query("SELECT id_jadwal_pelajaran,jadwal_pelajaran.id_kelas,nama_kelas,nama_mapel,tahun_ajaran,semester,kkm FROM jadwal_pelajaran 
										INNER JOIN mst_kelas ON jadwal_pelajaran.id_kelas = mst_kelas.id_kelas 
										INNER JOIN mst_tahun_ajaran ON jadwal_pelajaran.id_tahun_ajaran = mst_tahun_ajaran.id_tahun_ajaran 
										INNER JOIN mst_mapel ON jadwal_pelajaran.id_mapel = mst_mapel.id_mapel WHERE id_jadwal_pelajaran = 
										$id_jadwal_pelajaran");
			if($cek->num_rows() > 0) { 
				$nilai_raport = $cek->row();
				$d['judul'] = "Nilai Raport ".$nilai_raport->nama_kelas." - ".$nilai_raport->nama_mapel." - Tahun Ajaran ".$nilai_raport->tahun_ajaran." - Semester ".$nilai_raport->semester;
				$d['id_jadwal_pelajaran'] = $nilai_raport->id_jadwal_pelajaran;
				$cek = $this->db->query("SELECT id_nilai_raport FROM nilai_raport WHERE id_jadwal_pelajaran = $id_jadwal_pelajaran");
				if($cek->num_rows() == 0) {
					$get = $this->db->query("SELECT id_siswa FROM mst_siswa WHERE id_kelas = '$nilai_raport->id_kelas'");
					foreach($get->result_array() as $data) {
						$in['id_siswa'] = $data['id_siswa'];
						$in['id_jadwal_pelajaran'] = $id_jadwal_pelajaran;
						$in['kkm'] = $nilai_raport->kkm;
						$this->db->insert("nilai_raport",$in);
					}
				}
				$d['nilai_siswa'] = $this->Nilai_model->nilai_raport_siswa($id_jadwal_pelajaran);
				$this->load->view('top',$d);
				if($this->session->userdata('hak_akses') == "guru") {
					$this->load->view('menu_guru');
				} else {
					$this->load->view('menu');
				}
				$this->load->view('nilai/nilai_raport_input');
				$this->load->view('bottom');
			} else {
				$this->load->view('404');
			}
		} else {
			redirect(base_url());
		}
	}

	public function nilai_raport_save() {
		if(!empty($this->input->post("id_nilai_raport"))) {
			if(!empty($this->input->post("nilai_pengetahuan"))) {
				$in['nilai_pengetahuan'] = $this->input->post("nilai_pengetahuan");
			}
		
			if(!empty($this->input->post("nilai_keterampilan"))) {
				$in['nilai_keterampilan'] = $this->input->post("nilai_keterampilan");
			}
			
			$where['id_nilai_raport'] = $this->input->post("id_nilai_raport");
			$this->db->update("nilai_raport",$in,$where);
		}
	}

	public function nilai_uts() {
		if($this->session->userdata('hak_akses') == "guru" || $this->session->userdata('hak_akses') == "admin") { 
			$d['judul'] = "Nilai UTS";
			if($this->session->userdata('hak_akses') == "guru") {
				$id_guru = $this->session->userdata("id_guru");
				$d['jadwal'] = $this->Nilai_model->jadwal($id_guru);
			} else {
				$d['jadwal'] = $this->Nilai_model->jadwal_all();
			}

			$this->load->view('top',$d);
			if($this->session->userdata('hak_akses') == "guru") {
				$this->load->view('menu_guru');
			} else {
				$this->load->view('menu');
			}
			$this->load->view('nilai/nilai_uts');
			$this->load->view('bottom');
		} else {
			redirect(base_url());
		}
	}

	public function input_nilai_uts($id_jadwal_pelajaran) {
		if($this->session->userdata('hak_akses') == "guru" || $this->session->userdata('hak_akses') == "admin" && $id_jadwal_pelajaran != "") { 
			$id_jadwal_pelajaran = preg_replace( '/[^0-9]/', '', $id_jadwal_pelajaran );
			$cek = $this->db->query("SELECT id_jadwal_pelajaran,jadwal_pelajaran.id_kelas,nama_kelas,kkm, tahun_ajaran, semester, nama_mapel FROM jadwal_pelajaran 
										INNER JOIN mst_kelas ON jadwal_pelajaran.id_kelas = mst_kelas.id_kelas 
										INNER JOIN mst_tahun_ajaran ON jadwal_pelajaran.id_tahun_ajaran = mst_tahun_ajaran.id_tahun_ajaran 
										INNER JOIN mst_mapel ON jadwal_pelajaran.id_mapel = mst_mapel.id_mapel  WHERE id_jadwal_pelajaran = $id_jadwal_pelajaran");
			if($cek->num_rows() > 0) { 
				$nilai_uts = $cek->row();
				$d['judul'] = "Nilai UTS ".$nilai_uts->nama_kelas." - ".$nilai_uts->nama_mapel." - Tahun Ajaran ".$nilai_uts->tahun_ajaran." - Semester ".$nilai_uts->semester;
				$d['id_jadwal_pelajaran'] = $nilai_uts->id_jadwal_pelajaran;
				$cek = $this->db->query("SELECT id_nilai_uts FROM nilai_uts WHERE id_jadwal_pelajaran = $id_jadwal_pelajaran");
				if($cek->num_rows() == 0) {
					$get = $this->db->query("SELECT id_siswa FROM mst_siswa WHERE id_kelas = '$nilai_uts->id_kelas'");
					foreach($get->result_array() as $data) {
						$in['id_siswa'] = $data['id_siswa'];
						$in['id_jadwal_pelajaran'] = $id_jadwal_pelajaran;
						$in['kkm'] = $nilai_uts->kkm;
						$this->db->insert("nilai_uts",$in);
					}
				}
				$d['nilai_siswa'] = $this->Nilai_model->nilai_uts_siswa($id_jadwal_pelajaran);
				$this->load->view('top',$d);
				if($this->session->userdata('hak_akses') == "guru") {
					$this->load->view('menu_guru');
				} else {
					$this->load->view('menu');
				}
				$this->load->view('nilai/nilai_uts_input');
				$this->load->view('bottom');
			} else {
				$this->load->view('404');
			}
		} else {
			redirect(base_url());
		}
	}

	public function nilai_uts_save() {
		if(!empty($this->input->post("id_nilai_uts"))) {
			if(!empty($this->input->post("nilai_pengetahuan"))) {
				$in['nilai_pengetahuan'] = $this->input->post("nilai_pengetahuan");
			}
		
			if(!empty($this->input->post("nilai_keterampilan"))) {
				$in['nilai_keterampilan'] = $this->input->post("nilai_keterampilan");
			}
			
			$where['id_nilai_uts'] = $this->input->post("id_nilai_uts");
			$this->db->update("nilai_uts",$in,$where);
		}
	}

	public function nilai_harian() {
		if($this->session->userdata('hak_akses') == "guru" || $this->session->userdata('hak_akses') == "admin") { 
			$d['judul'] = "Nilai Harian";
			if($this->session->userdata('hak_akses') == "guru") {
				$id_guru = $this->session->userdata("id_guru");
				$d['jadwal'] = $this->Nilai_model->jadwal($id_guru);
			} else {
				$id_guru = $this->session->userdata("id_guru");
				$d['jadwal'] = $this->Nilai_model->jadwal_all();
			}
			$this->load->view('top',$d);
			if($this->session->userdata('hak_akses') == "guru") {
				$this->load->view('menu_guru');
			} else {
				$this->load->view('menu');
			}
			$this->load->view('nilai/nilai_harian');
			$this->load->view('bottom');
		} else {
			redirect(base_url());
		}
	}

	public function kategori_nilai_harian($id_jadwal_pelajaran) {
		if($this->session->userdata('hak_akses') == "guru" || $this->session->userdata('hak_akses') == "admin" && $id_jadwal_pelajaran != "") { 
			$id_jadwal_pelajaran = preg_replace( '/[^0-9]/', '', $id_jadwal_pelajaran );
			$cek = $this->db->query("SELECT nama_kelas FROM jadwal_pelajaran INNER JOIN mst_kelas ON jadwal_pelajaran.id_kelas = mst_kelas.id_kelas WHERE id_jadwal_pelajaran = $id_jadwal_pelajaran");
			if($cek->num_rows() > 0) { 
				$jadwal = $cek->row();
				$d['judul'] = "Kategori Nilai Harian <b>$jadwal->nama_kelas</b>";
				$d['nilai_harian_kategori'] = $this->Nilai_model->nilai_harian_kategori($id_jadwal_pelajaran);
				$d['id_jadwal_pelajaran'] = $id_jadwal_pelajaran;
				$this->load->view('top',$d);
				if($this->session->userdata('hak_akses') == "guru") {
					$this->load->view('menu_guru');
				} else {
					$this->load->view('menu');
				}
				$this->load->view('nilai/nilai_harian_kategori');
				$this->load->view('bottom');
			} else {
				$this->load->view('404');
			}
		} else {
			redirect(base_url());
		}
	}


	public function kategori_save() {
		$tipe = $this->input->post("tipe");	
		$in['kategori'] = $this->input->post("kategori");
		$in['keterangan'] = $this->input->post("keterangan");
		$in['tanggal'] = date("Y-m-d");
		$in['id_jadwal_pelajaran'] = $this->input->post("id_jadwal_pelajaran");
		if($tipe == "add") {
			$cek = $this->db->query("SELECT kategori FROM nilai_harian WHERE id_jadwal_pelajaran = '$in[id_jadwal_pelajaran]' AND kategori = '$in[kategori]'");
			if($cek->num_rows() > 0) { 
				$this->session->set_flashdata("error","Gagal Input. Kategori Nilai Harian Sudah Ada");
				redirect("nilai/kategori_nilai_harian/".$in['id_jadwal_pelajaran']);	
			} else { 	
				$this->db->insert("nilai_harian",$in);
				$this->session->set_flashdata("success","Tambah Kategori Nilai Harian Berhasil");
				redirect("nilai/kategori_nilai_harian/".$in['id_jadwal_pelajaran']);	
			}
		} elseif($tipe = 'edit') {
			$where['id_nilai_harian'] 	= $this->input->post('id_nilai_harian');
			$cek = $this->db->query("SELECT kategori FROM nilai_harian WHERE kategori = '$in[kategori]' AND id_kelas != '$where[id_nilai_harian]'");
			if($cek->num_rows() > 0) { 
				$this->session->set_flashdata("error","Gagal Input. Kategori Nilai Harian Sudah Digunakan");
				redirect("nilai/kategori_nilai_harian/".$in['id_jadwal_pelajaran']);	
			} else { 	
				$this->db->update("nilai_harian",$in,$where);
				$this->session->set_flashdata("success","Ubah Kategorai Nilai Harian Berhasil");
				redirect("nilai/kategori_nilai_harian/".$in['id_jadwal_pelajaran']);	
			}
		} else {
			redirect(base_url());
		}
	}

	public function kategori_hapus($id_nilai_harian,$idm) {
		$id_nilai_harian = preg_replace( '/[^0-9]/', '', $id_nilai_harian );
		$idm = preg_replace( '/[^0-9]/', '', $idm );
		if(!empty($id_nilai_harian) && !empty($idm)) {
			$cek = $this->db->query("SELECT id_nilai_harian FROM nilai_harian WHERE id_nilai_harian = $id_nilai_harian");
			if($cek->num_rows() > 0) {
				$where['id_nilai_harian'] = $id_nilai_harian;
				$this->db->delete("nilai_harian",$where);
				redirect("nilai/kategori_nilai_harian/".$idm);
			} else {
				redirect(base_url());
			}
		} else {
			redirect(base_url());
		}
	}


	public function input_nilai_harian($id_nilai_harian) {
		if($this->session->userdata('hak_akses') == "guru" || $this->session->userdata('hak_akses') == "admin" && $id_nilai_harian != "") { 
			$id_nilai_harian = preg_replace( '/[^0-9]/', '', $id_nilai_harian );
			$cek = $this->db->query("SELECT nilai_harian.id_jadwal_pelajaran,jadwal_pelajaran.id_kelas,nama_kelas,kategori FROM nilai_harian 
										INNER JOIN jadwal_pelajaran ON nilai_harian.id_jadwal_pelajaran = jadwal_pelajaran.id_jadwal_pelajaran 
										INNER JOIN mst_kelas ON jadwal_pelajaran.id_kelas = mst_kelas.id_kelas WHERE id_nilai_harian = $id_nilai_harian");
			if($cek->num_rows() > 0) { 
				$nilai_harian = $cek->row();
				$d['judul'] = "Nilai Harian <b>".$nilai_harian->nama_kelas." - ".$nilai_harian->kategori."</b>";
				$d['id_jadwal_pelajaran'] = $nilai_harian->id_jadwal_pelajaran;
				$cek = $this->db->query("SELECT id_nilai_harian_detail FROM nilai_harian_detail WHERE id_nilai_harian = $id_nilai_harian");
				if($cek->num_rows() == 0) {
					$get = $this->db->query("SELECT id_siswa FROM mst_siswa WHERE id_kelas = '$nilai_harian->id_kelas'");
					foreach($get->result_array() as $data) {
						$in['id_siswa'] = $data['id_siswa'];
						$in['id_nilai_harian'] = $id_nilai_harian;
						$this->db->insert("nilai_harian_detail",$in);
					}
				}
				$d['nilai_siswa'] = $this->Nilai_model->nilai_harian_siswa($id_nilai_harian);
				$this->load->view('top',$d);
				if($this->session->userdata('hak_akses') == "guru") {
					$this->load->view('menu_guru');
				} else {
					$this->load->view('menu');
				}
				$this->load->view('nilai/nilai_harian_input');
				$this->load->view('bottom');
			} else {
				$this->load->view('404');
			}
		} else {
			redirect(base_url());
		}
	}


	public function nilai_harian_save() {
		if(!empty($this->input->post("id_nilai_harian_detail"))) {
			$in['nilai'] = $this->input->post("nilai");
			$where['id_nilai_harian_detail'] = $this->input->post("id_nilai_harian_detail");
			$this->db->update("nilai_harian_detail",$in,$where);
		}
	}
}
