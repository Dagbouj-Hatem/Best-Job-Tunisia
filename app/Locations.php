<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    // les champs public  
   	protected $fillable = [
        'id' ,'nom',
    ];

     public function offres()
    {
        return $this->hasMany('App\offres');
    }


    public function formations()
    {
        return $this->hasMany('App\Formations');
    }
}
