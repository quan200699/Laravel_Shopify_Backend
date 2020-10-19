<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarehouseBillDetail extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
        'amount',
        'product_id',
        'ware_house_bill_id'
    ];
}
