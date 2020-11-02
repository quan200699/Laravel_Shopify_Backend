<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarehouseBill extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
        'warehouse_id',
        'create_date'
    ];
    protected $casts = [
        'create_date' => 'datetime',
    ];

    public function warehouse()
    {
        return $this->belongsTo('App\Warehouse');
    }

    public function wareHouseBillDetails()
    {
        return $this->hasMany('App\WarehouseBillDetail');
    }
}
