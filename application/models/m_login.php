<?php
// create login model
class m_login extends CI_Model
{
	public function __construct()
	{
		//if user has logged in then redirect to home


		$this->load->database();
	}

	public function validate($username, $password)
	{
		//validate login
		$query = $this->db->get_where('users', array('username' => $username, 'password' => $password));
		if(isset($query)){
			if(count($query->result()) > 1){
				return false;
			}else{
				return $query->row();
			}
		}
	}

	// public function validate($username, $password)
	// {
	// 	//validate login
	// 	$this->db->where('username', $username);
	// 	$this->db->where('password', $password);
	// 	$query = $this->db->get('users');
	// 	if ($query->num_rows() == 1) {
	// 		return true;
	// 	} else {
	// 		return false;
	// 	}
	// }
}
