<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{

	public function cek($in)
	{
		$username = $in['username'];
		$password = $in['password'];

		$q_admin = $this->db->query("SELECT * FROM mst_admin WHERE username = '$username' AND password = '$password'");


		$q_guru = $this->db->query("SELECT * FROM mst_guru INNER JOIN mst_jabatan ON mst_guru.id_jabatan = mst_jabatan.id_jabatan WHERE nip = '$username' AND password = '$password' AND mst_guru.id_jabatan = 2");


		$q_siswa = $this->db->query("SELECT * FROM mst_siswa WHERE nis = '$username' AND password = '$password'");


		if ($q_admin->num_rows() > 0) {
			foreach ($q_admin->result() as $data) {
				$session['username'] = $data->username;
				$session['id'] = $data->id;
				$session['nama'] = $data->nama;
				$session['hak_akses'] = 'admin';
				$session['nama_jabatan'] = 'Administrator';
				$session['tipe'] = $data->tipe;
				$this->session->set_userdata($session);
			}
			$log['username'] = $session['nama'];
			$log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
			$log['hak_akses'] = $session['hak_akses'];
			$this->db->insert("log_login",$log);
			redirect("home");
	
		} else if ($q_guru->num_rows() > 0) {
			foreach ($q_guru->result() as $data) {
				$session['username'] = $data->nip;
				$session['id'] = $data->id_guru;
				$session['nama'] = $data->nama_guru;
				$session['hak_akses'] = $data->hak_akses;
				$session['tipe'] = 'guru';
				$this->session->set_userdata($session);
			}
			$log['username'] = $session['nama'];
			$log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
			$log['hak_akses'] = $session['hak_akses'];
			$this->db->insert("log_login",$log);
			redirect("home");
	
		} else if ($q_siswa->num_rows() > 0) {
			foreach ($q_siswa->result() as $data) {
				$session['username'] = $data->nis;
				$session['id'] = $data->id_siswa;
				$session['nama'] = $data->nama_siswa;
				$session['hak_akses'] = 'siswa';
				$session['tipe'] = 'siswa';
				$this->session->set_userdata($session);
			}
			$log['username'] = $session['nama'];
			$log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
			$log['hak_akses'] = $session['hak_akses'];
			$this->db->insert("log_login",$log);
			redirect("home");
	
		} else {
			$this->session->set_flashdata("error", "Gagal Login. Username dan Password Salah");
			redirect(base_url());
		}
	}
}
