<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\store;
use App\customer;
use App\delguy;
use App\supplier;
use App\user;
use App\wishlist;
use App\cart;
use App\order;
use App\category;
use Auth;
use DB;



class PagesController extends Controller
{


/*    public function __construct()
    {
        $this->middleware('auth');
    }*/


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


        $data3 = category::get();

        $data2 = supplier::where('adv' , 1)->get();
        
        $data1 = DB::table('products')
            ->join('categories', 'categories.Category_Id', '=', 'products.category_id')
            ->select('products.*', 'categories.Category_Name as cname')
            ->orderBy('Sold_Per_Week','DESC')
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
            ->with('category', $data3)
            ->with('yourcart', $yourcart)
            ->with('totalprice', $totalprice);
        
    }

    public function product($id){

        $yourcart = null;
        $totalprice = null;

        if(Auth::check()){
            
            //$yourcart  = cart::where('User_Id' , Auth::user()->id)->get();
            $yourcart = DB::table('products')->join('cart' , 'cart.Product_Id' , 'products.Product_Id')->select('products.product_name as pname','cart.*')->where('User_Id' , auth::user()->id)->get();

            $totalprice = DB::table('cart')
            ->select(DB::raw('sum( Cart_Price * Cart_quantity ) as allprice'))
            ->where('User_Id' , Auth::user()->id)->first()->allprice;

        }


            $maindata = product::where('Product_Id' , $id)->first();
            $pname = product::where('Product_Id' , $id)->first()->Product_Name;
            return view('pages.product')
                    ->with('product' , $maindata)
                    ->with('proname', $pname)
                    ->with('yourcart', $yourcart)
                    ->with('totalprice', $totalprice);

    }

    public function store($id){
    
        $yourcart = null;
        $totalprice = null;

        if(Auth::check()){
            
            //$yourcart  = cart::where('User_Id' , Auth::user()->id)->get();
            $yourcart = DB::table('products')->join('cart' , 'cart.Product_Id' , 'products.Product_Id')->select('products.product_name as pname','cart.*')->where('User_Id' , auth::user()->id)->get();

            $totalprice = DB::table('cart')
            ->select(DB::raw('sum( Cart_Price * Cart_quantity ) as allprice'))
            ->where('User_Id' , Auth::user()->id)->first()->allprice;

        }

        
        $sup = supplier::where('Suppliers_Id' , $id)->first();
       
        $data = product::where('Suppliers_Id' , $id)->get();
        $data1 = product::join('categories' , 'products.Category_Id' , 'categories.Category_Id')->select('Category_Name')->where('Suppliers_Id' , $id)->distinct()->get();
        $data2 = product::select('brand')->where('Suppliers_Id' , $id)->distinct()->get();

        

        $snum = DB::table('products')
        ->select(DB::raw('count(Product_Id) as cid'))->where('Suppliers_Id' , supplier::where('Suppliers_Id' , $id)->get()->first()->Suppliers_Id)->first()->cid;

        return view('pages.store')
                ->with('store' , $sup)
                ->with('products',$data)
                ->with('cats',$data1)
                ->with('brands',$data2)
                ->with('yourcart', $yourcart)
                ->with('totalprice', $totalprice)
                ->with('storesnumber' , $snum);
    }

    public function checkout(){
    
        $yourcart = null;
        $totalprice = null;

        if(Auth::check()){
            
            //$yourcarts  = cart::where('User_Id' , Auth::user()->id)->get();
            $yourcart = DB::table('products')->join('cart' , 'cart.Product_Id' , 'products.Product_Id')->select('products.product_name as pname','cart.*')->where('User_Id' , auth::user()->id)->get();
            
            $totalprice = DB::table('cart')
            ->select(DB::raw('sum( Cart_Price * Cart_quantity ) as allprice'))
            ->where('User_Id' , Auth::user()->id)->first()->allprice;

        }
        return view('pages.checkout')->with('yourcart' , $yourcart)->with('totalprice' , $totalprice)/*->with('yourcarts' , $yourcarts)*/;
    }

 
    public function profile()
    {
        $yourcart = null;
        $totalprice = null;

        if(Auth::check()){
            
            //$yourcart  = cart::where('User_Id' , Auth::user()->id)->get();
            $yourcart = DB::table('products')->join('cart' , 'cart.Product_Id' , 'products.Product_Id')->select('products.product_name as pname','cart.*')->where('User_Id' , auth::user()->id)->get();

            $totalprice = DB::table('cart')
            ->select(DB::raw('sum( Cart_Price * Cart_quantity ) as allprice'))
            ->where('User_Id' , Auth::user()->id)->first()->allprice;

        

         $orders =  DB::table('order_details')
                    ->join('Products' , 'Products.Product_Id' , 'order_details.Product_Id')
                    ->join('orders' , 'orders.order_Id' , 'order_details.Order_Id')
                    ->select('orders.Order_Confirmed','orders.Customer_Id','order_details.*','products.Product_Name as pname')
                    ->where('Customer_Id', Auth::user()->id)/*->simplepaginate(7)*/->get();

        $data = user::where('id' , Auth::check())->get();
        
        return view('pages.profile')->with('info' , Auth::check())->with('yourcart' , $yourcart)->with('totalprice' , $totalprice)->with('orders' , $orders);

    }
}


    
    public function currency()
    {
        return $_SERVER['REQUEST_URI'];

    }

     public function allstores()
    {
        $s = supplier::get();
        $yourcart = null;
        $totalprice = null;

        if(Auth::check()){
            
            //$yourcart  = cart::where('User_Id' , Auth::user()->id)->get();
            $yourcart = DB::table('products')->join('cart' , 'cart.Product_Id' , 'products.Product_Id')->select('products.product_name as pname','cart.*')->where('User_Id' , auth::user()->id)->get();

            $totalprice = DB::table('cart')
            ->select(DB::raw('sum( Cart_Price * Cart_quantity ) as allprice'))
            ->where('User_Id' , Auth::user()->id)->first()->allprice;
        }

        return view('pages.allstores')
        ->with('yourcart', $yourcart)
        ->with('totalprice', $totalprice)
        ->with('stores',$s);
    }


    public function delfromcart($id)
    {
        
        DB::table('cart')->where('Cart_Id',$id)->delete();
        return back();
    }

    public function addtocart(request $r)
    {
        if(auth::check()){        
        $tocart_id = empty(cart::whereRaw('Cart_Id = (select max(Cart_Id) from cart)')->first()->Cart_Id)?  1000: cart::whereRaw('Cart_Id = (select max(Cart_Id) from cart)')->first()->Cart_Id + 1 ; 
            cart::create([
            'Cart_Id' => $tocart_id ,
            'User_Id' => auth::user()->id ,
            'Product_Id' => $r->id  ,
            'Cart_Quantity' => 1,
            'Cart_Price' => 23
             ]);
            }
            else route('login');
    }

    public function updateviewcart()
    {
        if(Auth::check()){
            
         //$yourcart  = cart::where('User_Id' , Auth::user()->id)->get();
         $yourcart = DB::table('products')->join('cart' , 'cart.Product_Id' , 'products.Product_Id')
            ->select('products.Product_Name as pname','cart.*')
            ->where('User_Id' , auth::user()->id)->get();
        
         $totalprice = DB::table('cart')
            ->select(DB::raw('sum( Cart_price * Cart_quantity ) as allprice'))
            ->where('User_Id' , Auth::user()->id)->first()->allprice;
            
            return view('refresh.dropdowncart')->with('yourcart', $yourcart)
                         ->with('totalprice', $totalprice);
        }
        else route('login');
    }

    public function placeorder()
    {
        //$yourcart  = cart::where('User_Id' , Auth::user()->id)->get();
        $yourcart = DB::table('products')->join('cart' , 'cart.Product_Id' , 'products.Product_Id')->select('products.product_name','cart.*')->where('User_Id' , auth::user()->id)->get();


        
        for ($i=0; $i < count($yourcart) ; $i++) { 
            
            $Order_Id = empty(order::whereRaw('Order_Id = (select IFNULL(max(Order_Id) , 1000) from orders)')->first()->Order_Id)?  1000: order::whereRaw('Order_Id = (select max(Order_Id) from orders)')->first()->Order_Id + 1 ;
            $toDel[$i] = $yourcart[$i]->Cart_Id; 

            DB::table('orders')->insert([
                'order_id' => $Order_Id ,
                'Customer_Id' => Auth::user()->id ,
                'Payment_method_Id' => 1,
                'Order_date' => date("Y-m-d"),
                'Shipping_date' => date("Y-m-d"),
                'Ship_Name' => Auth::user()->name,
                'Ship_address' => 'User_Address',
                'Ship_city' => 'user_city',
                'Ship_state' => 'user_state',
                'Ship_postal_code' => 1700,
                'Ship_country' => 'lebanon',
                'order_Confirmed' => 0
            ]);
            
            DB::table('order_details')->insert([
                
                'Order_Id' => $Order_Id ,
                'Product_Id' => $yourcart[$i]->Product_Id ,
                'Order_Quantity' => $yourcart[$i]->Cart_Quantity ,
                'Order_Price' => $yourcart[$i]->Cart_Price ,
                'Order_Total' => $yourcart[$i]->Cart_Quantity * $yourcart[$i]->Cart_Price
                 ]);
                
                DB::table('order_delivery')->insert([
                    
                    'Order_Id' => $Order_Id ,
                    'Order_Date' => date("Y-m-d h:i:s") ,
                    'Delivery_Status_Id' => 11 
                    ]);
        }
        for ($i=0; $i < count($toDel)  ; $i++) { 
            $this->delfromcart($toDel[$i]);
        }

        return redirect('/');
    }

    public function delguy()
    {
        $yourcart = null;
        $totalprice = null;

        if(Auth::check()){
            
            //$yourcart  = cart::where('User_Id' , Auth::user()->id)->get();
            $yourcart = DB::table('products')->join('cart' , 'cart.Product_Id' , 'products.Product_Id')->select('products.product_name as pname','cart.*')->where('User_Id' , auth::user()->id)->get();

            $totalprice = DB::table('cart')
            ->select(DB::raw('sum( Cart_Price * Cart_quantity ) as allprice'))
            ->where('User_Id' , Auth::user()->id)->first()->allprice;
            return view('pages.delguy')->with('yourcart' , $yourcart)->with('totalprice' , $totalprice);

        }
        
    }

    public function postdelguy(request $data)
    {
            $id = empty(delguy::whereRaw('deliveryguy_id = (select max(DeliveryGuy_id) from deliveryguy)')->first()->DeliveryGuy_id)?  1000: delguy::whereRaw('deliveryguy_id = (select max(deliveryguy_id) from deliveryguy)')->first()->DeliveryGuy_id + 1 ; 
            $s_id = empty(DB::table('Deguy_Schedule')->whereRaw('Schedule_id = (select max(Schedule_id) from Deguy_Schedule)')->first()->Schedule_id)?  1000: DB::table('Deguy_Schedule')->whereRaw('Schedule_id = (select max(Schedule_id) from Deguy_Schedule)')->first()->Schedule_id + 1 ; 
            
                        DB::table('Deguy_Schedule')->insert([
                            'Schedule_id' => $s_id ,
                            'mondate' =>    ($data['monday'] == "on")? $data['monfrom'] ."##". $data['monto'] : null ,
                            'tuesdate' =>   ($data['tuesday'] == "on")? $data['tuesfrom'] ."##". $data['tuesto'] : null ,
                            'wednesdate' => ($data['wednesday'] == "on")? $data['wednesfrom'] ."##". $data['wednesto'] : null,
                            'thursdate' =>  ($data['thursday'] == "on")? $data['thursfrom'] ."##". $data['thursto'] : null,
                            'fridate' =>    ($data['friday'] == "on")? $data['frifrom'] ."##". $data['frito'] : null,
                            'saturdate' =>  ($data['saturday'] == "on")? $data['saturfrom'] ."##". $data['saturto'] : null,
                            'sundate' =>    ($data['sunday'] == "on")? $data['sunfrom'] ."##". $data['sunto'] : null
                        ]);

            delguy::create([
                'DeliveryGuy_id' => $id ,
                'user_id' => auth::user()->id ,
                'Deguy_Schedule_id' => $s_id,
                'vehicle_type' => $data['vehicle'],
                'date_of_start' => $data['startdate']
                ]);
                user::where('id',auth::user()->id)->update(['dg' => 1]);
                $record = 'your application has been sent';
                return view('pages.index')->with('record',$record);
    }

    public function change_pp()
    {
        move_uploaded_file($_FILES["change_pp"]["tmp_name"], './img/uploads/'. auth::user()->id ."--img");
        return 1;
    }

    public function myjobs()
    {
        $yourcart = null;
        $totalprice = null;

        if(Auth::check()){
            
            //$yourcart  = cart::where('User_Id' , Auth::user()->id)->get();
            $yourcart = DB::table('products')->join('cart' , 'cart.Product_Id' , 'products.Product_Id')->select('products.product_name as pname','cart.*')->where('User_Id' , auth::user()->id)->get();

            $totalprice = DB::table('cart')
            ->select(DB::raw('sum( Cart_Price * Cart_quantity ) as allprice'))
            ->where('User_Id' , Auth::user()->id)->first()->allprice;
        }

        return view('pages.myjob')
        ->with('yourcart', $yourcart)
        ->with('totalprice', $totalprice);
    }
    public function searchresult(request $r)
    {
        $yourcart = null;
        $totalprice = null;

        if(Auth::check()){
            
            //$yourcart  = cart::where('User_Id' , Auth::user()->id)->get();
            $yourcart = DB::table('products')->join('cart' , 'cart.Product_Id' , 'products.Product_Id')->select('products.product_name as pname','cart.*')->where('User_Id' , auth::user()->id)->get();

            $totalprice = DB::table('cart')
            ->select(DB::raw('sum( Cart_Price * Cart_quantity ) as allprice'))
            ->where('User_Id' , Auth::user()->id)->first()->allprice;
        }


        $sp = explode(" " , $_GET['tex']);
        $d1 = array();
        $d2 = array();

        if($_GET['cat-select'] == 0)
        {
        for ($i=0; $i < count($sp) ; $i++) { 

            $a1 = supplier::where('Company_Name','LIKE', '%'.$sp[$i].'%' )->get();
            array_push($d1,$a1);
            $a2 = product::where('Product_Name','LIKE', '%'.$sp[$i].'%' )->get();
            array_push($d2,$a2);
        }
        return view('pages.searchresult')
        ->with('yourcart', $yourcart)
        ->with('totalprice', $totalprice)
        ->with('sup',$d1)
        ->with('prods',$d2);

    }
    else
    if($_GET['cat-select'] == 1)
    {
        for ($i=0; $i < count($sp) ; $i++) { 

            $a2 = product::where('Product_Name','like', '%'.$sp[$i].'%' )->get();
            array_push($d2,$a2);
        }
        return view('pages.searchresult')
        ->with('yourcart', $yourcart)
        ->with('totalprice', $totalprice)
        ->with('prods',$d2);

    }
    else
    if($_GET['cat-select'] == 2)
    {
        for ($i=0; $i < count($sp) ; $i++) { 

            $a1 = supplier::where('Company_Name','like', '%'.$sp[$i].'%' )->get();
            array_push($d1,$a1);
        }
        return view('pages.searchresult')
        ->with('yourcart', $yourcart)
        ->with('totalprice', $totalprice)
        ->with('sup',$d1);

    }
        
    }

    public function change_pass()
    {
        $chanswer = null;
        if( bcrypt($_POST['cpass']) != auth::user()->password)
        return back()->with($chanswer , "current password is wrong" );
        else
        if($_POST['npass'] != $_POST['cnpass'])
        return back()->with($chanswer , "confirmed password does not match the new one" );
        else
        user::where('id', auth::user()->id)->update(['password'=> bcrypt($_POST['cnpass'])]);
        return back()->with($chanswer , "succesfully changed" );
    }

    public function wishlist()
    {
        $yourcart = null;
        $totalprice = null;

        if(Auth::check()){
            
            //$yourcart  = cart::where('User_Id' , Auth::user()->id)->get();
            $yourcart = DB::table('products')->join('cart' , 'cart.Product_Id' , 'products.Product_Id')->select('products.product_name as pname','cart.*')->where('User_Id' , auth::user()->id)->get();

            $totalprice = DB::table('cart')
            ->select(DB::raw('sum( Cart_Price * Cart_quantity ) as allprice'))
            ->where('User_Id' , Auth::user()->id)->first()->allprice;

        

         $wish =  DB::table('wishlist')
                    ->join('Products' , 'Products.Product_Id' , 'wishlist.product_id')
                    ->select('Products.*','products.Product_Name as pname' , 'id_wishitem')
                    ->where('user_id', Auth::user()->id)/*->simplepaginate(7)*/->get();

        $data = user::where('id' , Auth::check())->get();
        
        return view('pages.wishlist')->with('info' , Auth::check())->with('yourcart' , $yourcart)->with('totalprice' , $totalprice)->with('wish' , $wish);
    }
}

