<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Position_model extends CI_Model {
 
  public function __construct()
  {
    parent::__construct();
  }
 
  public function fetch_position()
	{
		return $this->db->get('position');
	}

	
	public function insert_position($position_info)
	{
		$this->db->insert('position', $position_info);
		return $this->db->affected_rows();
	} 
	
	public function get_position($position_id)
	{
		$this->db->where('position_id', $position_id);
		$query = $this->db->get('position');
		return $query->result_array()[0];
	}
	

}
 