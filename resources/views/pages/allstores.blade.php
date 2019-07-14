@extends('layouts.template')

@section('content')
<div class="container">
@foreach ($stores as $i)

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
</div>
@endsection