public function addtowish()
{

    $w_id = empty(DB::table('wishlist')->whereRaw('id_wishitem = (select max(id_wishitem) from wishlist)')->first()->id_wishitem)?  1000: DB::table('wishlist')->whereRaw('id_wishitem = (select max(id_wishitem) from wishlist)')->first()->id_wishitem + 1 ; 

    DB::table('wishlist')->insert([
        'id_wishitem'=> $w_id ,
        'user_id'=> auth::user()->id ,
        'product_id'=> $_POST['pid']
    ]);

}

public function myjob()
{
    $yourcart = null;
        $totalprice = null;

        if(Auth::check()){
            
            //$yourcart  = cart::where('User_Id' , Auth::user()->id)->get();
            $yourcart = DB::table('products')->join('cart' , 'cart.Product_Id' , 'products.Product_Id')->select('products.product_name as pname','cart.*')->where('User_Id' , auth::user()->id)->get();

            $totalprice = DB::table('cart')
            ->select(DB::raw('sum( Cart_Price * Cart_quantity ) as allprice'))
            ->where('User_Id' , Auth::user()->id)->first()->allprice;

        

         $myjobm =  DB::table('myjob')->whereraw('MONTH(daydate) = '.date('m'))->where('idu' , auth::user()->id)->get();
         $myjobd =  DB::table('myjob')->whereraw('DAY(daydate) = '.date('d'))->where('idu' , auth::user()->id)->get();
         $mygain =  DB::table('myjob')->select(DB::raw('sum(gain) as gain'))->where('idu' , auth::user()->id)->first()->gain;


        
        return view('pages.myjob')->with('yourcart' , $yourcart)->with('totalprice' , $totalprice)->with('myjobd' , $myjobd)->with('myjobm' , $myjobm)->with('mygain' , $mygain);


}
}

public function addtonews()
{
    if(!empty(user::where('email', $_POST['newsemail'])))
    {
        user::where('id', auth::user()->id)->update(['newsletters' => 1]);
    return back()->with('aanswer', 1);
    }
        else
    return back()->with('aanswer', 2);
}

public function removefromnews()
{
        user::where('email', auth::user()->email)->update(['newsletters' => 0]);
    return back()->with('ranswer', 1);
}

public function removefromwish($id)
{
    DB::table('wishlist')->where('id_wishitem' , $id)->delete();
    return back();
}

public function removefromorders($id)
{
    DB::table('order_delivery')->where('Order_Id' , $id)->delete();
    DB::table('order_details')->where('Order_Id' , $id)->delete();
    DB::table('orders')->where('Order_Id' , $id)->delete();
    return back();
}

}