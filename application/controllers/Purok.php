<?php
defined('BASEPATH') or exit('No direct script access allowed');
 

class Purok extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
		$data["page_title"] = "Purok";
		$this->load->view('admin/purok', $data); 
  }

}

 