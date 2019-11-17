<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Residence_household_model extends CI_Model { 
  public function __construct()
  {
    parent::__construct();
	} 

	public function get_residence_household($household_id)
	{ 
		$this->db->from('residence_household');
		$this->db->join('household', 'household.household_id = residence_household.household_id');
		$this->db->join('resident', 'resident.resident_id = residence_household.resident_id'); 
		$this->db->where('residence_household.household_id ', $household_id );
		return $this->db->get();
	} 
	
	public function insert_residence_household($residence_household_info)
	{
		$this->db->insert('residence_household', $residence_household_info);
		return $this->db->affected_rows();
	}
	
 

} 
