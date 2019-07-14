@extends('layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>
            @if(Auth::check())
            <span id="imgpadding">
            <img src="{{asset(auth::user()->img)}}" height="100" width="120" style="border-radius:50%; border:solid; max-width:100px; margin-right:20px; margin-left:20px;" alt="">
            </span>
            <span id="namepadding" style="font-size:60%;">  
             @php
             echo strtoupper(Auth::user()->name.' '.Auth::user()->lname);
             @endphp
            </span> 
            </h1>
            @endif
            <hr>
            <div class="container">
            @if (auth::user()->dg == 1)
            <input type="button" class="primary-btn" style = "margin: 10px; width:23em;" value="MyJob" onclick="location.href = '/myjob'">
            @else
            <input type="button" class="primary-btn" style = "margin: 10px; width:23em;" value="become a Delivery Guy" onclick="location.href = '/delguy'">    
            @endif
            <br>
            <input type="file" name="change_pp" id="changepic_action" style="display:none;">
            <input type="button" class="primary-btn" style = "margin: 10px;width:23em;" value="Change Password" onclick="document.getElementById('chpass').style.display='block'">

            <!-------------------------------------------------------------->
            <!-- The Modal -->
<div id="chpass" class="modal">
        <span onclick="document.getElementById('chpass').style.display='none'" 
      class="close" title="Close Modal">&times;</span>
      
        <!-- Modal Content -->
        <form class="modal-content animate" name="changep" action="/change_pass" method="POST">
            @csrf
            <div class="container" style="margin:10%;margin-left:0%;">
                    <span><h2> Change your password: </h2></span><hr>
                  <div class="product-options">
                          <label style="padding-left:10%;display:block;">
                              Current Password:  
                              <input type="password" class="input" name="cpass" id="cpass" >
                          </label>
                          <label style="padding-left:10%;display:block;">
                              New Password: 
                              <input type="password" class="input" name="npass" id="npass">
                          </label>
                          <label style="padding-left:10%;display:block;">
                                  Confirm Password: 
                                  <input type="password" class="input" name="cnpass" id="cnpass">
                                </label>
                                <button type="submit" style="margin-left:10%;" class="primary-btn" name="change pass" id="chpassb">Submit</button> 
                            </div>
                          </div>
        </form>
        @isset($chanswer)
         <script>alert("yes")</script>
        @endisset
        <script>
				// Get the modal
				var modal2 = document.getElementById('chpass');
				
				// When the user clicks anywhere outside of the modal, close it
				window.onclick = function(event) {
				  if (event.target == modal2) {
					modal2.style.display = "none";
				  }
				}
				</script>
      </div>
      <!-------------------------------------------------------------->
            <br>
            <input type="button" class="primary-btn" style ="margin: 10px; width:23em;" value="Change your profile picture" name="changepic" id="changepic">
    </div>


                        <!-- Product tab -->
					<div class="col-md-12">
                            <div id="product-tab">
                                <!-- product tab nav -->
                                <ul class="tab-nav">
                                    <li class="active"><a data-toggle="tab" href="#tab1">My pending Orders</a></li>
                                    <li><a data-toggle="tab" href="#tab2">My confirmed Orders</a></li>
                                </ul>
                                <!-- /product tab nav -->

                        <!-- product tab content -->
							<div class="tab-content">
                                    <!-- tab1  -->
                                    <div id="tab1" class="tab-pane fade in active">
                                        <div class="row">
                                            <div class="col-md-12">
                                            
                                    <!--<h2 style="margin:20px;">My Orders</h2>-->
                                    @php    
                                    $counter = /*($orders->currentPage() - 1) * 7*/0;
                                    @endphp
                                    @foreach ($orders as $order)
                                        @if ($order->Order_Confirmed==0)
                                    <div class="panel panel-default" style="margin-left:20px; margin-right:20px;">
                                            <div class="panel-body">
                                                    <span style="background-color:#D10024;border-radius:50%;color:white;">{{"  -  ".(++$counter)."  -  "}}</span><ul class="list-group">
                                                <!--                                       -->
                                                <li class="list-group-item">
                                                <span class="badge" onclick="location.href ='/removefromorders/{{$order->Order_Id}}'; " style="cursor:pointer;">Cancel Order</span>
                                                    {{$order->pname}} | {{$order->Order_Quantity}} pieces
                                                </li>
                                                <!--                                       -->
                                            </ul>
                                            <div class='row pull-left'><b>
                                            &nbsp; &nbsp; Date:</b> <i></i></div>
                                                <div class='row pull-right'><b>
                                                    </b><!--<i>comment</i>--></div>
                                                </div>
                                                <div class="panel-footer">
                                                    <strong><span class="c_lbp" style="display:none;">LBP{{$order->Order_Price *1500}}</span><span class="c_usd">${{$order->Order_Price}}</span></strong> 
                                                    <div class='pull-right'><i>
                                                        Your order status is Pending</i></div><br>
                                                        
                                                    </div>
                                                </div>
                                                @endif
                                                @endforeach
                                            <!--<div style="float:right; margin:15px;">/*$orders->links()*/</div>-->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /tab1  -->
    
                                    <!-- tab2  -->
                                    <div id="tab2" class="tab-pane fade in">
                                        <div class="row">
                                            <div class="col-md-12">
                                                

                                                    @php    
                                                    $counter = /*($orders->currentPage() - 1) * 7*/0;
                                                    @endphp
                                                    @foreach ($orders as $order)
                                                    @if ($order->Order_Confirmed==1)
                                                    
                                                    <div class="panel panel-default" style="margin-left:20px; margin-right:20px;">
                                                            <div class="panel-body">
                                                                <span style="background-color:#D10024;border-radius:50%;color:white;">{{"  -  ".(++$counter)."  -  "}}</span><ul class="list-group">
                                                                    <!--                                       -->
                                                                <li class="list-group-item">
                                                                    <span class="badge" onclick="location.href ='#'; " style="cursor:pointer;">Cancel Order</span>
                                                                    {{$order->pname}} | {{$order->Order_Quantity}} pieces
                                                                </li>
                                                                <!--                                       -->
                                                            </ul>
                                                            <div class='row pull-left'><b>
                                                                &nbsp; &nbsp; Date:</b> <i>{{$i = date('r')}}</i></div>
                                                                <div class='row pull-right'><b>
                                                                </b><!--<i>comment</i>--></div>
                                                            </div>
                                                            <div class="panel-footer">
                                                                <strong>{{$order->Order_Total}}$</strong> 
                                                                <div class='pull-right'><i>
                                                                    Your order status is Confirmed </i></div><br>
                                                                    
                                                                </div>
                                                            </div>
                                                            @endif
                                                            @endforeach
                                                        <!--<div style="float:right; margin:15px;">/*$orders->links()*/</div>-->
                                                            
                                                            
                                                            
                
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /tab2  -->
                                </div>
                                <!-- /product tab content  -->
                            </div>
                        </div>
                        <!-- /product tab -->
        
        
        
        
        
        
                                                               
                        <!--<div style="margin-right:20px; margin-left:20px;">Print your receipt.
                        <a class="pull-right" href="javascript:window.print()"><img src="{{ URL::to('src/radius/images/print.jpg') }}" alt="print this page" id="print-button" /></a> </div>-->   
        </div>
    </div>

@endsection