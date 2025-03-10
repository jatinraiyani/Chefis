<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChefDetails extends Model
{
    protected $table = "chef_details";

    protected $fillable = ['chef_id','year_of_experience','resturant_name','specialities','about_chef','is_hyginic_course','hyginic_course'];
}
