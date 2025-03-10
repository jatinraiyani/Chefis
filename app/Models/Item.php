<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = "items";

    protected $fillable = ['chef_id','category_id','item_name','item_description','item_price','item_image','item_preparation_time'
        ,'status','item_qty','remaining_item','repeat_item'];

    public function chefData(){
        return $this->belongsTo('App\User','chef_id');
    }

    public function categoryData(){
        return $this->belongsTo('App\Models\Category','category_id');
    }

    
}
