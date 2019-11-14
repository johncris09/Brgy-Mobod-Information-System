
			<!-- HEADER DESKTOP-->
			<header class="header-desktop">
				<div class="section__content section__content--p30">
					<div class="container-fluid">
						<div class="header-wrap">
							<form class="form-header" action="" method="POST">
								<input class="au-input au-input--xl" type="text" name="search"
									placeholder="Search for datas &amp; reports..." />
								<button class="au-btn--submit" type="submit">
									<i class="zmdi zmdi-search"></i>
								</button>
							</form>
							<div class="header-button">
								<div class="noti-wrap">
									<div class="noti__item js-item-menu">
										<i class="zmdi zmdi-comment-more"></i>
										<span class="quantity">1</span>
										<div class="mess-dropdown js-dropdown">
											<div class="mess__title">
												<p>You have 1 news message</p>
											</div>
											<div class="mess__item">
												<div class="image img-cir img-40">
													<img src="<?php echo base_url(); ?>assets/images/icon/avatar-02.jpg" alt="Michelle Moreno" />
												</div>
												<div class="content">
													<h6>Michelle Moreno</h6>
													<p>Have sent a photo</p>
													<span class="time">3 min ago</span>
												</div>
											</div> 
											<div class="mess__footer">
												<a href="#">View all messages</a>
											</div>
										</div>
									</div>
									<div class="noti__item js-item-menu">
										<i class="zmdi zmdi-email"></i>
										<span class="quantity">1</span>
										<div class="email-dropdown js-dropdown">
											<div class="email__title">
												<p>You have 1 New Email</p>
											</div>
											<div class="email__item">
												<div class="image img-cir img-40">
													<img src="<?php echo base_url(); ?>assets/images/icon/avatar-02.jpg" alt="Cynthia Harvey" />
												</div>
												<div class="content">
													<p>Meeting about new dashboard...</p>
													<span>Cynthia Harvey, 3 min ago</span>
												</div>
											</div> 
											<div class="email__footer">
												<a href="#">See all emails</a>
											</div>
										</div>
									</div>
									<div class="noti__item js-item-menu">
										<i class="zmdi zmdi-notifications"></i>
										<span class="quantity">1</span>
										<div class="notifi-dropdown js-dropdown">
											<div class="notifi__title">
												<p>You have 1 Notifications</p>
											</div>
											<div class="notifi__item">
												<div class="bg-c1 img-cir img-40">
													<i class="zmdi zmdi-email-open"></i>
												</div>
												<div class="content">
													<p>You got a email notification</p>
													<span class="date">April 12, 2018 06:50</span>
												</div>
											</div> 
											<div class="notifi__footer">
												<a href="#">All notifications</a>
											</div>
										</div>
									</div>
								</div>
								<div class="account-wrap">
									<div class="account-item clearfix js-item-menu"> 
											<div class="image">
												<img src="<?php echo base_url(); ?>assets/images/icon/default-profile.jpg" alt="<?php echo $this->session->userdata('first_name'); ?>" />
											</div>
											<div class="content">
												<a class="js-acc-btn" href="#"><?php echo $this->session->userdata('first_name'); ?></a>
											</div> 
										<div class="account-dropdown js-dropdown">
											<div class="info clearfix">
												<div class="image">
													<a href="#">
														<img src="<?php echo base_url(); ?>assets/images/icon/default-profile.jpg" alt="<?php echo $this->session->userdata('first_name'); ?>" />
													</a>
												</div>
												<div class="content">
													<h5 class="name">
														<a href="#"><?php echo $this->session->userdata('first_name'); ?></a>
													</h5>
													<span class="email"><?php echo $this->session->userdata('email');  ?></span>
												</div>
											</div>
											<div class="account-dropdown__body">
												<div class="account-dropdown__item">
													<a href="#">
														<i class="zmdi zmdi-account"></i>Account</a>
												</div> 
											</div>
											<div class="account-dropdown__footer">
												<a href="logout">
													<i class="zmdi zmdi-power"></i>Logout</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
			<!-- HEADER DESKTOP-->
