<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuisines extends Model
{
    protected $table ="cuisines";

    protected $fillable = ['cuisine_name','cuisine_image','status'];

}
