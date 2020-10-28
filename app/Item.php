<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    public $timestamps = false;
    protected $fillable = ['quantity'];

    public function shoppingCart()
    {
        return $this->belongsTo('App\ShoppingCart');
    }
}
