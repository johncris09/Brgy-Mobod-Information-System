<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

class User_type_model extends CI_Model { 
  public function __construct()
  {
    parent::__construct();
	} 
	
  public function fetch_user_type()
	{
		return $this->db->get('user_type');
	} 
	
	public function insert_user_type($user_type_info)
	{
		$this->db->insert('user_type', $user_type_info);
		return $this->db->affected_rows();
	} 
	
 
}
 