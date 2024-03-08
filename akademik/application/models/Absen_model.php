<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Absen_model extends CI_Model {


	public function absen($tahun_ajaran) {
		$q = $this->db->query("SELECT * FROM absen 
			INNER JOIN mst_siswa ON absen.id_siswa = mst_siswa.id_siswa 
					INNER JOIN mst_kelas ON absen.id_kelas = mst_kelas.id_kelas
		
		WHERE tahun_ajaran = '$tahun_ajaran' ORDER BY id_absen DESC");
		return $q;
    }

	public function absen_harian($start = null, $limit = null, $filter = []){
		$q = $this->db->query("SELECT masuk.id_siswa, masuk.tanggal_absen, masuk.masuk, keluar.keluar, ms.nama_siswa, mk.nama_kelas from (
			select id_siswa, tanggal_absen, tahun_ajaran, waktu_absen as masuk from absen a
			where keterangan='masuk'
			group by id_siswa, tanggal_absen, waktu_absen, tahun_ajaran
		) masuk	
		left join 
			(
				select id_siswa, tanggal_absen, waktu_absen as keluar from absen b
				where keterangan='keluar'
				group by id_siswa, tanggal_absen, waktu_absen 
			) keluar on keluar.id_siswa = masuk.id_siswa and keluar.tanggal_absen = masuk.tanggal_absen
		left join mst_siswa ms on ms.id_siswa = masuk.id_siswa
		left join mst_kelas mk on mk.id_kelas = ms.id_kelas
		where masuk.tanggal_absen >= '".$filter['start']."' 
		and masuk.tanggal_absen <= '".$filter['end']."'".
		((!is_null($filter['id_kelas'])) ? " and mk.id_kelas=".$filter['id_kelas']."" : "").
		" limit $limit offset $start");
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

	public function delete_data_cek_kartu()
	{
		$q = $this->db->query("truncate tambah;");
		return $q;
	}

	public function absen_siswa($start = null, $limit = null, $filter = []){
		$this->db->select('a.*, k.nama_kelas, s.nama_siswa');
		$this->db->from('absen a');
		$this->db->join('mst_kelas k', 'k.id_kelas = a.id_kelas');
		$this->db->join('mst_siswa s', 's.id_siswa = a.id_siswa');

		if(isset($limit) && !empty($limit))
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

	public function total_absen_siswa($filter = []){
		$this->db->select('a.*, k.nama_kelas, s.nama_siswa');
		$this->db->from('absen a');
		$this->db->join('mst_kelas k', 'k.id_kelas = a.id_kelas');
		$this->db->join('mst_siswa s', 's.id_siswa = a.id_siswa');

		if(isset($filter['id_siswa']) && !empty($filter['id_siswa']))
			$this->db->where('a.id_siswa', $filter['id_siswa']);

		if(isset($filter['keterangan']) && !empty($filter['keterangan']))
			$this->db->where('a.keterangan', $filter['keterangan']);
		
		if(isset($filter['start']) && !empty($filter['start']))
			$this->db->where('DATE(waktu_absen) >=', $filter['start']);

		if(isset($filter['end']) && !empty($filter['end']))
			$this->db->where('DATE(waktu_absen) <=', $filter['end']);

		return $this->db->get()->num_rows();
	}

	public function cek_absen_guru($data){
		return $this->db->where('tanggal_absen', $data['tanggal_absen'])
			->where('jam_absen >=', date('H:i:s', strtotime($data['waktu_absen'])))
			->where('jam_absen <=', date('H:i:s', strtotime($data['waktu_absen'])))
			->get('absen_guru')->row_array();
	}
}