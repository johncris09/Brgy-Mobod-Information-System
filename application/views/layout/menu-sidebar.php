		<!-- MENU SIDEBAR-->
		<aside class="menu-sidebar d-none d-lg-block">
			<div class="logo">
				<a href="<?php echo base_url(); ?>">
					<img src="<?php echo base_url() ?>assets/images/icon/logo-blue.png" alt="CoolAdmin" />
				</a>
			</div>
			<div class="menu-sidebar__content js-scrollbar1">
				<nav class="navbar-sidebar">
					<ul class="list-unstyled navbar__list">
						<li>
							<a href="<?php echo base_url(); ?>">
								<i class="fas fa-tachometer-alt"></i>Dashboard
							</a> 
						</li> 
						<li class="has-sub">
							<a class="js-arrow open" href="#">
								<i class="fas fa-road"></i>Purok</a>
							<ul class="list-unstyled navbar__sub-list js-sub-list" >
								<li>
								<a href="<?php echo base_url() ?>purok/add_purok"> <i class="fas fa-circle-notch"></i> Add Purok</a>
								</li> 
								<li>
									<a href="<?php echo base_url() ?>purok"><i class="fas fa-circle-notch"></i> View Purok</a>
								</li>
							</ul>
						</li>
						<li class="has-sub">
							<a class="js-arrow open" href="#">
								<i class="fas fa-sitemap"></i>Position</a>
							<ul class="list-unstyled navbar__sub-list js-sub-list" >
								<li>
								<a href="<?php echo base_url() ?>position/add_position"> <i class="fas fa-circle-notch"></i> Add Position</a>
								</li> 
								<li>
									<a href="<?php echo base_url() ?>position"><i class="fas fa-circle-notch"></i> View Position</a>
								</li>
							</ul>
						</li> 
						<li class="has-sub">
							<a class="js-arrow open" href="#">
								<i class="fa fa-user-secret"></i>User Type</a>
							<ul class="list-unstyled navbar__sub-list js-sub-list" >
								<li>
								<a href="<?php echo base_url() ?>user_type/add_user_type"> <i class="fas fa-circle-notch"></i> Add User Type</a>
								</li> 
								<li>
									<a href="<?php echo base_url() ?>user_type"><i class="fas fa-circle-notch"></i>View User Type</a>
								</li>
							</ul>
						</li>
						<li class="has-sub">
							<a class="js-arrow open" href="#">
								<i class="fas fa-users"></i>User</a>
							<ul class="list-unstyled navbar__sub-list js-sub-list" >
								<li>
								<a href="<?php echo base_url() ?>user/add_user"> <i class="fas fa-circle-notch"></i> Add User</a>
								</li> 
								<li>
									<a href="<?php echo base_url() ?>user"><i class="fas fa-circle-notch"></i>View User</a>
								</li>
							</ul>
						</li> 
						<li class="has-sub">
							<a class="js-arrow open" href="#">
								<i class="fas fa-home"></i>Household</a>
							<ul class="list-unstyled navbar__sub-list js-sub-list" >
								<li>
								<a href="<?php echo base_url() ?>household/add_household"> <i class="fas fa-circle-notch"></i> Add Household</a>
								</li> 
								<li>
									<a href="<?php echo base_url() ?>household"><i class="fas fa-circle-notch"></i>View Household</a>
								</li>
							</ul>
						</li>
						<li class="has-sub">
							<a class="js-arrow open" href="#">
								<i class="fas fa-resident"></i>Resident</a>
							<ul class="list-unstyled navbar__sub-list js-sub-list" >
								<li>
								<a href="<?php echo base_url() ?>resident/add_resident"> <i class="fas fa-circle-notch"></i> Add Resident</a>
								</li> 
								<li>
									<a href="<?php echo base_url() ?>resident"><i class="fas fa-circle-notch"></i>View Resident</a>
								</li>
							</ul>
						</li>
					</ul>
				</nav>
			</div>
		</aside>
		<!-- END MENU SIDEBAR-->
