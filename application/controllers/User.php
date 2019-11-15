<?php
defined('BASEPATH') or exit('No direct script access allowed');

 

class User extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
		$data["page_title"] = "User";
		$this->load->view('admin/user', $data); 
	}

	
	public function load_user()
	{
		$user  = $this->user_model->get_users();
		$output = '';

		$output .= '
			<div class="table-responsive table-responsive-data2">
				<table id="user_data" class="table " cellspacing="0" width="100%">
					<thead class="  ">
						<tr>
							<th>ID</th> 
							<th>Profile Picture</th>
							<th>Last Name</th>
							<th>First Name</th>
							<th>Middle Name</th>
							<th>Email</th>
							<th>Username</th> 
							<th>User Type</th>
							<th>Date Registered</th>
							<th>Position</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
		';

		if ($user->num_rows() > 0) {
			foreach ($user->result_array() as $row) {
				$output .= '
						<tr>
							<td>' . $row['user_id'] . '</td> 
							<td>' . ucfirst($row['profile_picture']) . '</td>
							<td>' . ucfirst($row['last_name']) . '</td>
							<td>' . ucfirst($row['first_name']) . '</td>
							<td>' . ucfirst($row['middle_name']) . '</td>
							<td>' . ucfirst($row['email']) . '</td>
							<td>' . ucfirst($row['username']) . '</td>
							<td>' . ucfirst($row['user_type']) . '</td>
							<td>' . date_format(date_create($row['date_registered']),'M d, Y') . '</td> 
							<td>' . ucfirst($row['position']) . '</td> 
							<td><a title="Edit" href="' . base_url() . 'user/edit_user/' . $row['user_id'] . '" class=" text-warning h5"><i class="fa fa-edit"></i></a></td>
							<td><a href="#" title="Delete"  id="' . $row['user_id'] . '" class="text-danger h5 delete_user"><i class="fa fa-trash"></i></a></td>
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
 