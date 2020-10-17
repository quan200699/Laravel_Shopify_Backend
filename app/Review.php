<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    public $timestamps = false;
    protected $fillable = ['comment'];
    protected $casts = [
        'createDate' => 'datetime',
    ];
    public function product(){
        return $this->belongsTo('App\Product');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
