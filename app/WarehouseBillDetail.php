<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarehouseBillDetail extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
        'amount'
    ];
}
