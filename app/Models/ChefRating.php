<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChefRating extends Model
{
    protected $table = "chef_ratings";

    protected $fillable = ['user_id','chef_id','rating_start','chef_review'];


    public function chefData(){
        return $this->belongsTo('App\User','chef_id');
    }

    public function UserData(){
        return $this->belongsTo('App\User','user_id');
    }
}
