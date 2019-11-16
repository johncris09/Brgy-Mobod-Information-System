<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

class Household_model extends CI_Model {
 
  public function __construct()
  {
    parent::__construct();
	} 
	
	public function fetch_household()
	{  
		$this->db->from('household');  
		$this->db->join('purok', 'purok.purok_id = household.purok_id');
		$this->db->join('user', 'user.user_id = household.oic');  
		return $this->db->get();
	} 

	public function insert_household($household_info)
	{
		$this->db->insert('household', $household_info);
		return $this->db->affected_rows();
	}  

	public function get_household($household_id)
	{
		$this->db->from('household');  
		$this->db->join('purok', 'purok.purok_id = household.purok_id');
		$this->db->join('user', 'user.user_id = household.oic');  
		$this->db->where('household_id', $household_id);
		return $this->db->get()->result_array()[0];
	} 

}
  