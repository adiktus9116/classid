<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authentication extends CI_Controller {

	public function __construct (){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('user_model');
	}
	
	function md5_generator ($string){
		echo md5($string);
	}
	
	function login(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		if($username && $password){
			$login_data = array(
				'Username'=>$username,
				'Password'=>$password
			);
			$user_data = $this->user_model->authenticate_user($login_data);
			if($user_data){
				$session_data = array(
					'is_logged_in'=>true,
					'user_account_id'=>$user_data['UserAccountID'],
					'first_name'=>$user_data['FirstName'],
					'middle_name'=>$user_data['MiddleName'],
					'last_name'=>$user_data['LastName'],
					'email_address'=>$user_data['EmailAddres']
				);
				$this->session->set_userdata($session_data);
				return true;
			}
		}
		return false;
	}
	
	function logout(){
		$session_data = array(
			'is_logged_in'=>false
		);
		$this->session->set_userdata($session_data);
		header("Location: ".base_url());
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */