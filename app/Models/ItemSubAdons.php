<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemSubAdons extends Model
{
    protected $table = "item_sum_adons";

    protected $fillable = ['item_id','adons_id','name','price','status'];
}
