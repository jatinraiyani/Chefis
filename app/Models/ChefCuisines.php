<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChefCuisines extends Model
{
    protected $table = "chef_cuisines";

    protected $fillable = ['user_id','cuisine_id'];

    public function CuisinesData(){
        return $this->belongsTo('App\Models\Cuisines','cuisine_id');
    }
}
