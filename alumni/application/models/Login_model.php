<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function cek($in) {
		$username = $in['username'];
		$password = $in['password'];
		$q_admin = $this->db->query("SELECT * FROM mst_admin WHERE username = '$username' AND password = '$password'");


		if($q_admin->num_rows() > 0) {
			foreach($q_admin->result() as $data) {
				$session['username'] = $data->username;
				$session['id'] = $data->id;
				$session['nama'] = $data->nama;
				$session['hak_akses'] = 'admin';
				$session['tipe'] = $data->tipe;
				$this->session->set_userdata($session);
			}
			redirect("home");
		}  else {
			$this->session->set_flashdata("error","Gagal Login. Username dan Password Salah");
			redirect(base_url());
			
		}
	}

}
