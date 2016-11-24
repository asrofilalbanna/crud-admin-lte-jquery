<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Auth_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$data['dataLK'] = $this->M_pegawai->getJlmh(1);
		$data['dataPR'] = $this->M_pegawai->getJlmh(2);
		$this->template->views('home',$data);
	}
}
