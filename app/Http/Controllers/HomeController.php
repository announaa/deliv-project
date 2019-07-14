<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\supplier;
use product;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        
        $yourcart = null;
        $totalprice = null;

        if(Auth::check()){
            
            //$yourcart  = cart::where('User_Id' , Auth::user()->id)->get();
            $yourcart = DB::table('products')->join('cart' , 'cart.Product_Id' , 'products.Product_Id')->select('products.Product_Name as pname','cart.*')->where('User_Id' , auth::user()->id)->get();
            
            $totalprice = DB::table('cart')
            ->select(DB::raw('sum( Cart_price * Cart_quantity ) as allprice'))
            ->where('User_Id' , Auth::user()->id)->first()->allprice;

        }

        $data2 = supplier::where('adv' , 1)->get();
        
        $data1 = DB::table('products')
            ->join('categories', 'categories.Category_Id', '=', 'products.category_id')
            ->select('products.*', 'categories.Category_Name as cname')
            ->orderBy('Sold_Per_Week','DESC')
            ->limit(7)
            ->get();
        
        $data = DB::table('products')
            ->join('categories', 'categories.Category_Id', '=', 'products.category_id')
            ->select('products.*', 'categories.Category_Name as cname')
            ->where('ISNew', 1 )
            ->get();
        
            
            return view('pages.index')
            ->with('products',$data)
            ->with('data1', $data1)
            ->with('data2', $data2)
            ->with('yourcart', $yourcart)
            ->with('totalprice', $totalprice);
        
    }
}
