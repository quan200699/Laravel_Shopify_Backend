<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerInfo extends Model
{
    //
    public $timestamps = false;
    protected $fillable = ['name'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
