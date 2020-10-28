<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
        'address',
        'name'
    ];

    public function wareHouseBills()
    {
        return $this->hasMany('App\WarehouseBill');
    }
}
