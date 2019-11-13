<!DOCTYPE html>
<html lang="en">

<head>
	<?php include('include/meta-data.php'); ?>
	<?php include('include/css-link.php'); ?>
</head>

<body class=" animsition    ">
	<div class="page-wrapper">
		<div class="page-content--bge5">
			<div class="container">
				<div class="login-wrap">
					<div class="login-content">
						<div class="login-logo">
							<a href="#">
								<img src="<?php echo base_url(); ?>assets/images/icon/logo-blue.png">
							</a>
						</div>
						<div class="login-form">
							<form action="" method="post">
								<div class="form-group">
									<label>Email Address</label>
									<input class="au-input au-input--full" type="email" name="email" placeholder="Email">
								</div>  
								<button type="submit" class="btn blue-gradient btn-block btn-rounded z-depth-1a">Sign in</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<?php include('include/js-src.php');  ?>
</body>

</html>
<!-- end document-->
