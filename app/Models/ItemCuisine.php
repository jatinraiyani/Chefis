<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemCuisine extends Model
{
    protected $table = "item_cuisines";

    protected $fillable = ['item_id','cuisine_id'];

    public function CuisineDatas(){
        return $this->belongsTo('App\Models\Cuisines','cuisine_id');
    }
}
