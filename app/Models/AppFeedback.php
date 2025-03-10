<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppFeedback extends Model
{
    protected $table = "app_feedback";

    protected $fillable = ['name','email','subject','message'];
}
