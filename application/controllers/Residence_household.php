<?php
defined('BASEPATH') or exit('No direct script access allowed');

 
class Residence_household extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
		// echo  $this->uri->segment(3);
		// redirect('household');
	}
	
	
	public function view_residence_household($household_id)
	{ 
		$data["page_title"] = "Residence Household";
		$this->load->view('admin/residence_household', $data);
	}

	public function load_residence_household($household_id)
	{ 
		$residence_household = $this->residence_household_model->get_residence_household($household_id);

		$output = '';

		$output .= '
			<div class="table-responsive table-responsive-data2">
				<table id="residence_household_data" class="table " cellspacing="0" width="100%">
					<thead>
					<tr> 
						<th>ID</th>
						<th>Household #</th>
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
						<th>Date Accomplished</th> 
						<th>OIC</th> 
						<th>Edit</th> 
						<th>Delete</th>
					</tr>
					</thead>
					<tbody>
		';

		if ($residence_household->num_rows() > 0) {
			foreach ($residence_household->result_array() as $row) {
				
				$array = array(
					'user_id' => $row['oic']
				);
				$oic = $this->user_model->get_user_info($array)[0]; 
				$output .= '
					<tr> 
						<td>' . ucfirst($row['residence_household_id']) . '</td>
						<td>' . ucfirst($row['household_number']) . '</td>
						<td>' . ucfirst($row['last_name']) . '</td>
						<td>' . ucfirst($row['first_name']) . '</td>
						<td>' . ucfirst($row['middle_name']) . '</td>
						<td>' . ucfirst($row['extension']) . '</td>
						<td>' . ucfirst($row['birthplace']) . '</td> 
						<td>' . date_format(date_create($row['birthdate']),'M d, Y') . '</td>  
						<td>' . ucfirst($row['gender']) . '</td>
						<td>' . ucfirst($row['civil_status']) . '</td>
						<td>' . ucfirst($row['citizenship']) . '</td>
						<td>' . ucfirst($row['occupation']) . '</td>
						<td>' . ucfirst($row['religion']) . '</td>
						<td>' . date_format(date_create($row['date_accomplished']),'M d, Y H:i:s') . '</td>  
						<td>' . ucfirst($oic['last_name']  . ',' . ' ' . $oic['first_name'] . ' ' . $oic['middle_name'] ) . '</td>
						<td><a title="Edit" href="' . base_url() . 'resident/edit_resident/' . $row['resident_id'] . '" class=" text-warning h5"><i class="fa fa-edit"></i></a></td>
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
 