<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Base_model extends CI_Model {

	public function __construct (){
		parent::__construct();
		$this->load->database();
	}

}

/* End of file base_model.php */
/* Location: ./application/controllers/base_model.php */