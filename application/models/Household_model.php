<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

class Household_model extends CI_Model {
 
  public function __construct()
  {
    parent::__construct();
	} 
	
	public function get_household()
	{  
		$this->db->from('household');  
		$this->db->join('purok', 'purok.purok_id = household.purok_id');
		$this->db->join('user', 'user.user_id = household.oic');  
		return $this->db->get();
	}
 

}
  
