<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    protected $table = 'cart';
    protected $fillable = ['Cart_Id' , 'User_Id' , 'Product_Id' , 'Cart_Quantity' , 'Cart_Price'];
    public $timestamps = false;
}
