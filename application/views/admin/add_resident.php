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
							<div class="col-12 ">
								<div class="card card-cascade narrower">
									<div class="view view-cascade gradient-card-header purple-gradient">
										<h2 class="card-header-title my-2 mx-2 float-left text-white"><?php echo $page_title; ?></h2>
									</div> 
									<div class="card-body card-body-cascade">
										<div class="mb-2"><small>Note: <span class="text-danger">*</span> is required</small></div>
										<div class="row">
											<!-- <div class=" col-md-4"> 
												<form id="add_resident_form" method="post">
													<label class="h4">Profile Picture</label>
													<hr>
													<div class="overview-item overview-item--c2 pb-2">
														<div class="overview__inner">
															<div class="overview-box clearfix">
																<div id="targetOuter">
																	<div id="targetLayer">
																	</div>
																	<img src="<?php echo base_url() . 'assets/images/icon/default-profile.jpg' ?>"
																		alt="User profile picture""  class=" img icon-choose-image" />
																	<div class="icon-choose-image">
																		<input name="userImage" id="userImage" type="file" class="inputFile" />
																	</div>
																</div>
																<h3 class="profile-username text-center">
																</h3>
																<p class="text-muted text-center">
																</p> 
																<button title="Upload Photo" type="submit" class="btn blue-gradient btn-block btn-rounded z-depth-1a">Upload Photo</button> 
															</div>
														</div>
													</div>
													<div class="box box-primary">
														<div class="box-body box-profile">
														</div>
													</div>
												</form> 
											</div> -->
											<div class="col-md-12">
												<form id="add_resident_form" method="post">
													<label class="h4">Personal Informaton</label>
													<hr> 
													<div class="form-group">
														<label for="last_name" class="control-label mb-1">Last Name <sup class="text-danger">*</sup></label>
														<input name="last_name" id="last_name" type="text" class="form-control"
															placeholder="Last Name" required autofocus>
													</div>
													<div class="form-group">
														<label for="first_name" class="control-label mb-1">First Name <sup class="text-danger">*</sup></label>
														<input name="first_name" id="first_name" type="text" class="form-control"
															placeholder="First Name" required>
													</div>
													<div class="form-group">
														<label for="middle_name" class="control-label mb-1">Middle Name</label>
														<input name="middle_name" id="middle_name" type="text" class="form-control"
															placeholder="Middle Name">
													</div>
													<div class="form-group">
														<label for="extension" class="control-label mb-1">Extension</label>
														<input name="extension" id="extension" type="text" class="form-control"
															placeholder="Extension">
													</div>
													<div class="form-group">
														<label for="birthplace" class="control-label mb-1">Birthplace <sup class="text-danger">*</sup></label>
														<textarea  name="birthplace" id="birthplace" class="form-control"
															placeholder="Birthplace" required></textarea>
													</div>
													<div class="form-group">
														<label for="birthdate" class="control-label mb-1">Birthdate <sup class="text-danger">*</sup></label>
														<input name="birthdate" id="birthdate" type="date" class="form-control"
															placeholder="Birthdate" required>
													</div> 
													<div class="form-group">
														<label for="gender" class="control-label mb-1">Gender <sup class="text-danger">*</sup></label> 
														<select name="gender" id="gender" class="form-control" required>
															<option value="">Select</option>
															<option value="Male">Male</option>
															<option value="Female">Female</option>
														</select>
													</div> 
													<div class="form-group">
														<label for="civil_status" class="control-label mb-1">Civil Status <sup class="text-danger">*</sup></label> 
														<select name="civil_status" id="civil_status" class="form-control" required>
															<option value="">Select</option>
															<?php
															foreach($this->config->item('civil_status') as $row):
																echo '
																	<option value="'.$row.'">'.$row.'</option> 
																';
															endforeach;
															?> 
														</select>
													</div>
													<div class="form-group">
														<label for="citizenship" class="control-label mb-1">Citizenship <sup class="text-danger">*</sup></label>
														<select name="citizenship" id="citizenship" class="form-control"
														  required>
															<option value="">Select</option>
															<?php
															foreach($this->config->item('citizenship') as $row):
																echo '
																	<option value="'.$row.'">'.$row.'</option> 
																';
															endforeach;
															?> 
														</select>
													</div> 
													<div class="form-group">
														<label for="Occupation" class="control-label mb-1">Occupation <sup class="text-danger">*</sup></label>
														<select name="occupation" id="occupation" class="form-control"
														 required>
															<option value="">Select</option>
															<?php
															foreach($this->config->item('occupation') as $row):
																echo '
																	<option value="'.$row.'">'.$row.'</option> 
																';
															endforeach;
															?> 
														</select>
													</div> 
													<div class="form-group">
														<label for="religion" class="control-label mb-1">Religion <sup class="text-danger">*</sup></label>
														<select name="religion" id="religion" class="form-control"
														 required>
															<option value="">Select</option>
															<?php
															foreach($this->config->item('religion') as $row):
																echo '
																	<option value="'.$row.'">'.$row.'</option> 
																';
															endforeach;
															?> 
														</select>
													</div>  
													<label class="h4">Household</label>
													<hr> 
													<div class="form-group"> 
														<label for="household" class="control-label mb-1">Household <sup class="text-danger">*</sup></label> 
														<select name="household" id="household" class="form-control" required>
															<option value="">Select</option> 
															<?php
																if($household->num_rows() > 0):
																	foreach($household->result_array() as $row):
																		echo ' 
																			<option value="'.$row['household_id'].'">'. $row['household_number'].'</option> 
																		';
																	endforeach;
																endif; 
															?>
														</select>
													</div>
													<div>
														<button title="Add Resident" type="submit"
															class="btn blue-gradient btn-block btn-rounded z-depth-1a">Add Resident</button>
													</div>
												</form>
											</div>
										</div>
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
