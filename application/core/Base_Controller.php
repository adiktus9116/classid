<?php
class Base_Controller extends CI_Controller{

	public $vars;
	
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		if(!$this->validate_existing_session()){
			$this->vars['log_status'] = 'Logged Out';
			// exit(false);
		}else{
			$this->vars['log_status'] = 'Logged In';
			$this->load->model('base_model');
		}
		$this->vars['base_url'] = base_url();
		$this->vars['includes'] = $this->load->view('includes/includes_view',$this->vars,true);
		$this->vars['header'] = $this->load->view('header_and_footer/header_view',$this->vars,true);
		$this->vars['footer'] = $this->load->view('header_and_footer/footer_view',$this->vars,true);
	}
	
	function validate_existing_session(){
		$is_logged_in = $this->session->userdata('is_logged_in');
		return $is_logged_in;
	}
}

?>