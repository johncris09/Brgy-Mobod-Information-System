<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

class Login_model extends CI_Model { 
  public function __construct()
  {
    parent::__construct();
  }
 
  public function login($user_info)
  { 
		$this->db->where($user_info);
		$query =  $this->db->get('user');  
		return $query->num_rows();  
	}   

	public function login_history($user_info)
	{
		$this->db->where($user_info);
		$query =  $this->db->get('user'); 
		//get user id
		$user_id = $query->result()[0]->user_id; 

		$history_data = array(
			'user_id' 		=> $user_id,
			'login_date' 	=> date('Y-m-d H:i:s', time()), 
		);  
		return $this->db->insert('login_history', $history_data);
	}

	public function get_user_info($user_info)
	{
		$this->db->where($user_info); 
		$this->db->from('user');
		$this->db->join('position', 'position.position_id = user.position');
		$this->db->join('user_type', 'user_type.user_type_id = user.user_type');
		return $this->db->get()->result_array();
	}

} 
