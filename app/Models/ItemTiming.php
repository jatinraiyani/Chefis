<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemTiming extends Model
{
    protected $table = "item_timing";

    protected $fillable = ['item_id','day','open','close','status','qty','delivered_day','delivered_time'];
}
