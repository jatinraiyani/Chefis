<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCard extends Model
{
  protected $table ="user_card";

  protected $fillable = ['user_id','ref_id','card_number','expiry_date','card_type','save_status','fingerprint'];
}
