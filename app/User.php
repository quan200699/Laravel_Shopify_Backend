<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    //
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullName', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'roles_users', 'user_id', 'role_id');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function customerInfos()
    {
        return $this->hasMany('App\CustomerInfo');
    }

    public function notifications()
    {
        return $this->hasMany('App\Notification');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function shoppingCart()
    {
        return $this->belongsTo('App\ShoppingCart');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
