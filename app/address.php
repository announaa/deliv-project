<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    
    protected $fillable  = ['Address_Id' , 'Address_line1' , 'Address_line2', 'Address_City' , 'Address_State' , 'Address_PostalCode','Address_Country']; 
    
    public $timestamps = false;
}
