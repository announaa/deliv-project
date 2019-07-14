<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class delguy extends Model
{
    protected $table = 'deliveryguy';
    protected $fillable = [ 'DeliveryGuy_id' , 'Deguy_Schedule_id' , 'user_id' , 'vehicle_type' , 'date_of_start' ];
    public $timestamps = false;
}
