<!DOCTYPE html>
<html lang="en">


@include('frontend.layouts.head')


<body class="common-home res layout-home3">
	<div id="wrapper" class="wrapper-full banners-effect-8">




		<!-- Header Container  -->
		@include('frontend.layouts.header')
		<!-- //Header Container  -->


		@section('main-body')
			
		@show



		
		<!-- Footer Container -->
		<footer class="footer-container type_footer1">
			<!-- Footer Top Container -->
			<section class="footer-top">
				<div class="container content">
					<div class="row">
						<div class="col-sm-6 col-md-3 box-information">
							<div class="module clearfix">
								<h3 class="modtitle">Information</h3>
								<div class="modcontent">
									<ul class="menu">
										<li><a href="about-us.html">About Us</a></li>
										<li><a href="faq.html">FAQ</a></li>
										<li><a href="order-history.html">Order history</a></li>
										<li><a href="order-information.html">Order information</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3 box-service">
							<div class="module clearfix">
								<h3 class="modtitle">Customer Service</h3>
								<div class="modcontent">
									<ul class="menu">
										<li><a href="contact.html">Contact Us</a></li>
										<li><a href="return.html">Returns</a></li>
										<li><a href="sitemap.html">Site Map</a></li>
										<li><a href="my-account.html">My Account</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3 box-account">
							<div class="module clearfix">
								<h3 class="modtitle">My Account</h3>
								<div class="modcontent">
									<ul class="menu">
										<li><a href="#">Brands</a></li>
										<li><a href="gift-voucher.html">Gift Vouchers</a></li>
										<li><a href="#">Affiliates</a></li>
										<li><a href="#">Specials</a></li>
										<li><a href="#" target="_blank">Our Blog</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3 collapsed-block ">
							<div class="module clearfix">
								<h3 class="modtitle">Contact Us </h3>
								<div class="modcontent">
									<ul class="contact-address">
										<li><span class="fa fa-map-marker"></span> My Company, 42 avenue des Champs
											Elysées 75000 Paris France</li>
										<li><span class="fa fa-envelope-o"></span> Email: <a href="#">
												sales@yourcompany.com</a></li>
										<li><span class="fa fa-phone">&nbsp;</span> Phone 1: 0123456789 <br>Phone 2:
											(123) 4567890</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-sm-12 collapsed-block footer-links">
							<div class="module clearfix">
								<div class="modcontent">
									<hr class="footer-lines">
									<div class="footer-directory-title">
										<h4 class="label-link">Top Stores : Brand Directory | Store Directory</h4>
										<ul class="footer-directory">
											<li>
												<h4>MOST SEARCHED KEYWORDS MARKET:</h4>
												<a href="#">Xiaomi Mi3</a> | <a href="#">Digiflip Pro XT 712 Tablet</a>
												| <a href="#">Mi 3 Phones</a> | <a href="#">View all</a>
											</li>
											<li>
												<h4>MOBILES:</h4>
												<a href="#">Moto E</a> | <a href="#">Samsung Mobile</a> | <a
													href="#">Micromax Mobile</a> | <a href="#">Nokia Mobile</a> | <a
													href="#">HTC Mobile</a> | <a href="#">Sony Mobile</a> | <a
													href="#">Apple Mobile</a> | <a href="#">LG Mobile</a> | <a
													href="#">Karbonn Mobile</a> | <a href="#">View all</a>
											</li>
											<li>
												<h4>CAMERA:</h4>
												<a href="#">Nikon Camera</a> | <a href="#">Canon Camera</a> | <a
													href="#">Sony Camera</a> | <a href="#">Samsung Camera</a> | <a
													href="#">Point shoot camera</a> | <a href="#">Camera Lens</a> | <a
													href="#">Camera Tripod</a> | <a href="#">Camera Bag</a> | <a
													href="#">View all</a>
											</li>
											<li>
												<h4>LAPTOPS:</h4>
												<a href="#">Apple Laptop</a> | <a href="#">Acer Laptop</a> | <a
													href="#">Sony Laptop</a> | <a href="#">Dell Laptop</a> | <a
													href="#">Asus Laptop</a> | <a href="#">Toshiba Laptop</a> | <a
													href="#">LG Laptop</a> | <a href="#">HP Laptop</a> | <a
													href="#">Notebook</a> | <a href="#">View all</a>
											</li>
											<li>
												<h4>TVS:</h4>
												<a href="#">Sony TV</a> | <a href="#">Samsung TV</a> | <a href="#">LG
													TV</a> | <a href="#">Panasonic TV</a> | <a href="#">Onida TV</a> |
												<a href="#">Toshiba TV</a> | <a href="#">Philips TV</a> | <a
													href="#">Micromax TV</a> | <a href="#">LED TV</a> | <a href="#">LCD
													TV</a> | <a href="#">Plasma TV</a> | <a href="#">3D TV</a> | <a
													href="#">Smart TV</a> | <a href="#">View all</a>
											</li>
											<li>
												<h4>TABLETS:</h4>
												<a href="#">Micromax Tablets</a> | <a href="#">HCL Tablets</a> | <a
													href="#">Samsung Tablets</a> | <a href="#">Lenovo Tablets</a> | <a
													href="#">Karbonn Tablets</a> | <a href="#">Asus Tablets</a> | <a
													href="#">Apple Tablets</a> | <a href="#">View all</a>
											</li>
											<li>
												<h4>WATCHES:</h4>
												<a href="#">FCUK Watches</a> | <a href="#">Titan Watches</a> | <a
													href="#">Casio Watches</a> | <a href="#">Fastrack Watches</a> | <a
													href="#">Timex Watches</a> | <a href="#">Fossil Watches</a> | <a
													href="#">Diesel Watches</a> | <a href="#">Luxury Watches</a> | <a
													href="#">View all</a>
											</li>
											<li>
												<h4>CLOTHING:</h4>
												<a href="#">Shirts</a> | <a href="#">Jeans</a> | <a href="#">T
													shirts</a> | <a href="#">Kurtis</a> | <a href="#">Sarees</a> | <a
													href="#">Levis Jeans</a> | <a href="#">Killer Jeans</a> | <a
													href="#">Pepe Jeans</a> | <a href="#">Arrow Shirts</a> | <a
													href="#">Ethnic Wear</a> | <a href="#">Formal Shirts</a> | <a
													href="#">Peter England Shirts</a> | <a href="#">View all</a>
											</li>
											<li>
												<h4>FOOTWEAR:</h4>
												<a href="#">Shoes</a> | <a href="#">Casual Shoes</a> | <a
													href="#">Adidas Shoes</a> | <a href="#">Gas Shoes</a> | <a
													href="#">Puma Shoes</a> | <a href="#">Reebok Shoes</a> | <a
													href="#">Woodland Shoes</a> | <a href="#">Red tape Shoes</a> | <a
													href="#">Nike Shoes</a> | <a href="#">View all</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- /Footer Top Container -->
			<!-- Footer Bottom Container -->
			<div class="footer-bottom-block ">
				<div class=" container">
					<div class="row">
						<div class="col-sm-5 copyright-text"> © 2016 Market. All Rights Reserved. </div>
						<div class="col-sm-7">
							<div class="block-payment text-right"><img src="{{ asset('') }}frontend/assets/image/demo/content/payment.png"
									alt="payment" title="payment"></div>
						</div>
						<!--Back To Top-->
						<div class="back-to-top"><i class="fa fa-angle-up"></i><span> Top </span></div>
					</div>
				</div>
			</div>
			<!-- /Footer Bottom Container -->
		</footer>
		<!-- //end Footer Container -->
	</div>
	<!-- Social widgets -->
	<section class="social-widgets visible-lg">
		<ul class="items">
			<li class="item item-01 facebook">
				<a href="php/facebook8859.html?account=envato" class="tab-icon"><span class="fa fa-facebook"></span></a>
				<div class="tab-content">
					<div class="title">
						<h5>FACEBOOK</h5>
					</div>
					<div class="loading">
						<img src="{{ asset('') }}frontend/assets/image/theme/lazy-loader.gif" class="ajaxloader" alt="loader">
					</div>
				</div>
			</li>
			<li class="item item-02 twitter">
				<a href="php/twitterfdaa.html?account_twitter=envato" class="tab-icon"><span
						class="fa fa-twitter"></span></a>
				<div class="tab-content">
					<div class="title">
						<h5>TWITTER FEEDS</h5>
					</div>
					<div class="loading">
						<img src="{{ asset('') }}frontend/assets/image/theme/lazy-loader.gif" class="ajaxloader" alt="loader">
					</div>
				</div>
			</li>
			<li class="item item-03 youtube">
				<a href="php/youtubevideo2de8.html?account_video=PY2RLgTmiZY" class="tab-icon"><span
						class="fa fa-youtube"></span></a>
				<div class="tab-content">
					<div class="title">
						<h5>YouTube</h5>
					</div>
					<div class="loading"> <img src="{{ asset('') }}frontend/assets/image/theme/lazy-loader.gif" class="ajaxloader" alt="loader"></div>
				</div>
			</li>
		</ul>
	</section>
	<!-- End Social widgets -->
	<!-- Include Libs & Plugins
         ============================================ -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script type="text/javascript" src="{{ asset('') }}frontend/assets/js/jquery-2.2.4.min.js"></script>
	<script type="text/javascript" src="{{ asset('') }}frontend/assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="{{ asset('') }}frontend/assets/js/owl-carousel/owl.carousel.js"></script>
	<script type="text/javascript" src="{{ asset('') }}frontend/assets/js/themejs/libs.js"></script>
	<script type="text/javascript" src="{{ asset('') }}frontend/assets/js/unveil/jquery.unveil.js"></script>
	<script type="text/javascript" src="{{ asset('') }}frontend/assets/js/countdown/jquery.countdown.min.js"></script>
	<script type="text/javascript" src="{{ asset('') }}frontend/assets/js/dcjqaccordion/jquery.dcjqaccordion.2.8.min.js"></script>
	<script type="text/javascript" src="{{ asset('') }}frontend/assets/js/datetimepicker/moment.js"></script>
	<script type="text/javascript" src="{{ asset('') }}frontend/assets/js/datetimepicker/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="{{ asset('') }}frontend/assets/js/jquery-ui/jquery-ui.min.js"></script>
	<script type="text/javascript" src="{{ asset('') }}frontend/assets/js/modernizr/modernizr-2.6.2.min.js"></script>

	{{-- slider --}}
	<script type="text/javascript" src="{{ asset('') }}frontend/assets/slider/wowslider.js"></script>
	<script type="text/javascript" src="{{ asset('') }}frontend/assets/slider/script.js"></script>
	<!-- Theme files
         ============================================ -->
	<script type="text/javascript" src="{{ asset('') }}frontend/assets/js/themejs/application.js"></script>
	<script type="text/javascript" src="{{ asset('') }}frontend/assets/js/themejs/homepage.js"></script>
	<script type="text/javascript" src="{{ asset('') }}frontend/assets/js/themejs/so_megamenu.js"></script>
	<script type="text/javascript" src="{{ asset('') }}frontend/assets/js/themejs/addtocart.js"></script>
	
	






	<script>
	
		var deadline = new Date("dec 31, 2023 15:37:25").getTime();
		
		var x = setInterval(function() {
		
		var now = new Date().getTime();
		var t = deadline - now;
		var days = Math.floor(t / (1000 * 60 * 60 * 24));
		var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60));
		var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
		var seconds = Math.floor((t % (1000 * 60)) / 1000);
		document.getElementById("day").innerHTML =days ;
		document.getElementById("hour").innerHTML =hours;
		document.getElementById("minute").innerHTML = minutes; 
		document.getElementById("second").innerHTML =seconds; 
		if (t < 0) {
				clearInterval(x);
				document.getElementById("demo").innerHTML = "TIME UP";
				document.getElementById("day").innerHTML ='0';
				document.getElementById("hour").innerHTML ='0';
				document.getElementById("minute").innerHTML ='0' ; 
				document.getElementById("second").innerHTML = '0'; }
		}, 1000);
	</script>
</body>


</html>