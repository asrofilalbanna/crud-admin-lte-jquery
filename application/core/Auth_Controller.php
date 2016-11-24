<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->user_login = $this->session->userdata('user_session');
		if(count($this->user_login) == 0){
			$this->session->set_flashdata('alert_msg',err_msg('Silahkan login dahulu'));
			redirect('login');
		}
	}

	public function index()
	{
		
	}

	public function loadTemplate($view, $data)
	{
		$data['dashboard'] = $this->load->view($view,$data);
		$this->load->view('home',$data);
	}
}

/* End of file Auth_Controller.php */
/* Location: ./application/core/Auth_Controller.php */