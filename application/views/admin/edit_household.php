<!DOCTYPE html>
<html lang="en">

<head>
	<?php include __DIR__ . ("\..\\include\meta-data.php"); ?>
	<?php include __DIR__ . ("\..\\include\css-link.php"); ?>
</head>

<body class="animsition">
	<div class="page-wrapper">
		<?php include __DIR__ . ("\..\\layout\header-mobile.php"); ?>
		<?php include __DIR__ . ("\..\\layout\menu-sidebar.php"); ?>
		<!-- PAGE CONTAINER-->
		<div class="page-container">
			<?php include __DIR__ . ("\..\\layout\header-desktop.php"); ?>
			<!-- MAIN CONTENT-->

			<div class="main-content">
				<div class="section__content section__content--p30">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12 ">
								<div class="card card-cascade narrower">
									<div class="view view-cascade gradient-card-header purple-gradient">
										<h2 class="card-header-title my-2 mx-2 float-left text-white">Edit Purok</h2>
									</div>
									<div class="card-body card-body-cascade">  
										<form id="update_purok_form" method="post">
											<div class="mb-2"><small>Note: <span class="text-danger">*</span> is required</small></div>
											<input value="<?php echo $household['household_id']; ?>" name="household_id" id="household_id" type="hidden" class="form-control">
											<div class="form-group">
												<label for="purok" class="control-label mb-1">Purok <sup class="text-danger">*</sup></label>
												<select name="purok" id="purok" class="form-control" required>
													<option value="">Select</option>
													<?Php
														if($purok->num_rows() > 0):
															foreach($purok->result_array() as $row):
																$selected = "";
																if($household['purok_id'] == $row['purok_id']):
																	$selected = "selected";
																endif;
																echo ' 
																	<option value="'.$row['purok_id'].'" '.$selected.'>'.ucfirst($row['purok']).'</option> 
																';
															endforeach;
														endif; 
													?>
												</select>
											</div>
											<div class="form-group">
												<label for="household_no" class="control-label mb-1">Household # <sup
														class="text-danger">*</sup></label>
												<input name="household_no" id="household_no" type="text" class="form-control"
													placeholder="Household #" required>
											</div>
											<div>
												<button title="Add Household" type="submit"
													class="btn blue-gradient btn-block btn-rounded z-depth-1a">Add Household</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php include __DIR__ . ("\..\\layout\\footer.php"); ?>
				</div>
			</div>
		</div>
	</div>
	<?php include __DIR__ . ("\..\\include\js-src.php"); ?>
</body>

</html>
<!-- end document-->
