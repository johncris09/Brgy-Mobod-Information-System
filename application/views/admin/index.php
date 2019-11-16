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
							<div class="col-md-12">
								<div class="overview-wrap">
									<h2 class="title-1">Dashboard</h2> 
								</div>
							</div>
						</div>
						<div class="row m-t-25"> 
							<div class="col-sm-6 col-lg-3">
								<div class="overview-item overview-item--c2">
									<div class="overview__inner">
										<div class="overview-box clearfix">
											<div class="icon">
												<i class="zmdi zmdi-account-o"></i>
											</div> 
											<div class="mb-5 text">
												<h2><?php echo $num_users; ?></h2>
												<span># of Users</span>
											</div>
										</div> 
									</div>
								</div>
							</div> 
						</div>  
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT-->
			<!-- END PAGE CONTAINER-->
		</div>
	</div>
	<?php include __DIR__ . ("\..\\include\js-src.php"); ?>
</body>

</html>
<!-- end document-->
