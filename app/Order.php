<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
        'create_date',
        'status',
        'user_id'
    ];
}
