
		<div class="top_nav">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="top_nav_left">free shipping on all u.s orders over $50</div>
					</div>
					<div class="col-md-6 text-right">
						<div class="top_nav_right">
							<ul class="top_nav_menu">

								<!-- Currency / Language / My Account -->

								<li class="currency">
									<a href="#">
										usd
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="currency_selection">
										<li><a href="#">aud</a></li>
										<li><a href="#">eur</a></li>
										<li><a href="#">gbp</a></li>
                    <li><a href="#">cad</a></li>
									</ul>
								</li>
								<li class="language">
									<a href=" <?php echo base_url('#')?>">
										English
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="language_selection">
										<li><a href="#">French</a></li>
										<li><a href="#">Italian</a></li>
										<li><a href="#">German</a></li>
										<li><a href="#">Spanish</a></li>
									</ul>
								</li>
								<a href=" <?php echo base_url('/')?>" style="margin-left: 20px; color: white;">
									Logout
								</a>
								<li class="account">
									<a href="#">
										<i class="fa fa-angle-down"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Main Navigation -->

		<div class="main_nav_container">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-right">
						<div class="logo_container">
							<a href="#">colo<span>shop</span></a>
						</div>
						<nav class="navbar">
							<ul class="navbar_menu">
								<li><a href="<?php echo base_url('/user')?>">home</a></li>
								<li><a href="<?php echo base_url('/shop')?>">shop</a></li>
								<li><a href="#">promotion</a></li>
								<li><a href="#">pages</a></li>
								<li><a href="#">blog</a></li>
								<li><a href="contact.html">contact</a></li>
							</ul>
							<ul class="navbar_user">
								<li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li>
								<li class="checkout">
									<a href="#">
										<i class="fa fa-shopping-cart" aria-hidden="true"></i>
										<span id="checkout_items" class="checkout_items">2</span>
									</a>
								</li>
							</ul>
							<div class="hamburger_container">
								<i class="fa fa-bars" aria-hidden="true"></i>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>

	</header>

	<div class="fs_menu_overlay"></div>
	<div class="hamburger_menu">
		<div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
		<div class="hamburger_menu_content text-right">
			<ul class="menu_top_nav">
				<li class="menu_item has-children">
					<a href="<?php echo base_url('#')?>">
						usd
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="menu_selection">
						<li><a href="<?php echo base_url('#')?>">cad</a></li>
						<li><a href="<?php echo base_url('#')?>">aud</a></li>
						<li><a href="<?php echo base_url('#')?>">eur</a></li>
						<li><a href="<?php echo base_url('#')?>">gbp</a></li>
					</ul>
				</li>
				<li class="menu_item has-children">
					<a href="<?php echo base_url('#')?>">
						English
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="menu_selection">
						<li><a href="<?php echo base_url('#')?>">French</a></li>
						<li><a href="<?php echo base_url('#')?>">Italian</a></li>
						<li><a href="<?php echo base_url('#')?>">German</a></li>
						<li><a href="<?php echo base_url('#')?>">Spanish</a></li>
					</ul>
				</li>
				<li class="menu_item has-children">
					<a href="<?php echo base_url('#')?>">
						My Account
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="menu_selection">
						<li><a href="<?php echo base_url('#')?>"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
						<li><a href="<?php echo base_url('#')?>"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
					</ul>
				</li>
				<li class="menu_item"><a href="<?php echo base_url('#')?>">home</a></li>
				<li class="menu_item"><a href="<?php echo base_url('#')?>">shop</a></li>
				<li class="menu_item"><a href="<?php echo base_url('#')?>">promotion</a></li>
				<li class="menu_item"><a href="<?php echo base_url('#')?>">pages</a></li>
				<li class="menu_item"><a href="<?php echo base_url('#')?>">blog</a></li>
				<li class="menu_item"><a href="<?php echo base_url('#')?>">contact</a></li>
			</ul>
		</div>
	</div>
