<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct ()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function authenticate_user($login_data = '')
	{
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
	
	public function get_user_details($args = '')
	{
		$query = '';
		$result = false;
		
		$this->db->select('*');
		
		if(is_array($args))
		{
			$this->db->where($args);
		}
		else 
		{
			// Nai desu
		}
		
		$query = $this->db->get('tbluseraccounts');
		
		return $query->result_array();
	}
}

/* End of file base_model.php */
/* Location: ./application/controllers/base_model.php */