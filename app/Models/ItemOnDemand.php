<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemOnDemand extends Model
{
    protected $table = "item_on_demands";

    protected $fillable = ['item_id','day','first_open','first_close','second_open','second_close','first_qty',
        'second_qty','status'];
}
