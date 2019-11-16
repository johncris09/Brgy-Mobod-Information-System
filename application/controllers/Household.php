<?php
defined('BASEPATH') or exit('No direct script access allowed');

 
class Household extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
		$data["page_title"] = "Household";
		$this->load->view('admin/household', $data); 
  }

}
 
