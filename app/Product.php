<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public $timestamps=false;
    protected $fillable = [
        'name',
        'price',
        'status',
        'preservation',
        'ingredient',
        'instructional',
        'mass',
        'description',
        'saleOff'
    ];
}
