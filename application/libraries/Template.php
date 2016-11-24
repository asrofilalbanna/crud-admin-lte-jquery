<?php 

class Template {

	protected $_ci;

	function __construct(){
		$this->_ci = &get_instance();
	}

	function views( $template = NULL, $data = NULL) {
		if ($template != NULL and $template != 'login') 
		{
			$data['_data']		= $template;
			$data['_meta']		= $this->_ci->load->view('_layout/_meta', $data, TRUE);
			$data['_css']		= $this->_ci->load->view('_layout/_css', $data, TRUE);

			$data['_header']	= $this->_ci->load->view('_layout/_header', $data, TRUE);
			$data['_link']	 	= $this->_ci->load->view('_layout/_link', $data, TRUE);
			$data['_content']	= $this->_ci->load->view($template, $data, TRUE);

			$data['_footer']	= $this->_ci->load->view('_layout/_footer', $data, TRUE);
			$data['_sidebar']	= $this->_ci->load->view('_layout/_sidebar', $data, TRUE);
			$data['_js']		= $this->_ci->load->view('_layout/_js', $data, TRUE);

			echo $data['_template']	= $this->_ci->load->view('_layout/_template', $data, TRUE);
		}
		elseif ($template == "login")
		{
			$data['_data']		= $template;
			$data['_meta']		= $this->_ci->load->view('_login/_meta', $data, TRUE);
			$data['_css']		= $this->_ci->load->view('_login/_css', $data, TRUE);

			$data['_login']	= $this->_ci->load->view($template, $data, TRUE);

			echo $data['_template']	= $this->_ci->load->view('_login/_template', $data, TRUE);
		}
	}
}

?>