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
		
		// check if user is exist
		if($query->num_rows() > 0)
		{ 
			 return TRUE;
		}
		else
		{
			return FALSE;
		}
		
	}  
 

} 
