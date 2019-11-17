<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Residence_household_model extends CI_Model { 
  public function __construct()
  {
    parent::__construct();
	}
	
	
	public function insert_residence_household($residence_household_info)
	{
		$this->db->insert('residence_household', $residence_household_info);
		return $this->db->affected_rows();
	}
	
 

} 
