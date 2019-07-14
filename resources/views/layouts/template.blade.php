<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>{{config('app.name' , 'MyDelivery')}}</title>

 		<!-- Google font -->
		 <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
		 
 		<!-- Bootstrap -->
 		<link type="text/css" rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>


 		<!-- Slick -->
 		<link type="text/css" rel="stylesheet" href="{{asset('css/slick.css')}}"/>
 		<link type="text/css" rel="stylesheet" href="{{asset('css/slick-theme.css')}}"/>

 		<!-- nouislider -->
 		<link type="text/css" rel="stylesheet" href="{{asset('css/nouislider.min.css')}}"/>

 		<!-- Font Awesome Icon -->
 		<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">

 		<!-- Custom stlylesheet -->
		 <link type="text/css" rel="stylesheet" href="{{asset('css/style.css')}}"/>
		 <link type="text/css" rel="stylesheet" href="{{asset('css/itemview.css')}}"/>

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
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<!--<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +96171416551</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> mhdi.hsen@gmail.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> Zawtar Charkieh</a></li>
					</ul>-->
					<ul class="header-links pull-right ">

							@if (Route::has('login'))
									@auth
									<li class="nav-item dropdown">
											<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
													{{ Auth::user()->name }} <span class="caret"></span>
											</a>
				
											<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
													<a class=" dropdown-item" style="color:black" href="{{ route('logout') }}"
														 onclick="event.preventDefault();
																					 document.getElementById('logout-form').submit();">
															<div class = "logout">{{ __('Logout') }}</div>
													</a>
				
													<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
															@csrf
													</form>
											</div>
									</li>
									@else
									<li >	<a href ="{{ route('login') }}"><i class="fa fa-sign-in"></i> Login</a></li>
											@if (Route::has('register'))
											<li >	<a href ="{{ route('register') }}"><i class="fa fa-user-plus"></i> Register</a></li>
											@endif
									@endauth
					@endif
						<li class="c_lbp" style="display:none;"><a id="tousd"><i class="fa fa-dollar"></i>LBP</a></li>
						<li class="c_usd"><a id="tolbp"><i class="fa fa-dollar"></i>USD</a></li>
									<!--<div class="a-dropdown">
										<div class="a-btns">
											<a href="/">Login</a>
											<a href="/">Register</a>
										</div>-->
									</div>
								</div>
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="/" class="logo">
									<img src="{{asset('./img/logoo.png')}}" alt="" style="max-width:169px; max-height:70px">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form method="GET" action="/searchresult">
									<select class="input-select" name="cat-select" style="width:23%;">
										<option value="0">All</option>
										<option value="1">PR</option>
										<option value="2">ST</option>
									</select>
									<input name="tex" class="input" placeholder="Search here" style="width:45%;">
									<input type="submit" class="search-btn" name="Search" >
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div style="cursor:pointer;">
									<a href="/wishlist">
										<i class="fa fa-heart-o"></i>
										<span>Your Wishlist</span>
										<!--<div class="qty">2</div>-->
									</a>
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown" id="dropdown-refresh" style="cursor:pointer; padding-left:20px;">
									
									@if(Auth::check())
									
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
										<div class="qty" id="ch-qty">{{count($yourcart)}}</div>
									</a>
									
									@else
									
								<a href="{{route('login')}}"><i class="fa fa-shopping-cart"></i>
									<span>Your Cart</span></a>
									
									@endif

									<div class="cart-dropdown" style="margin-left:20px;">
										<div class="cart-list" id="ch-cl" style="padding-left:20px;">
											
											@if(!empty($yourcart) and count($yourcart) > 0  )
											
											@foreach ($yourcart as $i)
											<div class="product-widget">
												<div class="product-img">
													<img src="./img/product02.png" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="/product/{{$i->Product_Id}}">{{$i->pname}}</a></h3>
												<h4 class="product-price"><span class="qty">{{$i->Cart_Quantity}}x</span><span class="c_lbp" style="display:none;">LBP{{$i->Cart_Price * $i->Cart_Quantity *1500}}</span><span class="c_usd">${{$i->Cart_Price * $i->Cart_Quantity}}</span></h4>
											</div>
												<button class="delete" onclick= "location.href = '/delfromcart/{{$i->Cart_Id}}';"><i class="fa fa-close"></i></button>
											</div>
											@endforeach
											@else
											<div class="container">
												<h4>Cart is empty... </h4>
											</div>
												@endif
										</div>
										
											
											
										
										@isset($yourcart)		
										<div class="cart-summary">
											<small id="ch-count">{{count($yourcart)}} Item(s) selected</small>
											<h5 id="ch-total">SUBTOTAL:<span class="c_lbp" style="display:none;">LBP{{$totalprice *1500}}</span><span class="c_usd">${{$totalprice}}</span> </h5>
										</div>
										
										
										<div class="cart-btns">
											
											<a href="/">View Cart</a>
											
											@if (count($yourcart) > 0)	
											<a href="/checkout">Checkout<i class="fa fa-arrow-circle-right" ></a></i>		
											@else
										  	<a>Checkout<i class="fa fa-arrow-circle-right" ></i></a>
											@endif
											
										</div>
										@endisset
									</div>
								</div>	
									
								
									<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active_menu"><a href="/">Home</a></li>
						@if (Route::has('login'))
						@auth		
						<li class="active_menu"><a href="/profile">Profile</a></li>		
						@else 
						<li class="active_menu"><a href="{{route('login')}}">Profile</a></li>
						@endauth
						@endif
						<li class="active_menu"><a href="/stores">Stores</a></li>
						<!--<li class="active_menu"><a href="#">Category</a></li>-->
						@if (Route::has('login'))
						@auth		
						@if (auth::user()->dg == 1)
						<li class="active_menu"><a href="/myjob">MyJob</a></li>		
						@else
						<li class="active_menu"><a href="/delguy">Become a delivery guy </a></li>
						@endif
						@else 
						<li class="active_menu"><a href="{{route('login')}}">Become a delivery guy </a></li>
						@endauth
						@endif
						
						<li class="active_menu"><a href="#">Blog</a></li>
						<li class="active_menu"><a href="#">About</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

		
		<!-- SECTION -->
		<div class="section">
		@yield('content')	
		
		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							@auth
							@if (auth::user()->newsletters == 0)
							<p>Sign Up for the <strong>NEWSLETTER</strong></p>
							<form method="POST" action="/addtonews">
								{{ csrf_field() }}
								<input class="input" type="email" name="newsemail" placeholder="Enter Your Email">
								<button type="submit" name="submit" class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
							</form>								
							@else
							<p>Subscribed to <strong>NEWSLETTER</strong>
								<button name="unsubscribe" class="newsletter-btn primary-btn" onclick="location.href='/removefromnews'"><i class="fa fa-envelope" onclick="href.location='/removefromnews'"></i> UnSubscribe</button>
							</p>
							@endif
							@endauth
							@guest
							<p>Login Or Register to Subscribe to <strong>NEWSLETTER</strong></p>
							@endguest

							@isset($aanswer)
								@auth
								@if (auth::user()->newsletter == 1)
								<script>alert("Subscribed!")</script>	
								@else
								@endif
								@endauth
								@endisset

								@isset($ranswer)
								@auth
								@if (auth::user()->newsletter == 0)
								<script>alert("UnSubscribed!")</script>	
								@else
								@endif
								@endauth
								@endisset
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">About Us</h3>
								<p>Website made by the master degree of digitalization in computer science Hussein Mehdi</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>1700 Nabatieh Zawtar Charkieh</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+96171416551</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>mhdi.hsen@gmail.com</a></li>
								</ul>
							</div>
						</div>

						<!--<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categories</h3>
								<ul class="footer-links">
									<li><a href="#">Hot deals</a></li>
									<li><a href="#">Laptops</a></li>
									<li><a href="#">Smartphones</a></li>
									<li><a href="#">Cameras</a></li>
									<li><a href="#">Accessories</a></li>
								</ul>
							</div>
						</div>-->

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Information</h3>
								<ul class="footer-links">
									<li><a href="#">About Us</a></li>
									<li><a href="#">Contact Us</a></li>
									<li><a href="#">Privacy Policy</a></li>
									<li><a href="#">Orders and Returns</a></li>
									<li><a href="#">Terms & Conditions</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Service</h3>
								<ul class="footer-links">
									<li><a href="#">My Account</a></li>
									<li><a href="#">View Cart</a></li>
									<li><a href="#">Wishlist</a></li>
									<li><a href="#">Track My Order</a></li>
									<li><a href="#">Help</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->


