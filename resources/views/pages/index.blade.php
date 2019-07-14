@extends('layouts.template')

	@section('content')

	<div class="container">
	</div>

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			
			<div class="container">
					<h3 class="title">TOP RATED STORES</h3>
				<!-- row -->
				<div class="row">
					<!-- shop -->
					@foreach ($data2 as $i)
						
					<div class="col-md-4 col-xs-6" >
						<div class="shop">
							<div class="shop-img">
							<img src="./img/{{$i->img}}" alt="">
							</div>
							<div class="shop-body">
							<h3>{{$i->Company_Name}}<br>{{$i->Contact_Name}}</h3>
									<a href="store/{{$i->Suppliers_id}}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
								</div>
							</div>
						</div>

						@endforeach
						<!-- /shop -->

						
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->


		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Top Selling</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									@foreach ($category as $item)
								<li><a class="cat-a" id="{{$item->Category_Id}}" data-toggle="tab" href="#tab1">{{$item->Category_Name}}</a></li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										@foreach ($data1 as $i)
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="./img/product01.png" alt="" onclick="location.href='/product/{{$i->Product_Id}}';" >
												<div class="product-label">
													<span class="sale">-30%</span>
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
											<p class="product-category">{{$i->cname}}</p>
											<h3 class="product-name"><a href="/product/{{$i->Product_Id}}">{{$i->Product_Name}}</a></h3>
											<h4 class="product-price"><span class="c_lbp" style="display:none;">LBP{{$i->Product_Unit_Price *1500}}</span><span class="c_usd">${{$i->Product_Unit_Price}}</span> <!--<del class="product-old-price">$</del>--></h4>
												<div class="product-rating">
													@for ($j = 0; $j < $i->rating ; $j++)
													<i class="fa fa-star"></i>
													@endfor
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist" id="{{$i->Product_Id}}" ><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare" onclick="document.getElementById('id01').style.display='block'"><i class="fa fa-exchange"></i><span class="tooltipp">quick buy</span></button>
													<button class="quick-view"><i class="fa fa-eye" onclick="location.href='/product/{{$i->Product_Id}}';" ></i><span class="tooltipp">view</span></button></a>
												</div>
											</div>
											<div class="add-to-cart">
												<button id="{{$i->Product_Id}}" class="add-to-cart-btn" onclick="document.getElementById('id01').style.display='block'"><i class="fa fa-shopping-cart" ></i> add to cart</button>
											</div>
										</div>
										<!-- /product -->

										

										@endforeach
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		

		
		<!-- HOT DEAL SECTION -->
		<div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3>02</h3>
										<span>Days</span>
									</div>
								</li>
								<li>
									<div>
										<h3>10</h3>
										<span>Hours</span>
									</div>
								</li>
								<li>
									<div>
										<h3>34</h3>
										<span>Mins</span>
									</div>
								</li>
								<li>
									<div>
										<h3>60</h3>
										<span>Secs</span>
									</div>
								</li>
							</ul>
							<h2 class="text-uppercase">hot deal this week</h2>
							<p>New Collection Up to 50% OFF</p>
							<a class="primary-btn cta-btn" href="#">Shop now</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->
		
		
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">New Products</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									@foreach ($category as $item)
								<li><a class="cat-a" id="{{$item->Category_Id}}" data-toggle="tab" href="#tab2">{{$item->Category_Name}}</a></li>
									@endforeach
									<!--<li><a data-toggle="tab" href="#tab2">Smartphones</a></li>
									<li><a data-toggle="tab" href="#tab2">Cameras</a></li>
									<li><a data-toggle="tab" href="#tab2">Accessories</a></li>-->
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">
										<!-- product -->
										  @if(count($products) > 0)
									        @foreach ($products as $i)
									<div class="product {{$i->Category_Id}}" >
											<div class="product-img">
												<img src="./img/product06.png" alt="" onclick="location.href='/product/{{$i->Product_Id}}';">
												@if ($i->IsNew == 1)
													
												<div class="product-label">
													<span class="sale">-30%</span>
													<span class="new">NEW</span>
												</div>

												@endif
											</div>
											<div class="product-body">
												<p class="product-category">{{$i->cname}}</p>
											<h3 class="product-name"><a href="#">{{$i->Product_Name}}</a></h3>
												<h4 class="product-price"><span class="c_lbp" style="display:none;">LBP{{$i->Product_Unit_Price *1500}}</span><span class="c_usd">${{$i->Product_Unit_Price}}</span><!--<del class="product-old-price">$</del>--></h4>
												<div class="product-rating">
														@for ($j = 0; $j < $i->rating ; $j++)
														<i class="fa fa-star"></i>
														@endfor
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist" id="{{$i->Product_Id}}"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view" onclick="location.href='/product/{{$i->Product_Id}}';" ><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
												</div>
											</div>
											<div class="add-to-cart">
											<button class="add-to-cart-btn" id="{{$i->Product_Id}}"><i class="fa fa-shopping-cart"></i> add to cart</button>
											</div>
										</div>
										<!-- /product -->
                                         @endforeach
										@else
										<p>No Products found......</p>
										@endif
									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		
		
		<!-- SECTION --1>
		<div class="section">
			<!-- container --1>
			<div class="container">
				<!-- row --1>
				<div class="row">
					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-3" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-3">
							<div>
								<!-- product widget --1>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product07.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget --1>

								<!-- product widget --1>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product08.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget --1>

								<!-- product widget --1>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product09.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- product widget --1>
							</div>

							<div>
								<!-- product widget --1>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product01.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget --1>

								<!-- product widget --1>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product02.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget --1>

								<!-- product widget --1>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product03.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- product widget --1>
							</div>
						</div>
					</div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-4" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-4">
							<div>
								<!-- product widget --1>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product04.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget --1>

								<!-- product widget --1>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product05.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget --1>

								<!-- product widget --1>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product06.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- product widget --1>
							</div>

							<div>
								<!-- product widget --1>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product07.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget --1>

								<!-- product widget --1>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product08.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget --1>

								<!-- product widget --1>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product09.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- product widget --1>
							</div>
						</div>
					</div>

					<div class="clearfix visible-sm visible-xs"></div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-5" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-5">
							<div>
								<!-- product widget --1>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product01.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget --1>

								<!-- product widget --1>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product02.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget --1>

								<!-- product widget --1>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product03.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- product widget --1>
							</div>

							<div>
								<!-- product widget --1>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product04.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget --1>

								<!-- product widget --1>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product05.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget --1>

								<!-- product widget --1>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product06.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- product widget --1>
							</div>
						</div>
					</div>

				</div>
				<!-- /row --1>
			</div>
			<!-- /container --1>
		</div>
		<!-- /SECTION -->
		@endsection
		