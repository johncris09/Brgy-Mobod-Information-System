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
	
	
	public function load_user_type()
	{
		$user_type  = $this->user_type_model->fetch_user_type();
		$output = '';

		$output .= '
			<div class="table-responsive table-responsive-data2">
				<table id="user_type_data" class="table " cellspacing="0" width="100%">
					<thead class="  ">
						<tr>
							<th>ID</th> 
							<th>User Type</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
		';

		if ($user_type->num_rows() > 0) {
			foreach ($user_type->result_array() as $row) {
				$output .= '
						<tr>
							<td>' . $row['user_type_id'] . '</td> 
							<td>' . ucfirst($row['user_type']) . '</td>
							<td><a title="Edit" href="' . base_url() . 'user_type/edit_user_type/' . $row['user_type_id'] . '" class=" text-warning h5"><i class="fa fa-edit"></i></a></td>
							<td><a href="#" title="Delete"  id="' . $row['user_type_id'] . '" class="text-danger h5 delete_user_type"><i class="fa fa-trash"></i></a></td>
						</tr> 
				';
			}
		} 

		$output .= '
					</tbody>
				</table>
			</div>
		';

		echo json_encode($output);
	}

}
 