<!-- The Modal -->
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" 
class="close" title="Close Modal">&times;</span>

  <!-- Modal Content -->
  <form class="modal-content animate" action="/action_page.php">
    <div class="container" >
			
						Size
						<select class="input-select">
							<option value="0">X</option>
						</select>
				<div class="input-number">
							Qty
							<input type="number" style="width:1em;">
							<span class="qty-up">+</span>
							<span class="qty-down">-</span>
						</div>
						<button class="add-to-cart-btna primary-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
					</div>
		
	</div>
  </form>
</div>
		












		<!-- jQuery Plugins -->
		<script src="{{asset('js/jquery.min.js')}}"></script>
		<script src="{{asset('js/bootstrap.min.js')}}"></script>
		<script src="{{asset('js/slick.min.js')}}"></script>
		<script src="{{asset('js/nouislider.min.js')}}"></script>
		<script src="{{asset('js/jquery.zoom.min.js')}}"></script>
		<script src="{{asset('js/main.js')}}"></script>
		<script src="{{asset('js/ajax.js')}}"></script>
		<script>
				// Get the modal
				var modal = document.getElementById('id01');
				
				// When the user clicks anywhere outside of the modal, close it
				window.onclick = function(event) {
				  if (event.target == modal) {
					modal.style.display = "none";
				  }
				}
				</script>
		

	</body>
</html>
