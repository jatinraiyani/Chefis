<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = "payments";

    protected $fillable  = ['order_id','order_number','payment_type','payment_id','payment_status','amount'];
}
