<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    //
    public $timestamps = false;
    protected $fillable = ['message',
        'create_date',
        'status',
        'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
