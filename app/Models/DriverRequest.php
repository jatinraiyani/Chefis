<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DriverRequest extends Model
{
    protected $table = "driver_requests";

    protected $fillable = ['order_id','user_id','order_status','reason'];
}
