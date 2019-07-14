@extends('layouts.template')
@section('content')
    
<div class="container" >
    @isset($sup)
    @if (!empty($sup))
    
    <h2>Stores: </h2>
    
    <!-- shop -->
    @foreach ($sup as $sub)
    @foreach ($sub as $i)
    
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
    
    <!-- /shop -->
    @endforeach
    @endforeach
    @endif
    @endisset
</div>
<div class="container">
    @isset($prods)
        
    @if(count($prods)>0)
    <h2>Products: </h2>
    <div class="col-md-12">
        <div class="row">
            <div class="products-tabs">
                <!-- tab -->
                <div id="tab1" class="tab-pane active">
                    <div class="products-slick" data-nav="#slick-nav-1">

                        
                        @foreach ($prods as $sub)
                        @foreach ($sub as $i)
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
                            @endforeach
                        </div>
                        <div id="slick-nav-1" class="products-slick-nav"></div>
                    </div>
                    <!-- /tab -->
                </div>
            </div>
        </div>
        @endif
        @endisset
    </div>
    @endsection