<!-- Cart -->
<div class="dropdown" id="dropdown-refresh" style="cursor:pointer;">
									
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

        <div class="cart-dropdown" >
            <div class="cart-list" id="ch-cl">
                
                @if(!empty($yourcart) and count($yourcart) > 0  )
                
                @foreach ($yourcart as $i)
                <div class="product-widget">
                    <div class="product-img">
                        <img src="./img/product02.png" alt="">
                    </div>
                    <div class="product-body">
                        <h3 class="product-name"><a href="/product/{{$i->Product_Id}}">{{$i->pname}}</a></h3>
                    <h4 class="product-price"><span class="qty">{{$i->Cart_Quantity}}x</span>${{$i->Cart_Price * $i->Cart_Quantity}}</h4>
                </div>
                    <button class="delete" onclick= "location.href = '/delfromcart/{{$i->Cart_Id}}';"><i class="fa fa-close"></i></button>
                </div>
                @endforeach
                @else
                <div>
                    <h4>Cart is empty... </h4>
                </div>
                @endif
                
            </div>
                

            @isset($yourcart)
                    
            <div class="cart-summary">
                <small id="ch-count">{{count($yourcart)}} Item(s) selected</small>
                <h5 id="ch-total">SUBTOTAL: $ {{$totalprice}} </h5>
            </div>
            
            
            <div class="cart-btns">
                <a href="/">View Cart</a>
                @if (count($yourcart) > 0)	
                <a href="/checkout">Checkout<i class="fa fa-arrow-circle-right" ></i></a>		
                @else
              <a>Checkout<i class="fa fa-arrow-circle-right" ></i></a>
                @endif
            </div>
        </div>
        @endisset
    </div>
        <!-- /Cart -->