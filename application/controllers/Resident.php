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

	
	public function load_resident()
	{
		$resident  = $this->resident_model->fetch_resident();
		$output = '';   

		$output .= '
			<div class="table-responsive table-responsive-data2">
				<table id="resident_data" class="table " cellspacing="0" width="100%">
					<thead class="  ">
						<tr>
							<th>ID</th> 
							<th>Last Name</th>
							<th>First Name</th>
							<th>Middle Name</th>
							<th>Extension</th>
							<th>Birthplace</th>
							<th>Birthdate</th>
							<th>Gender</th>
							<th>Civil Status</th>
							<th>Citizenship</th>
							<th>Occupation</th>
							<th>Religion</th> 
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
		';

		if ($resident->num_rows() > 0) {
			foreach ($resident->result_array() as $row) {
				$output .= '
						<tr>
							<td>' . $row['resident_id'] . '</td> 
							<td>' . ucfirst($row['last_name']) . '</td> 
							<td>' . ucfirst($row['first_name']) . '</td> 
							<td>' . ucfirst($row['middle_name']) . '</td>
							<td>' . ucfirst($row['extension']) . '</td> 
							<td>' . ucfirst($row['birthplace']) . '</td> 
							<td>' . ucfirst($row['birthdate']) . '</td>
							<td>' . ucfirst($row['gender']) . '</td>
							<td>' . ucfirst($row['civil_status']) . '</td> 
							<td>' . ucfirst($row['citizenship']) . '</td> 
							<td>' . ucfirst($row['occupation']) . '</td>
							<td>' . ucfirst($row['religion']) . '</td>
							<td><a title="Edit" href="' . base_url() . 'resident/edit_resident/' . $row['resident_id'] . '" class="text-warning h5"><i class="fa fa-edit"></i></a></td>
							<td><a href="#" title="Delete"  id="' . $row['resident_id'] . '" class="text-danger h5 delete_resident"><i class="fa fa-trash"></i></a></td>
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
 