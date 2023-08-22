<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function cek($in) {
		$username = $in['username'];
		$password = $in['password'];
		
		$q_admin = $this->db->query("SELECT * FROM mst_admin WHERE username = '$username' AND password = '$password'");

		$q_guru = $this->db->query("SELECT id_guru, nama_guru, hak_akses, nama_jabatan FROM mst_user 
									INNER JOIN mst_guru ON mst_user.username = mst_guru.nip 
									INNER JOIN mst_jabatan ON mst_guru.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username' AND mst_user.password = '$password'");


		if($q_admin->num_rows() > 0) {
			foreach($q_admin->result() as $data) {
				$session['username'] = $data->username;
				$session['id'] = $data->id;
				$session['nama'] = $data->nama;
				$session['hak_akses'] = 'admin';
				$this->session->set_userdata($session);
			}
			redirect("home");
		}  else {
			if($q_guru->num_rows() > 0) {
				foreach($q_guru->result() as $data) {
					$session['nip'] = $data->nip;
					$session['id_guru'] = $data->id_guru;
					$session['nama'] = $data->nama_guru;
					$session['hak_akses'] = $data->hak_akses;
					$session['jabatan'] = $data->nama_jabatan;
					$this->session->set_userdata($session);
				}
				redirect("home");
			} else {
				$this->session->set_flashdata("error","Gagal Login. Nip dan Password Salah");
				redirect(base_url());
			} 
			
		}
	}

}
