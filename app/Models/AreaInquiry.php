<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreaInquiry extends Model
{
  protected $table = "area_inquiry";

  protected $fillable = ['area_id','name','email'];
}
