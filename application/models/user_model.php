<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct (){
		parent::__construct();
		$this->load->database();
	}
	
	public function authenticate_user($login_data){
		$query = "
			SELECT
				UserAccountID,
				FirstName,
				MiddleName,
				LastName,
				EmailAddress
			FROM
				tbluseraccounts
			WHERE
				Username = '".$login_data['Username']."'
				AND
				Password = '".$login_data['Password']."'
			";
		$result = $this->db->query($query);
		if($result->num_rows){
			$results = $result->result_array();
			return $results[0];
		}
		return false;
	}
}

/* End of file base_model.php */
/* Location: ./application/controllers/base_model.php */