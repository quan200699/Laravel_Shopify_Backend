<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarehouseBill extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
        'warehouse_id'
    ];
    protected $casts = [
        'create_date' => 'datetime',
    ];
}
