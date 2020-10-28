<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public $timestamps = false;

    protected $fillable = [
        'name',
        'preservation',
        'ingredient',
        'description',
    ];
    protected $casts = [
        'createdDate' => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetail');
    }

    public function wareHouseBillDetails()
    {
        return $this->hasMany('App\WarehouseBillDetail');
    }
}
