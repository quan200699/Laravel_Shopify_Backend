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
    public function wareHouseBill()
    {
        return $this->belongsTo('App\WarehouseBill');
    }
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
