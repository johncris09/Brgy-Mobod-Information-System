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
										<h2 class="card-header-title my-2 mx-2 float-left text-white"><?php echo $page_title; ?></h2></h2>
										<a href="<?php echo base_url() . 'position/print' ?>"
											class="float-right text-white btn-rounded  btn-lg aqua-gradient my-2 mx-2  " title="Print">
											<i class="fas fa-print"></i>
										</a>
										<a href="<?php echo base_url() . 'position/add_position' ?>"
											class="float-right text-white btn-rounded  btn-lg peach-gradient my-2 mx-2  " title="Add Position">
											<i class="fas fa-plus"></i> Add Position
										</a>
									</div>
									<div class="card-body card-body-cascade text-center">
										<div id="position_list"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php include __DIR__ . ("\..\\layout\\footer.php"); ?>
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
