<?php
defined('BASEPATH') or exit('No direct script access allowed');

 
class User_type extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
		$data["page_title"] = "User Type";
		$this->load->view('admin/user_type', $data); 
  }

}
 