<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    protected $table ="order_items";

    protected $fillable = ['order_id','chef_id','item_id','item_name','item_price','item_qty','item_suggetion','adons','adons_price','adons_name'];

    public function chefData(){
        return $this->belongsTo('App\User','chef_id');
    }

    public function itemData(){
        return $this->belongsTo('App\Models\Item','item_id');
    }
    public function order(){
        return $this->belongsTo('App\Models\Order');
    }

}
