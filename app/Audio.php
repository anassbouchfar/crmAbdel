<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    protected $fillable = [
        'client_id','audio'
    ];

    public function client(){
        return $this->belongsTo('App\Client');
    }
}
