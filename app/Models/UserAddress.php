<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $table ="user_addresses";

    protected $fillable = ['user_id','name','address','landmark','type','address2','city','zipcode','contact_no','lat','lon'];
}
