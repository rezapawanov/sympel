<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{

	public function cek($in)
	{
		$username = $in['username'];
		$password = $in['password'];
		$q_admin = $this->db->query("SELECT * FROM mst_admin WHERE username = '$username' AND password = '$password'");

		$q_bk = $this->db->query("SELECT * FROM mst_guru INNER JOIN mst_jabatan ON mst_guru.id_jabatan = mst_jabatan.id_jabatan WHERE nip = '$username' AND password = '$password' AND mst_guru.id_jabatan = 3");

		$q_guru = $this->db->query("SELECT * FROM mst_guru INNER JOIN mst_jabatan ON mst_guru.id_jabatan = mst_jabatan.id_jabatan WHERE nip = '$username' AND password = '$password' AND mst_guru.id_jabatan = 2");


		$q_siswa = $this->db->query("SELECT * FROM mst_siswa WHERE nis = '$username' AND password = '$password'");


		$q_keuangan = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username' AND password = '$password' AND (hak_akses = 'dasview' OR hak_akses = 'das' OR hak_akses = 'kasir' OR hak_akses = 'bendahara')");

		$q_perpus = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username' AND password = '$password' AND mst_user.id_jabatan = '20'");

		$q_alumni = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username' AND password = '$password' AND mst_user.id_jabatan = '21'");

		$q_bukutamu = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username' AND password = '$password' AND mst_user.id_jabatan = '22'");

		$q_ppdb = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username' AND password = '$password' AND mst_user.id_jabatan = '23'");

		$q_kelulusan = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username' AND password = '$password' AND mst_user.id_jabatan = '24'");

		$q_akademik = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username' AND password = '$password' AND mst_user.id_jabatan = '9'");

		$q_kantin = $this->db->query("SELECT * FROM mst_user INNER JOIN mst_jabatan ON mst_user.id_jabatan = mst_jabatan.id_jabatan WHERE username = '$username' AND password = '$password' AND mst_user.id_jabatan = '25'");

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
		} else if ($q_bk->num_rows() > 0) {
			foreach ($q_bk->result() as $data) {
				$session['username'] = $data->nip;
				$session['id'] = $data->id_guru;
				$session['nama'] = $data->nama_guru;
				$session['hak_akses'] = $data->hak_akses;
				$session['tipe'] = 'gurupiket';
				$this->session->set_userdata($session);
			}
			$log['username'] = $session['nama'];
			$log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
			$log['hak_akses'] = $session['hak_akses'];
			$this->db->insert("log_login",$log);
			redirect("../kesiswaan");
		} else if ($q_guru->num_rows() > 0) {
			foreach ($q_guru->result() as $data) {
				$session['username'] = $data->nip;
				$session['id'] = $data->id_guru;
				$session['nama'] = $data->nama_guru;
				$session['hak_akses'] = $data->hak_akses;
				$session['tipe'] = 'gurupiket';
				$this->session->set_userdata($session);
			}
			$log['username'] = $session['nama'];
			$log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
			$log['hak_akses'] = $session['hak_akses'];
			$this->db->insert("log_login",$log);
			redirect("../akademik");
		} else if ($q_keuangan->num_rows() > 0) {
			foreach ($q_keuangan->result() as $data) {
				$session['username'] = $data->username;
				$session['id'] = $data->id_user;
				$session['nama'] = $data->nama;
				$session['hak_akses'] = $data->hak_akses;
				$session['nama_jabatan'] = $data->nama_jabatan;
				$session['tipe'] = 'keuangan';
				$this->session->set_userdata($session);
			}
			$log['username'] = $session['nama'];
			$log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
			$log['hak_akses'] = $session['hak_akses'];
			$this->db->insert("log_login",$log);
			redirect("../keuangan");
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
			redirect("../akademik");
		} else if ($q_perpus->num_rows() > 0) {
			foreach ($q_perpus->result() as $data) {
				$session['username'] = $data->username;
				$session['id'] = $data->id_user;
				$session['nama'] = $data->nama;
				$session['hak_akses'] = $data->hak_akses;
				$session['nama_jabatan'] = $data->nama_jabatan;
				$session['tipe'] = 'perpus';
				$this->session->set_userdata($session);
			}
			$log['username'] = $session['nama'];
			$log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
			$log['hak_akses'] = $session['hak_akses'];
			$this->db->insert("log_login",$log);
			redirect("../perpustakaan");
		} else if ($q_alumni->num_rows() > 0) {
			foreach ($q_alumni->result() as $data) {
				$session['username'] = $data->username;
				$session['id'] = $data->id_user;
				$session['nama'] = $data->nama;
				$session['hak_akses'] = $data->hak_akses;
				$session['nama_jabatan'] = $data->nama_jabatan;
				$session['tipe'] = 'alumni';
				$this->session->set_userdata($session);
			}
			redirect("../alumni");
		} else if ($q_bukutamu->num_rows() > 0) {
			foreach ($q_bukutamu->result() as $data) {
				$session['username'] = $data->username;
				$session['id'] = $data->id_user;
				$session['nama'] = $data->nama;
				$session['hak_akses'] = $data->hak_akses;
				$session['nama_jabatan'] = $data->nama_jabatan;
				$session['tipe'] = 'bukutamu';
				$this->session->set_userdata($session);
			}
			$log['username'] = $session['nama'];
			$log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
			$log['hak_akses'] = $session['hak_akses'];
			$this->db->insert("log_login",$log);
			redirect("../bukutamu");
		} else if ($q_ppdb->num_rows() > 0) {
			foreach ($q_ppdb->result() as $data) {
				$session['username'] = $data->username;
				$session['id'] = $data->id_user;
				$session['nama'] = $data->nama;
				$session['hak_akses'] = $data->hak_akses;
				$session['nama_jabatan'] = $data->nama_jabatan;
				$session['tipe'] = 'ppdb';
				$this->session->set_userdata($session);
			}
			$log['username'] = $session['nama'];
			$log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
			$log['hak_akses'] = $session['hak_akses'];
			$this->db->insert("log_login",$log);
			redirect("../ppdb");
		} else if ($q_kelulusan->num_rows() > 0) {
			foreach ($q_kelulusan->result() as $data) {
				$session['username'] = $data->username;
				$session['id'] = $data->id_user;
				$session['nama'] = $data->nama;
				$session['hak_akses'] = $data->hak_akses;
				$session['nama_jabatan'] = $data->nama_jabatan;
				$session['tipe'] = 'kelulusan';
				$this->session->set_userdata($session);
			}
			$log['username'] = $session['nama'];
			$log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
			$log['hak_akses'] = $session['hak_akses'];
			$this->db->insert("log_login",$log);
			redirect("../kelulusan");
		} else if ($q_akademik->num_rows() > 0) {
			foreach ($q_akademik->result() as $data) {
				$session['username'] = $data->username;
				$session['id'] = $data->id_user;
				$session['nama'] = $data->nama;
				$session['hak_akses'] = 'adminakademik';
				$session['nama_jabatan'] = $data->nama_jabatan;
				$session['tipe'] = 'akademik';
				$this->session->set_userdata($session);
			}
			$log['username'] = $session['nama'];
			$log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
			$log['hak_akses'] = $session['hak_akses'];
			$this->db->insert("log_login",$log);
			redirect("../akademik");
		
		} else if ($q_kantin->num_rows() > 0) {
			foreach ($q_kantin->result() as $data) {
				$session['username'] = $data->username;
				$session['id'] = $data->id_user;
				$session['nama'] = $data->nama;
				$session['saldo'] = $data->saldo;
				$session['hak_akses'] = $data->hak_akses;
				$session['nama_jabatan'] = $data->nama_jabatan;
				$session['tipe'] = 'kantin';
				$this->session->set_userdata($session);
			}
			$log['saldo'] = $session['saldo'];
			$log['username'] = $session['nama'];
			$log['ipaddress'] = $_SERVER['REMOTE_ADDR'];
			$log['hak_akses'] = $session['hak_akses'];
			$this->db->insert("log_login",$log);
			redirect("../keuangan");

		} else {
			$this->session->set_flashdata("error", "Gagal Login. Username dan Password Salah");
			redirect(base_url());
		}
	}
}
