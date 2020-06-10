<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
