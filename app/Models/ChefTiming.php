<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChefTiming extends Model
{
    protected $table = "chef_timings";

    protected $fillable = ['chef_id','day','first_open','first_close','second_open','second_close'];
}
