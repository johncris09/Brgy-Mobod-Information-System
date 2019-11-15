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
										<h2 class="card-header-title my-2 mx-2 float-left text-white">Edit Position</h2>
									</div>
									<div class="card-body card-body-cascade">
										<hr>
										<form id="update_position_form" method="post">
											<div class="form-group">
												<input name="position_id" id="position_id" type="hidden" value="<?php echo $position['position_id'] ?>" class="form-control"
													required autofocus>
											</div>
											<div class="form-group">
												<label for="position" class="control-label mb-1">Position</label>
												<input name="position" id="position" type="text" value="<?php echo $position['position'] ?>" class="form-control"
													placeholder="position" required autofocus>
											</div>
											<div>
												<button title="Edit Position" type="submit"
													class="btn blue-gradient btn-block btn-rounded z-depth-1a">Edit Position</button>
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
