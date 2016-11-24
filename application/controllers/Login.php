<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');

	}

	public function index()
	{
		$this->cekLogin();
		$this->template->views('login');
	}

	public function actLogin()
	{
		$this->cekLogin();
		
		$param 	= $this->input->post();
		$proses = $this->M_login->act_Login($param);
		// echo count($proses);
		// exit();
		if(count($proses)>0){

			$this->session->set_userdata('user_session',$proses);
			$this->session->set_flashdata('alert_msg', succ_msg('User berhasil login'));
			redirect('home','refresh');
		} else {
			$this->session->set_flashdata('alert_msg', err_msg('User gagal login'));			
			redirect('login','refresh');
		}

	}

	public function actLogut()
	{
		$this->session->sess_destroy();
		redirect('login','refresh');
	}

	public function cekLogin()
	{
		print_r($this->user_login = $this->session->userdata('user_session'));
		if(count($this->user_login) > 0){
			redirect('home');
		}
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */