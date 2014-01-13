<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authentication extends CI_Controller {

	public function __construct (){
		parent::__construct();
		$this->load->model('user_model');
	}
	
	function md5_generator ($string){
		echo md5($string);
	}
	
	function login(){
		$user_data = false;
		$username = $this->input->post('email');
		$password = md5($this->input->post('password'));
		
		// Check if user is logged-in tru facebook
		$is_social = $this->input->post('is_social');
		
		if ($is_social)
		{
			// Check if email exists in database
			$userdata = $this->user_model->get_user_details(array(
				'EmailAddress'	=>	$this->input->post('email')
			));
			
			if(count($userdata) > 0)
			{
				$userdata = $userdata[0];
			}
			else
			{
				if($this->input->is_ajax_request())
				{
					$this->output->set_output(json_encode(array('status'=>false, 'redirect'=>base_url().'authentication/register')));
				}
				
				return false;
			}
		}
		
		// Normal Login procedure
		if ($username && $password){
			$login_data = array(
				'Username'=>$username,
				'Password'=>$password
			);
			$user_data = $this->user_model->authenticate_user($login_data);
		}
		
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

			if($this->input->is_ajax_request())
			{
				$this->output->set_output(json_encode(array('status'=>true)));
			}

			return true;
		}

		if($this->input->is_ajax_request())
		{
			$this->output->set_output(json_encode(array('status'=>false)));
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