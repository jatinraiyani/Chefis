<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promocode extends Model
{
  protected $table = "promocode";

  protected $fillable = ['name','description','value','time_per_user','start_date','end_date','status'];
}
