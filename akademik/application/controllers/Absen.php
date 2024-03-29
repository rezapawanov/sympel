<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class absen extends CI_Controller {


	public function __construct(){
		parent::__construct();
		if($this->session->userdata('hak_akses') != "admin" && $this->session->userdata('hak_akses') != "gurubk" && $this->session->userdata('hak_akses') != "guru") { 
			redirect(base_url());
		} else {
			$this->load->Model('Absen_model');
		}
	}


	public function index() {
		$d['judul'] = "Data Absen Siswa";
		$get_tahunajaran = $this->db->query("SELECT tahun_ajaran,tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();
		$d['absen'] = $this->Absen_model->absen($get_tahunajaran->tahun_ajaran);
		$d['kelas'] = $this->db->get('mst_kelas')->result_array();
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('absen/absen');
		$this->load->view('bottom');
	}

	public function guru() {
		$d['judul'] = "Data Absen Guru";
		$get_tahunajaran = $this->db->query("SELECT tahun_ajaran,tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();
		$d['absen'] = $this->Absen_model->absen_guru($get_tahunajaran->tahun_ajaran);
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('absen/absen_guru');
		$this->load->view('bottom');
	}
	
	public function cek_data_kartu() {
		$d['judul'] = "Cek Data Kartu";
		$d['absen'] = $this->Absen_model->cekkartu();
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('absen/cek_kartu');
		$this->load->view('bottom');
	}

	public function cek_data_kartu_reset()
	{
		$d['judul'] = "Cek Data Kartu";
		$d['absen'] = $this->Absen_model->cekkartu();
		$this->Absen_model->delete_data_cek_kartu();
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('absen/cek_kartu');
		$this->load->view('bottom');
	}
	
	public function ajax_siswa() {
		$query = $_POST['query'];
		$q = $this->db->query("SELECT id_siswa, nama_siswa, nama_kelas FROM mst_siswa 
									INNER JOIN mst_kelas ON mst_siswa.id_kelas = mst_kelas.id_kelas WHERE nama_siswa LIKE '%$query%'");
		if($q->num_rows() > 0) {
			foreach($q->result_array() as $data) {
				$arr[] = $data['id_siswa'].' - '.$data['nama_kelas'].' - '.$data['nama_siswa'];
			}
			echo json_encode($arr);
		}
	}
	public function absen_tambah() {
		$d['judul'] = "Data Absen";
		$d['judul2'] = "Tambah";
		$d['tipe'] = 'add';
		$d['id_absen'] = "";
		$d['keterangan'] = "";
		$d['alasan'] = "";
		$d['siswa'] = '';
		$d['tanggal_absen'] = '';
		$this->load->view('top',$d);
		$this->load->view('menu');
		$this->load->view('absen/absen_tambah');
		$this->load->view('bottom');
		
	}

	public function absen_edit($id_absen)
	{
		$cek = $this->db->query("SELECT * FROM vw_absen WHERE id_absen = '$id_absen'");
		if ($cek->num_rows() > 0) {
			$d['judul'] = "Data Absen Siswa";
			$d['judul2'] = "Ubah";
			$d['tipe'] = 'edit';
			$data = $cek->row();
			$d['id_absen'] = $data->id_absen;
			$d['keterangan'] = $data->keterangan;
			$d['alasan'] = $data->alasan;
			$d['siswa'] = $data->id_siswa.'-'.$data->nama_siswa.'-'.$data->nama_kelas;
			$d['tanggal_absen'] = $data->tanggal_absen;
			$this->load->view('top', $d);
			$this->load->view('menu');
			$this->load->view('absen/absen_tambah');
			$this->load->view('bottom');
		} else {
			$this->load->view('top');
			$this->load->view('menu');
			$this->load->view('404');
			$this->load->view('bottom');
		}
	}

	public function absen_save()
	{
		$get_tahunajaran = $this->db->query("SELECT tahun_ajaran,tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();
        
        $tipe = $this->input->post("tipe");
        $ex = explode("-",$this->input->post("id_siswa"));
        $get_kelas = $this->db->query("SELECT id_kelas FROM mst_siswa WHERE id_siswa = '$ex[0]'")->row();
		$in['keterangan'] = $this->input->post("keterangan");
		$in['alasan'] = $this->input->post("alasan");
		$in['id_siswa'] = $ex[0];
		$in['id_kelas'] = $get_kelas->id_kelas;
		$in['tahun_ajaran'] = $get_tahunajaran->tahun_ajaran;

		if($this->session->userdata("hak_akses") == 'guru' || $this->session->userdata("hak_akses") == 'gurubk') {
			$in['id_guru'] = $this->session->userdata("id");
		} 
		
		$in['tanggal_absen'] = date("Y-m-d", strtotime($this->input->post('tanggal_absen')));
		if ($tipe == "add") {
			$this->db->insert("absen", $in);
			$last_id = $this->db->insert_id();

			if($in['keterangan'] == 'ALPA') {
				$get_poin = $this->db->query("SELECT poin FROM mst_poin_pelanggaran WHERE id_poin_pelanggaran = 1")->row();
				$in2['id_absen'] = $last_id;
				$in2['id_poin_pelanggaran'] = 1;
				$in2['id_kelas'] = $get_kelas->id_kelas;
				$in2['tahun_ajaran'] = $get_tahunajaran->tahun_ajaran;
				$in2['poin_minus'] = $get_poin->poin;
				$in2['tanggal'] = $in['tanggal_absen'];
				$in2['id_siswa'] = $in['id_siswa'];
				$this->db->insert("pelanggaran_siswa",$in2);
			}

			$this->session->set_flashdata("success", "Tambah  Absen Siswa Berhasil");
			redirect("absen");
		} elseif ($tipe = 'edit') {
			$where['id_absen'] 	= $this->input->post('id_absen');
			$this->db->update("absen", $in, $where);
			$this->session->set_flashdata("success", "Ubah Absen Siswa Berhasil");
			redirect("absen");
		} else {
			redirect(base_url());
		}
	}

	public function absen_hapus($id)
	{
		$where['id_absen'] = $id;
		$this->db->delete("absen", $where);
		$this->db->delete("pelanggaran_siswa",$where);
		$this->session->set_flashdata("success", "Hapus Absen Berhasil");
		redirect("absen");
	}

	public function generate_absen_guru(){
		$id_guru = $this->session->userdata('id');
		
		// GET DATA ABSEN
		$absen = $this->db->where('id_guru', $id_guru)
					->get('absen')->result_array();
		foreach ($absen as $key => $val) {
			$cek_absen_guru = $this->Absen_model->cek_absen_guru($val);
			var_dump($cek_absen_guru);die;
			// JIKA DATA ABSEN TIDAK ADA MAKA INSERT DATA ABSEN GURU
			if(!$cek_absen_guru){
				$hari = '';
				switch(date('D', strtotime($val['tanggal_absen']))){
					case 'Mon': $hari = 'senin'; break;
					case 'Tue': $hari = 'selasa'; break;
					case 'Wed': $hari = 'rabu'; break;
					case 'Thu': $hari = 'kamis'; break;
					case 'Fri': $hari = 'jumat'; break;
					case 'Sat': $hari = 'sabtu'; break;
					default: $hari = 'minggu';
				}
				$cek_jadwal_pelajaran = $this->db->where('id_guru', $id_guru)
											->where('hari', $hari)
											->where('start_time >=', $val['waktu_absen'])
											->where('end_time <=', $val['waktu_absen'])
											->get('jadwal_pelajaran')->row_array();

				$data = [
					'id_guru' => $id_guru,
					''
				];
			}
		}
	}

	public function get_all(): void {
        $data = $this->Absen_model->absen_siswa();

        if(!empty($this->input->get('is_borrowing')))
            $data = $this->member_model->get_borrowing_member();

		header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data, JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_TAG);
    }

	public function get_all_paginated(){
		$get = $this->input->get();

		$limit  = $get['length'];
		$offset = $get['start'];
        $filter['start'] = !empty($get['columns'][1]['search']['value']) ? $get['columns'][1]['search']['value'] : date('Y-m-d');
        $filter['end'] = !empty($get['columns'][2]['search']['value']) ? $get['columns'][2]['search']['value'] : date('Y-m-d');

        $dataTable = [
            'draw'            => $get['draw'] ?? NULL,
            'data'            => $this->Absen_model->absen_siswa($offset, $limit, $filter),
            'recordsTotal'    => $this->db->count_all_results('absen'),
            'recordsFiltered' => $this->Absen_model->total_absen_siswa($filter)
        ];

        echo json_encode($dataTable, JSON_HEX_AMP | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT);
	}

	public function absen_harian(){
		$d['judul'] = "Data Absen Siswa Harian";
		$d['kelas'] = $this->db->get('mst_kelas')->result_array();
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('absen/absen_harian');
		$this->load->view('bottom');
	}

	public function get_all_absen_harian(): void {
		$get = $this->input->get();

		$limit  = !empty($get['length']) ? $get['length'] : 10;
		$offset = !empty($get['start']) ? $get['start'] : 0;
        $filter['start'] = !empty($get['columns'][1]['search']['value']) ? $get['columns'][1]['search']['value'] : date('Y-m-1');
        $filter['end'] = !empty($get['columns'][2]['search']['value']) ? $get['columns'][2]['search']['value'] : date('Y-m-d');

		// var_dump('ok');die;

        $data = $this->Absen_model->absen_harian($offset, $limit, $filter);

		header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data->result(), JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_TAG);
    }

	public function get_all_paginated_absen_harian(){
		$get = $this->input->get();

		$limit  = $get['length'];
		$offset = $get['start'];
        $filter['start'] = !empty($get['columns'][1]['search']['value']) ? $get['columns'][1]['search']['value'] : date('Y-m-d');
        $filter['end'] = !empty($get['columns'][2]['search']['value']) ? $get['columns'][2]['search']['value'] : date('Y-m-d');
        $filter['id_kelas'] = !empty($get['columns'][3]['search']['value']) ? $get['columns'][3]['search']['value'] : null;

        $dataTable = [
            'draw'            => $get['draw'] ?? NULL,
            'data'            => $this->Absen_model->absen_harian($offset, $limit, $filter)->result(),
            'recordsTotal'    => $this->db->count_all_results('absen'),
            'recordsFiltered' => $this->Absen_model->total_absen_siswa($filter)
        ];

        echo json_encode($dataTable, JSON_HEX_AMP | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT);
	}
	
}