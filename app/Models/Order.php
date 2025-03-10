<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";

    protected $fillable = ['user_id','chef_id','order_number','total_qty','order_subtotal','order_total','order_discount',
        'order_final_total','tax','address_id','order_suggetion','prodtype','schedule_date','schedule_time','order_status','order_cancel_reason',
        'transaction_id','payment_method','payment_status'];

    public function chefData(){
        return $this->belongsTo('App\User','chef_id');
    }

    public function UserData(){
        return $this->belongsTo('App\User','user_id');
    }

    public function paymentData(){
        return $this->belongsTo('App\Models\Payment','id');
    }

    public function orderItem(){
        return $this->hasMany('App\Models\OrderItems','order_id');
    }


}
