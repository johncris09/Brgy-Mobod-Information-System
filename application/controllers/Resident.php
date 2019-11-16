<?php
defined('BASEPATH') or exit('No direct script access allowed');

 

class Resident extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
		$data["page_title"] = "Resident";
		$this->load->view('admin/resident', $data); 
	}

}
 