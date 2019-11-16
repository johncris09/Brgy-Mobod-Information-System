<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class User_model extends CI_Model {
 
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

	public function update_logout_date($user_id)
	{
		$data = array(
			'logout_date'	=> date('Y-m-d H:i:s', time()), 
		);

		$query = $this->db->update('login_history', $data, "history_id = " . $this->latest_login($user_id));
		return $query;
	}

	
  private function latest_login($user_id)
	{
		// get the latest login date
		$this->db->where('user_id', $user_id);
		$this->db->order_by('login_date', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('login_history');

		if($query->num_rows() > 0)
		{
			foreach($query->result() as $row)
			{
				return $row->history_id;
			}
		}
		else
		{
			return 'FALSE';
		}
	}

	public function get_users()
	{ 
		$this->db->from('user');
		$this->db->join('position', 'position.position_id = user.position');
		$this->db->join('user_type', 'user_type.user_type_id = user.user_type');
		return $this->db->get();
	} 

	public function insert_user($user_info)
	{
		$this->db->insert('user', $user_info);
		return $this->db->affected_rows();
	} 
 

}
 
