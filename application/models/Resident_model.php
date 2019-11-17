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
 
}
