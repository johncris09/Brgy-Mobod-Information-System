<!DOCTYPE html>
<html lang="en">

<head>
	<?php include('include/meta-data.php'); ?>
	<?php include('include/css-link.php'); ?>
</head>

<body class="animsition">
	<div class="container">
		<div class="row  ">
			<div class="mt-5  col-lg-5 col-md-12 ">
				<form id="login-form" method="post">
					<section class="form-elegant"> 
						<img src="<?php echo base_url(); ?>assets/images/icon/logo-blue.png">
						<div class="card mt-5">
							<div class="card-body mx-4">
								<div class="text-center">
									<h3 class="dark-grey-text mb-5">
										<strong>Sign in</strong> 
									</h3>
									<span class="error text-hide text-danger"> <i class="fa fa-info-circle"></i> Invalid Username/Password</span> 
								</div>
								<div class="md-form">
									<input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
								</div>
								<div class="md-form pb-3">
									<input type="password" name="password" class="form-control" placeholder="Password" required>
									<p class="font-small blue-text d-flex justify-content-end">Forgot
										<a href="<?php echo base_url() ?>forgot_password" class="blue-text ml-1"> Password?</a>
									</p>
								</div>
								<div class="text-center mb-3">
									<button type="submit" class="btn blue-gradient btn-block btn-rounded z-depth-1a">Sign in</button>
								</div>
							</div>
						</div>
					</section>
				</form>
			</div>
			<div class="col-lg-7 col-md-12 ">
				<div id="container" class="container">
					<div id="scene" class=" scene">
						<div data-depth=".40"><img src="<?php echo base_url(); ?>assets/images/layer1.png"></div>
						<div data-depth="1.00"><img class="ml-5" style="width:100%"
								src="<?php echo base_url(); ?>assets/images/layer2.png"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include('include/js-src.php');  ?>

	<script>
		var scene = document.getElementById('scene');
		var parallax = new Parallax(scene);
	</script>
</body>

</html>
<!-- end document-->
