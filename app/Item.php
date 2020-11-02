<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    public $timestamps = false;
    protected $fillable = ['quantity',
        'product_id',
        'shopping_cart_id'];

    public function shoppingCart()
    {
        return $this->belongsTo('App\ShoppingCart');
    }
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
