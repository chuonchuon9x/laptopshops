<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>ChuonChuonShop</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{{ asset('public/frontend/css/bootstrap.min.css') }}" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="{{ asset('public/frontend/css/slick.css') }}" />
	<link type="text/css" rel="stylesheet" href="{{ asset('public/frontend/css/slick-theme.css') }}" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="{{ asset('public/frontend/css/nouislider.min.css') }}" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="{{ asset('public/frontend/css/font-awesome.min.css') }}">

	<!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('public/frontend/css/style.css') }}" />
    
    {{-- logoshop --}}
	<link rel="shortcut icon" href="{{ asset('/public/frontend/img/logolaptop.jpg') }}">
	<link type="text/css" rel="stylesheet" href="{{ asset('/public/frontend/css/sweetalert.css') }}" />


	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>
<body>
    <!-- HEADER -->
	<header>
		<!-- top Header -->
		<div id="top-header">
			<div class="container">
				<div class="pull-left">
					<span>Welcome to ChuonChuonShop</span>
				</div>
				{{-- <div class="pull-right">
					<ul class="header-top-links">
						<li><a href="#">Store</a></li>
						<li><a href="#">Newsletter</a></li>
						<li><a href="#">FAQ</a></li>
						<li class="dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">ENG <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li><a href="#">English (ENG)</a></li>
								<li><a href="#">Russian (Ru)</a></li>
								<li><a href="#">French (FR)</a></li>
								<li><a href="#">Spanish (Es)</a></li>
							</ul>
						</li>
						<li class="dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">USD <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li><a href="#">USD ($)</a></li>
								<li><a href="#">EUR (€)</a></li>
							</ul>
						</li>
					</ul>
				</div> --}}
			</div>
		</div>
		<!-- /top Header -->

		<!-- header -->
		<div id="header">
			<div class="container">
				<div class="pull-left">
					<!-- Logo -->
					<div class="header-logo">
						<a class="logo" href="{{URL::to ('/trang-chu') }}">
							<img src="{{ asset('/public/frontend/img/logo.png') }}" alt="">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Search -->
					<div class="header-search">
						<form action="{{ URL::to('/tim-kiem') }}" method="POST">
							{{ csrf_field() }}
							<input class="input search-input" name="keywords_submit" type="text" placeholder="Bạn tìm kiếm gì ...">
							<select class="input search-categories">
								<option value="0">Tất Cả Sản Phẩm</option>
							</select>
							<button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
						</form>
					</div>
					<!-- /Search -->
				</div>
				<div class="pull-right">
					<ul class="header-btns">
						<!-- Account -->
						<li class="header-account dropdown default-dropdown">
							<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-user-o"></i>
								</div>
								<strong class="text-uppercase">Tài Khoản <i class="fa fa-caret-down"></i></strong>
							</div>
							
							<ul class="custom-menu">
								<?php 
									$customer_id = Session::get('customer_id');
									if ($customer_id != Null) {
								?>
									<li><a href="{{ URL::to('/logout-checkout') }}"><i class="fa fa-user-o"></i> Đăng Xuất</a></li>
								<?php 
									}else {
								?>
									<li><a href="{{ URL::to('/login-checkout') }}"><i class="fa fa-user-o"></i> Đăng Nhập</a></li>
									<li><a href="{{ URL::to('/registration-checkout') }}"><i class="fa fa-heart-o"></i> Đăng Ký</a></li>
								<?php
									}
								?>
							</ul>
						</li>
						<!-- /Account -->

						<!-- Cart -->
						<li class="header-cart dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-shopping-cart"></i>
									<span class="qty">3</span>
								</div>
								<strong class="text-uppercase">Giỏ Hàng:</strong>
							</a>
							<div class="custom-menu">
								<div id="shopping-cart">
									<div class="shopping-cart-btns">
										<a class="main-btn" href="{{ URL::to('/show-cart') }}">Giỏ Hàng</a>
										<?php 
											$customer_id = Session::get('customer_id');
											$shipping_id = Session::get('shipping_id');
											if ($customer_id != Null && $shipping_id == Null) {
										?>
											<a class="primary-btn" href="{{ URL::to('/checkout') }}"><i class="fa fa-arrow-circle-right"></i>Thanh Toán</a>
										<?php 
											}elseif ($customer_id != Null && $shipping_id != Null) {
										?>
											<a class="primary-btn" href="{{ URL::to('/payment') }}"><i class="fa fa-arrow-circle-right"></i> Thanh Toán</a>
										<?php 
											}else {
										?>
											<a class="primary-btn" href="{{ URL::to('/login-checkout') }}"><i class="fa fa-arrow-circle-right"></i> Thanh Toán</a>
										<?php 
											}
										?>
									</div>
								</div>
							</div>
						</li>
						<!-- /Cart -->

						<!-- Mobile nav toggle-->
						<li class="nav-toggle">
							<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
						</li>
						<!-- / Mobile nav toggle -->
					</ul>
				</div>
			</div>
			<!-- header -->
		</div>
		<!-- container -->
	</header>
    <!-- /HEADER -->
    
    <!-- NAVIGATION -->
	<div id="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">
				<!-- category nav -->
				<div class="category-nav show-on-click">
					<span class="category-header">Thương hiệu Sản Phẩm <i class="fa fa-list"></i></span>
						<ul class="category-list">
							@foreach ($brand as $brand_1)
								<li class="dropdown side-dropdown">
									<a href="{{ URL::to('/thuong-hieu-san-pham/'.$brand_1->brand_id) }}">{{ $brand_1->brand_name }}</a>
								</li>
							@endforeach
							{{-- @foreach ($category as $cate)
								<li class="dropdown side-dropdown">
									<a href="{{URL::to ('/danh-muc-san-pham/'.$cate->category_id) }}">{{ $cate->category_name }}</a>
								</li>
							@endforeach --}}
						
						{{-- <li class="dropdown side-dropdown"><span class="category-header">Thương Hiệu Sản Phẩm</span></li> --}}
						{{-- <li><a href="#">Bags & Shoes</a></li>
						<li><a href="#">View All</a></li> --}}
					</ul>
				</div>
				<!-- /category nav -->

				<!-- menu nav -->
				<div class="menu-nav">
					<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
					<ul class="menu-list">
						<li><a href="{{URL::to ('/trang-chu') }}">Trang Chủ</a></li>
						<li class="dropdown mega-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Sản Phẩm <i class="fa fa-caret-down"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-4">
										<ul class="list-links">
											@foreach ($brand as $brand_1)
                                                <li class="dropdown side-dropdown">
                                                    <a href="{{ URL::to('/thuong-hieu-san-pham/'.$brand_1->brand_id) }}">{{ $brand_1->brand_name }}</a>
                                                </li>
                                            @endforeach
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
							</div>
						</li>
						<li class="dropdown mega-dropdown full-width"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Tin Tức <i class="fa fa-caret-down"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-3">
										<div class="hidden-sm hidden-xs">
											<a class="banner banner-1" href="#">
												<img src="{{ asset('/public/frontend/img/banner06.jpg') }}" alt="">
											</a>
											<hr>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li><a href="{{ URL::to('show-cart') }}">Giỏ Hàng</a></li>
						<li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Liên Hệ <i class="fa fa-caret-down"></i></a>
						</li>
						<li><a href="{{ URL::to('show-cart') }}">Giỏ Hàng</a></li>
						<li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Liên Hệ <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li><a href="index.html">Home</a></li>
								<li><a href="products.html">Products</a></li>
								<li><a href="product-page.html">Product Details</a></li>
								<li><a href="checkout.html">Checkout</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<!-- menu nav -->
			</div>
		</div>
		<!-- /container -->
	</div>
    <!-- /NAVIGATION -->
    
    <!-- section -->
    <div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div id="checkout-form" class="clearfix">
                    <div class="col-md-12">
                        <div class="billing-details">
                            <div class="section-title">
                                <h3 class="title">Điền Thông Tin Giao Hàng</h3>
                            </div>
                            <form action="{{ URL::to('/save-checkout-customer') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input class="input" type="text" name="shipping_name" placeholder="Tên">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="email" name="shipping_email" placeholder="Nhập Email">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="shipping_address" placeholder="Địa Chỉ">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="tel" name="shipping_phone" placeholder="Điện Thoại">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="shipping_notes" placeholder="Ghi chú">
                                </div>
                                <input type="submit" class="btn primary-btn" name="send_order" value="Thanh Toán"/>
                            </form>
                        </div>
                    </div>
                </div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
    <!-- /section -->

    <!-- FOOTER -->
	<footer id="footer" class="section section-grey">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<!-- footer logo -->
						<div class="footer-logo">
							<a class="logo" href="{{URL::to ('/trang-chu') }}">
                            <img src="{{ URL::to('/public/frontend/img/logo.png') }}" alt="">
		          </a>
						</div>
						<!-- /footer logo -->

						<p>AdminChuonChuon</p>

						<!-- footer social -->
						<ul class="footer-social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
						</ul>
						<!-- /footer social -->
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">My Account</h3>
						<ul class="list-links">
							<li><a href="#">My Account</a></li>
							<li><a href="#">My Wishlist</a></li>
							<li><a href="#">Compare</a></li>
							<li><a href="#">Checkout</a></li>
							<li><a href="#">Login</a></li>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<div class="clearfix visible-sm visible-xs"></div>

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Customer Service</h3>
						<ul class="list-links">
							<li><a href="#">About Us</a></li>
							<li><a href="#">Shiping & Return</a></li>
							<li><a href="#">Shiping Guide</a></li>
							<li><a href="#">FAQ</a></li>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer subscribe -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Stay Connected</h3>
						<p>AdminChuonChuon</p>
						<form>
							<div class="form-group">
								<input class="input" placeholder="Enter Email Address">
							</div>
							<button class="primary-btn">Join Newslatter</button>
						</form>
					</div>
				</div>
				<!-- /footer subscribe -->
			</div>
			<!-- /row -->
			<hr>
			<!-- row -->
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<!-- footer copyright -->
					<div class="footer-copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">ChuonChuon</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</div>
					<!-- /footer copyright -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</footer>
	<!-- /FOOTER -->
    <!-- jQuery Plugins -->
    <script src="{{ asset('public/frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/slick.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/nouislider.min.js') }}"></script>
	<script src="{{ asset('public/frontend/js/jquery.zoom.min.js') }}"></script>
	<script src="{{ asset('public/frontend/js/main.js') }}"></script>
	<script src="{{ asset('public/frontend/js/sweetalert.js') }}"></script>
</body>

</html>