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
	 

	public function load_household()
	{
		$household  = $this->household_model->get_household();
		$output = '';

		$output .= '
			<div class="table-responsive table-responsive-data2">
				<table id="household_data" class="table " cellspacing="0" width="100%">
					<thead class="  ">
						<tr>
							<th>ID</th> 
							<th>Purok</th>
							<th>Household #</th>
							<th>Date Accomplished</th>
							<th>OIC</th> 
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
		';

		if ($household->num_rows() > 0) {
			foreach ($household->result_array() as $row) {
				$output .= '
						<tr>
							<td>' . $row['household_id'] . '</td>  
							<td>' . ucfirst($row['purok']) . '</td> 
							<td>' . $row['household_number'] . '</td> 
							<td>' . date_format(date_create($row['date_registered']),'M d, Y') . '</td> 
							<td>' . ucfirst($row['last_name'] .','. $row['first_name'] . ' '. $row['middle_name']  ). '</td> 
							<td><a title="Edit" href="' . base_url() . 'household/edit_household/' . $row['household_id'] . '" class=" text-warning h5"><i class="fa fa-edit"></i></a></td>
							<td><a href="#" title="Delete"  id="' . $row['household_id'] . '" class="text-danger h5 delete_household"><i class="fa fa-trash"></i></a></td>
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
 
