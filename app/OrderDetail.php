<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
        'amount',
        'product_id',
        'orders_id'
    ];

    public function orders()
    {
        return $this->belongsTo('App\Order');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
