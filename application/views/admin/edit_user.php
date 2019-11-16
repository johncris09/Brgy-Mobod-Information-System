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
												<form id="" method="post">
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
												<form id="update_user_form" method="post">
													<label class="h4">Personal Informaton</label> 
													<hr>
													<input value="<?php echo $user['user_id']; ?>" type="hidden" name="user_id" id="user_id" >
													<div class="form-group">
														<label for="last_name" class="control-label mb-1">Last Name <sup class="text-danger">*</sup></label>
														<input value="<?php echo $user['last_name']; ?>" name="last_name" id="last_name" type="text" class="form-control"
															placeholder="Last Name" required autofocus>
													</div>
													<div class="form-group">
														<label for="first_name" class="control-label mb-1">First Name <sup class="text-danger">*</sup></label>
														<input value="<?php echo $user['first_name']; ?>"  name="first_name" id="first_name" type="text" class="form-control"
															placeholder="First Name" required>
													</div>
													<div class="form-group">
														<label for="middle_name" class="control-label mb-1">Middle Name</label>
														<input value="<?php echo $user['middle_name']; ?>"  name="middle_name" id="middle_name" type="text" class="form-control"
															placeholder="Middle Name">
													</div>
													<label class="h4">User Account</label>
													<hr>
													<div class="form-group">
														<label for="email" class="control-label mb-1">Email</label>
														<input  value="<?php echo $user['email']; ?>"  name="email" id="email" type="email" class="form-control" placeholder="Email">
													</div>
													<div class="form-group">
														<label for="username" class="control-label mb-1">Username <sup class="text-danger">*</sup></label>
														<input value="<?php echo $user['username']; ?>" name="username" id="username" type="text" class="form-control"
															placeholder="Username" required>
													</div> 
													<div class="form-group">
														<label for="user_type" class="control-label mb-1">User Type <sup class="text-danger">*</sup></label>
														<select name="user_type" id="user_type" class="form-control" required>
															<option value="">Select</option>
															<?Php
																if($user_type->num_rows() > 0):
																	foreach($user_type->result_array() as $row):
																		$selected = '';
																		if($user['user_type_id'] == $row['user_type_id']):
																			$selected = 'selected';
																		endif;
																		echo ' 
																			<option value="'.$row['user_type_id'].'" '.$selected.'>'.ucfirst($row['user_type']).'</option> 
																		';
																	endforeach;
																endif; 
															?>
														</select>
													</div>
													<label class="h4">Brgy. Position</label>
													<hr>
													<div class="form-group">
														<label for="position" class="control-label mb-1">Position <sup class="text-danger">*</sup></label>
														<select name="position" id="position" class="form-control" required>
															<option value="">Select</option>
															<?php
																if($position->num_rows() > 0):
																	foreach($position->result_array() as $row):
																		$selected = '';
																		if($user['position_id'] == $row['position_id']):
																			$selected = 'selected';
																		endif;
																		echo ' 
																			<option value="'.$row['position_id'].'" '.$selected.'>'.ucfirst($row['position']).'</option> 
																		';
																	endforeach;
																endif; 
															?>
														</select>
													</div>
													<div>
														<button title="Update User" type="submit"
															class="btn blue-gradient btn-block btn-rounded z-depth-1a">Update User</button>
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
