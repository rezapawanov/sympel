<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index() {
		redirect(base_url());
	}


	public function cek() {
		if($this->input->method(TRUE) == 'POST' && !empty($_POST)) {
			$in['username'] = $this->input->post('username');
			$in['password'] = $this->input->post('password');
			$in['jenis'] = $this->input->post('jenis');
			$this->Login_model->cek($in);
			
		} else {
			redirect(base_url());
		}
	}

}
