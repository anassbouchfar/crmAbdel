<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $table='clients';
    public function assurance()
    {
        return $this->hasOne('App\Assurance');
    }
    public function comments()
    {
        return $this->hasMany('App\Commentaire');
    }

    public function audios(){
        return $this->hasMany('App\Audio');
    }
}
