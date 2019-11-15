<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Purok_model extends CI_Model {
 
  public function __construct()
  {
    parent::__construct();
  }
 
  public function fetch_purok()
	{
		return $this->db->get('purok');
	}
	
	public function insert_purok($purok_info)
	{
		$this->db->insert('purok', $purok_info);
		return $this->db->affected_rows();
	}
	
	public function get_purok($purok_id)
	{
		$this->db->where('purok_id', $purok_id);
		$query = $this->db->get('purok');
		return $query->result_array()[0];
	}
	 

}
 
