<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kewirausahaan extends CI_Controller {


	public function __construct(){
		parent::__construct();
		if($this->session->userdata('hak_akses') != "admin" && $this->session->userdata('hak_akses') != "gurubk" && $this->session->userdata('hak_akses') != "guru") { 
			redirect(base_url());
		} else {
			$this->load->Model('Kewirausahaan_model');
		}
	}


	public function index() {
		$d['judul'] = "Data Kewirausahaan Siswa";
		$get_tahunajaran = $this->db->query("SELECT tahun_ajaran,tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();
		$d['absen'] = $this->Kewirausahaan_model->getAll($get_tahunajaran->tahun_ajaran);
		$d['kelas'] = $this->db->get('mst_kelas')->result_array();
		$this->load->view('top', $d);
		$this->load->view('menu');
		$this->load->view('kewirausahaan/index');
		$this->load->view('bottom');
	}

    public function get_all(){
        $get_tahunajaran = $this->db->query("SELECT tahun_ajaran,tahun_ajaran FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();

		$get = $this->input->get();

		$limit  = $get['length'];
		$offset = $get['start'];
        $filter['tahun_ajaran'] = $get_tahunajaran->tahun_ajaran;
        $filter['start'] = !empty($get['columns'][1]['search']['value']) ? $get['columns'][1]['search']['value'] : date('Y-m-d');
        $filter['end'] = !empty($get['columns'][2]['search']['value']) ? $get['columns'][2]['search']['value'] : date('Y-m-d');
        $filter['id_kelas'] = !empty($get['columns'][3]['search']['value']) ? $get['columns'][3]['search']['value'] : null;

        $dataTable = [
            'draw'            => $get['draw'] ?? NULL,
            'data'            => $this->Kewirausahaan_model->getAll($limit, $offset, $filter)->result(),
            'recordsTotal'    => $this->db->count_all_results('kewirausahaan'),
            'recordsFiltered' => $this->Kewirausahaan_model->total_data($filter)
        ];

        echo json_encode($dataTable, JSON_HEX_AMP | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT);
	}

}