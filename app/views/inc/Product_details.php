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
						<li><a href="index.html">home</a></li>
						<li><a href="#">shop</a></li>
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

<!-- Hamburger Menu -->

<div class="hamburger_menu">
	<div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
	<div class="hamburger_menu_content text-right">
		<ul class="menu_top_nav">
			<li class="menu_item has-children">
				<a href="#">
					usd
					<i class="fa fa-angle-down"></i>
				</a>
				<ul class="menu_selection">
					<li><a href="#">cad</a></li>
					<li><a href="#">aud</a></li>
					<li><a href="#">eur</a></li>
					<li><a href="#">gbp</a></li>
				</ul>
			</li>
			<li class="menu_item has-children">
				<a href="#">
					English
					<i class="fa fa-angle-down"></i>
				</a>
				<ul class="menu_selection">
					<li><a href="#">French</a></li>
					<li><a href="#">Italian</a></li>
					<li><a href="#">German</a></li>
					<li><a href="#">Spanish</a></li>
				</ul>
			</li>
			<li class="menu_item has-children">
				<a href="#">
					My Account
					<i class="fa fa-angle-down"></i>
				</a>
				<ul class="menu_selection">
					<li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
					<li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
				</ul>
			</li>
			<li class="menu_item"><a href="#">home</a></li>
			<li class="menu_item"><a href="#">shop</a></li>
			<li class="menu_item"><a href="#">promotion</a></li>
			<li class="menu_item"><a href="#">pages</a></li>
			<li class="menu_item"><a href="#">blog</a></li>
			<li class="menu_item"><a href="#">contact</a></li>
		</ul>
	</div>
</div>

<div class="container single_product_container">
	<div class="row">
		<div class="col">

			<!-- Breadcrumbs -->

			<div class="breadcrumbs d-flex flex-row align-items-center">
				<ul>
					<li><a href="<?php echo base_url(); ?>">Home</a></li>
					<li><a href="<?php echo base_url(); ?>"><i class="fa fa-angle-right"
								aria-hidden="true"></i>Men's</a></li>
					<li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Product
							Details</a></li>
				</ul>
			</div>

			<div class="row">
				<div class="col-lg-7">
					<div class="single_product_pics">
						<div class="row">
							<div class="col-lg-3 thumbnails_col order-lg-1 order-2">
								<div class="single_product_thumbnails">
									<ul>
										<li><img src="<?php echo base_url(); ?>/assets/images/<?php echo $product->product_image; ?>"height="135" width="50"
												alt="" data-image=""></li>
										<li class="active"><img
												src="<?php echo base_url(); ?>/assets/images/<?php echo $product->product_image; ?>"height="135" width="50"
												alt="" data-image=""></li>
										<li><img src="<?php echo base_url(); ?>/assets/images/<?php echo $product->product_image; ?>"height="135" width="50"
												alt="" data-image=""></li>
									</ul>
								</div>
							</div>
							<div class="col-lg-9 image_col order-lg-2 order-1">
								<div class="single_product_image">
									<div class="single_product_image_background">

											<img src="<?php echo base_url(); ?>/assets/images/<?php echo $product->product_image; ?>"
												id="main_product_image" width="350">
										

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="product_details">
						<div class="product_details_title">

							
								<h2>
									<?php echo $product->product_name; ?>
								</h2>
								<p>
									<?php echo $product->product_summary; ?>
								</p>

							</div>
							<div class="free_delivery d-flex flex-row align-items-center justify-content-center">
								<span class="ti-truck"></span><span>free delivery</span>
							</div>
							<div class="original_price">INR
								<?php echo $product->product_selling_price; ?>
							</div>
							<div class="product_price">INR
								<?php echo $product->product_marginal_price; ?>
							</div>
							
								<ul class="star_rating">
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
								</ul>
								<div class="product_color">
									<span>Select Color:</span>
									<ul>
										<li style="background: #e54e5d"></li>
										<li style="background: #252525"></li>
										<li style="background: #60b3f3"></li>
									</ul>
								</div>
								<div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
									<span>Quantity:</span>
									<div class="quantity_selector">
										<span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
										<span id="quantity_value">1</span>
										<span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
									</div>
									<div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
									<div class="product_favorite d-flex flex-column align-items-center justify-content-center">
									</div>
								
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
</div>
</div>
</div>
</div>