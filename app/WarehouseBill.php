<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarehouseBill extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
        'create_date',
        'warehouse_id'
    ];
}
