<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

class Resident_model extends CI_Model {
 
  public function __construct()
  {
    parent::__construct();
  }
 
	public function fetch_resident()
	{
		return $this->db->get('resident');
	}
	
	public function insert_resident($resident_info)
	{
		$this->db->insert('resident', $resident_info);
		return $this->db->insert_id();  
	} 
	  
	public function get_resident($resident_id)
	{ 
		$this->db->from('residence_household');
		$this->db->join('household', 'household.household_id = residence_household.household_id');
		$this->db->join('resident', 'resident.resident_id = residence_household.resident_id'); 
		$this->db->where('resident.resident_id ', $resident_id );
		return $this->db->get()->result_array()[0];
	} 
	

 
}
