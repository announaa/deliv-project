<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = ['Order_Id', 'Customer_Id','payment_method_Id','order_date', 'shipping_date' , 'ship_name'  , 'ship_address' , 'ship_city' , 'ship_state',
    'ship_postal_code' , 'ship_country' , 'Order_Confirmed' ];
    
    public $timestamps = false;
 }
