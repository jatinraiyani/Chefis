<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['name','email','email_verified_at','phone_number','address','zipcode','lat','lang','profile_img','status',
    'is_agree','is_notification','is_password_change','device_id','device_token','device_type','customer_id','password','account_no','bank_name'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function adminusers()
    {
        return static::leftjoin('role_user', 'role_user.user_id', '=', 'users.id')
            ->where('role_user.role_id',1);
    }

    public static function chefusers()
    {
        return static::leftjoin('role_user', 'role_user.user_id', '=', 'users.id')
            ->leftJoin('chef_details','chef_details.chef_id','=','users.id')
            ->where('role_user.role_id',3)
            ->select('users.*','role_user.role_id','role_user.user_id','chef_details.year_of_experience','chef_details.resturant_name','chef_details.specialities','chef_details.about_chef','chef_details.is_hyginic_course','chef_details.hyginic_course');
    }

    public static function users()
    {
        return static::leftjoin('role_user', 'role_user.user_id', '=', 'users.id')
            ->where('role_user.role_id',2);
    }
    public static function driverusers()
    {
        return static::leftjoin('role_user', 'role_user.user_id', '=', 'users.id')
            ->where('role_user.role_id',4);
    }

    public function chefDetails(){
        return $this->HasMany('App\Models\ChefDetails','chef_id');
    }

    public function rating_data()
    {
        return $this->hasMany('App\Models\ChefRating', 'chef_id');
    }
    public function rating_datas()
    {
        return $this->hasMany('App\Models\ChefRating', 'user_id');
    }
}
