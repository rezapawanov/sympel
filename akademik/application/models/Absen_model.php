<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Absen_model extends CI_Model {


	public function absen($tahun_ajaran) {
		$q = $this->db->query("SELECT * FROM absen 
			INNER JOIN mst_siswa ON absen.id_siswa = mst_siswa.id_siswa 
					INNER JOIN mst_kelas ON absen.id_kelas = mst_kelas.id_kelas
		
		WHERE tahun_ajaran = '$tahun_ajaran' ORDER BY waktu_absen DESC");
		return $q;
    }

	public function absen_guru($tahun_ajaran) {
		$this->db->where('absen_guru.tahun_ajaran', $tahun_ajaran);
	//	$this->db->where('absen_guru.id_guru', $this->session->userdata('id'));
		$this->db->join('mst_guru', 'mst_guru.id_guru = absen_guru.id_guru', 'left');
	//	$this->db->join('jadwal_pelajaran', 'jadwal_pelajaran.id_jadwal_pelajaran = absen_guru.id_jadwal_pelajaran', 'left');
	//	$this->db->join('mst_tahun_ajaran', 'mst_tahun_ajaran.id_tahun_ajaran = jadwal_pelajaran.id_tahun_ajaran', 'left');
	//	$this->db->join('mst_kelas', 'mst_kelas.id_kelas = jadwal_pelajaran.id_kelas', 'left');
	//	$this->db->join('mst_mapel', 'mst_mapel.id_mapel = jadwal_pelajaran.id_mapel', 'left');
		return $this->db->get('absen_guru');
    }
    
    public function cekkartu() {
		$q = $this->db->query("SELECT * FROM tambah ORDER BY time DESC");
		return $q;
    }

	public function absen_siswa($start, $limit, $filter){
		$this->db->select('a.*, k.nama_kelas');
		$this->db->from('absen a');
		$this->db->join('mst_kelas k', 'k.id_kelas = a.id_kelas');
		$this->db->limit($limit, $start);

		if(isset($filter['id_siswa']) && !empty($filter['id_siswa']))
			$this->db->where('a.id_siswa', $filter['id_siswa']);

		if(isset($filter['keterangan']) && !empty($filter['keterangan']))
			$this->db->where('a.keterangan', $filter['keterangan']);
		
		if(isset($filter['start']) && !empty($filter['start']))
			$this->db->where('DATE(waktu_absen) >=', $filter['start']);

		if(isset($filter['end']) && !empty($filter['end']))
			$this->db->where('DATE(waktu_absen) <=', $filter['end']);

		return $this->db->get()->result_array();
	}

	public function cek_absen_guru($data){
		return $this->db->where('tanggal_absen', $data['tanggal_absen'])
			->where('jam_absen >=', date('H:i:s', strtotime($data['waktu_absen'])))
			->where('jam_absen <=', date('H:i:s', strtotime($data['waktu_absen'])))
			->get('absen_guru')->row_array();
	}
}