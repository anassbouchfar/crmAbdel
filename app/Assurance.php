<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assurance extends Model
{
    //
    protected $table='assurances';
    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}

