<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCartItem extends Model
{
    protected $table = 'user_cart_items';

    protected $fillable = ['cart_id','chef_id','item_id','item_name','item_price','item_qty'];
}
