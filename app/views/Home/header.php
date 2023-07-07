<!DOCTYPE html>
<html lang="en">

<head>
	<title>PBB</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Colo Shop Template">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,500,500i,700,800i" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/animate.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/categories_styles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/categories_responsive.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/contact_styles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/contact_responsive.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/single_styles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/single_responsive.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.5.0/css/bootstrap.min.css">
</head>

<body>

	<div class="super_container">

		<!-- Header -->

		<header class="header trans_300">

			<!-- Top Navigation -->

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
											<li><a href="#">cad</a></li>
											<li><a href="#">aud</a></li>
											<li><a href="#">eur</a></li>
											<li><a href="#">gbp</a></li>
										</ul>
									</li>
									<li class="language">
										<a href="#">
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
									<li class="account">
										<?php
										$data['name'] = $this->session->userdata('name');
										if ($data['name']) { ?>
											<a href="#">
												<?php echo $data['name']; ?>
												<i class="fa fa-angle-down"></i>
											</a>
											<ul class="account_selection">
												<li><a href="<?php echo base_url(); ?>User/logout">
														<i class="fa fa-sign-out" aria-hidden="true"></i>Log Out</a></li>
											</ul>
											
											
										<?php } else { ?>
											<a href="#">
												My Account
												<i class="fa fa-angle-down"></i>
											</a>
											<ul class="account_selection">
												<li><a href="<?php echo base_url(); ?>User/login"><i class="fa fa-sign-in"
															aria-hidden="true"></i>Log In</a>
												</li>
												<li><a href="<?php echo base_url(); ?>User/register"><i
															class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
											</ul>
										<?php } ?>
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
								<a href="#">PBB<span>KART</span></a>
							</div>
							<nav class="navbar">
								<ul class="navbar_menu">
									<li><a href="<?php echo base_url(); ?>">home</a></li>
									<!-- <li><a href="#">shop</a></li>
									<li><a href="#">promotion</a></li>
									<li><a href="#">pages</a></li>
									<li><a href="#">blog</a></li> -->
									<li>
										<?php
										$data['id'] = $this->session->userdata('id'); ?>

									</li>
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