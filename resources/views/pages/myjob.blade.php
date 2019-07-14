@extends('layouts.template')
@section('content')
    <div class="container" style="margin-bottom:50px;">
        <h2>
        <img src="{{asset(auth::user()->img)}}" height="100" width="120" style="border-radius:50%; border:solid; max-width:100px; margin-right:20px; margin-left:20px;" alt="">
        <span style="font-size:60%;"> My Balance : <span class="c_lbp" style="display:none;">LBP {{$mygain * 1500}}</span><span class="c_usd">${{$mygain}}</span></span>
        </h2>
    </div>
    <div class="container">
    <table class="table">
        <thead>
            <tr class="row"><td class="col"><h2>Stats:</h2></td></tr>
        </thead>
        <tbody>
        <tr class="row"><td class="col">Delivery made today: {{count($myjobd)}}</td><td></td></tr>
            <tr class="row"><td class="col">Delivery made this month: {{count($myjobm)}}</td><td></td></tr>
            <tr class="row"><td class="col">Rating:</td><td></td></tr>
            
        </tbody>
    </table>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <td><h3>Available Missions:</h3></td>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
        
         

    </div>
@endsection