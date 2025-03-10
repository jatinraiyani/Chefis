<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemAdons extends Model
{
    protected $table = "item_adons";

    protected $fillable = ['item_id','title','box_type','box_validation','status'];


    public function CuisineDatas(){
        return $this->hasMany('App\Models\ItemSubAdons','id');
    }
}
