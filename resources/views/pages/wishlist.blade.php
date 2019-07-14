@extends('layouts.template')
@section('content')

<div class="container">
        <div class="row">
                <div class="col-md-12">
                
        <!--<h2 style="margin:20px;">My Orders</h2>-->
        @php    
        $counter = /*($orders->currentPage() - 1) * 7*/0;
        @endphp
        @foreach ($wish as $the_wish)
        <div class="panel panel-default" style="margin-left:20px; margin-right:20px;">
                <div class="panel-body">
                        <span style="background-color:#D10024;border-radius:50%;color:white;">{{"  -  ".(++$counter)."  -  "}}</span><ul class="list-group">
                    <!--                                       -->
                    <li class="list-group-item">
                        <span class="badge" onclick="location.href ='/removefromwish/{{$the_wish->id_wishitem}}'; " style="cursor:pointer;">Remove</span>
                        {{$the_wish->pname}} | 
                    </li>
                    <!--                                       -->
                </ul>
                <div class='row pull-left'><b>
                &nbsp; &nbsp; Date:</b> <i></i></div>
                    <div class='row pull-right'><b>
                        </b><!--<i>comment</i>--></div>
                    </div>
                    <div class="panel-footer">
                        <strong><span class="c_lbp" style="display:none;">LBP{{$the_wish->Product_Unit_Price *1500}}</span><span class="c_usd">${{$the_wish->Product_Unit_Price}}</span></strong> 
                        <br>
                            
                        </div>
                    </div>
                    @endforeach
                <!--<div style="float:right; margin:15px;">/*$orders->links()*/</div>-->
                </div>
            </div>
        </div>
</div>
    
@endsection