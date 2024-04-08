<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kewirausahaan extends CI_Controller {


	public function __construct(){
		parent::__construct();
		if($this->session->userdata('hak_akses') != "admin" && 
			$this->session->userdata('hak_akses') != "gurubk" && 
			$this->session->userdata('hak_akses') != "guru" &&
			$this->session->userdata('hak_akses') != "siswa") { 
			redirect(base_url());
		} else {
			$this->load->Model('Kewirausahaan_model');
		}
	}


	public function index() {
		$d['judul'] = "Data Kewirausahaan Siswa";
		$get_tahunajaran = $this->db->query("SELECT tahun_ajaran,tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();
		// $d['kewirausahaan'] = $this->Kewirausahaan_model->getAll($get_tahunajaran->tahun_ajaran);
		$d['kelas'] = $this->db->get('mst_kelas')->result_array();
		
		if($_SESSION['hak_akses'] == 'siswa'){
			$siswa = $this->db->where('nis', $_SESSION['username'])->get('mst_siswa')->row();
			$d['id_siswa'] = $siswa->id_siswa;
		}

		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('kewirausahaan/index');
		$this->load->view('bottom');
	}

    public function get_all(){
		$get = $this->input->get();

		$limit  = $get['length'];
		$offset = $get['start'];
        $filter['start'] = !empty($get['columns'][1]['search']['value']) ? $get['columns'][1]['search']['value'] : date('Y-m-d');
        $filter['end'] = !empty($get['columns'][2]['search']['value']) ? $get['columns'][2]['search']['value'] : date('Y-m-d');
        $filter['id_kelas'] = !empty($get['columns'][3]['search']['value']) ? $get['columns'][3]['search']['value'] : null;
        $filter['id_siswa'] = !empty($get['columns'][4]['search']['value']) ? $get['columns'][4]['search']['value'] : null; 	

        $dataTable = [
            'draw'            => $get['draw'] ?? NULL,
            'data'            => $this->Kewirausahaan_model->getAll($limit, $offset, $filter)->result(),
            'recordsTotal'    => $this->db->count_all_results('trx_kewirausahaan'),
            'recordsFiltered' => $this->Kewirausahaan_model->total_data($filter)
        ];

        echo json_encode($dataTable, JSON_HEX_AMP | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT);
	}

	public function simpan(){
		$post = $this->input->post();

		$data = [
			'id_siswa' => $post['id_siswa'],
			'program_keahlian' => $post['program_keahlian'],
			'nama_usaha' => $post['nama_usaha'],
			'jenis_usaha' => $post['jenis_usaha'],
			'nib' => $post['nib'],
			'omset' => $post['omset']
		];

		$res = $this->db->insert('trx_kewirausahaan', $data);

		if($res){
			$res = [
				'success' => true,
				'message' => 'Data berhasil disimpan!'
			];
		} else {
			$res = [
				'success' => false,
				'message' => 'Data gagal disimpan!'
			];
		}
		echo json_encode($res, JSON_HEX_AMP | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT);
	}

	public function delete(){
		$post = $this->input->post();
		$id = $post['id'];

		$delete = $this->db->delete('trx_kewirausahaan', ['id' => $id]);
		if($delete){
			$res = [
				'success' => true,
				'message' => 'Data berhasil di hapus!'
			];
		} else {
			$res = [
				'success' => false,
				'message' => 'Data gagal di hapus!'
			];
		}
		echo json_encode($res, JSON_HEX_AMP | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT);
	}

}