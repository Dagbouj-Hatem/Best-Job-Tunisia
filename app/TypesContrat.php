<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypesContrat extends Model
{
     // les champs public  
   	protected $fillable = [
        'id' ,'nom',
    ];

     public function offres()
    {
        return $this->hasMany('App\offres');
    }
}
