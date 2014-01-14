<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends Base_Controller {
	const BASIC_INFORMATION 	= 'basic_information';
	const LISTING_PLAN 			= 'listing_plan';
	const VENUE_DETAILS 		= 'venue_details';
	const INSERT_PHOTOS 		= 'insert_photos';
	const PAYMENT 				= 'payment';
	
	private $basic_information_rules;

	public function __construct (){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('form');
		
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger margin-bottom_10px data-validated">','</div>');
		$this->basic_information_rules = array(
				array(
						'field'=>'venue_name',
						'label'=>'Venue Name',
						'rules'=>'trim|required'
					),
				array(
						'field'=>'venue_type',
						'label'=>'Venue Type',
						'rules'=>'trim|required'
					),
				array(
						'field'=>'venue_description',
						'label'=>'Venue Description',
						'rules'=>'trim|required'
					),
				array(
						'field'=>'name',
						'label'=>'Name',
						'rules'=>'trim|required'
					),
				array(
						'field'=>'email',
						'label'=>'Email',
						'rules'=>'trim|required|valid_email'
					),
				array(
						'field'=>'contact_no',
						'label'=>'Contact No.',
						'rules'=>'trim|required'
					),
				array(
						'field'=>'password',
						'label'=>'Password',
						'rules'=>'trim|required|md5'
					),
				array(
						'field'=>'confirm_password',
						'label'=>'Re-enter Password',
						'rules'=>'trim|required|matches[password]|md5'
					)
			);
	}
	
	public function index(){
		$type = $this->input->get('t');
		if($type==P_SIGNUP_HOTEL)
		{
			$page = $this->input->get('p');
			switch($page)
			{
				case self::LISTING_PLAN:
					//listing plan was requested
					break;
				case self::BASIC_INFORMATION:
					//basic information page was requested
				default:
					//if no specific page was requested
					$this->hotel_basic_information();
			}
		}
	}
	
	private function hotel_basic_information(){
		$this->form_validation->set_rules($this->basic_information_rules);
		//Run for PHP validation
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('signup/hotel/basic_information',$this->vars);
		}
		else
		{
			//if form was successfully validated
			redirect('signup/index?t='.P_SIGNUP_HOTEL.'&p='.self::LISTING_PLAN);
		}
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */