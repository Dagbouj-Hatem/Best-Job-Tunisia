<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    // les champs public  
   	protected $fillable = [
        'id' ,'nom',
    ];
    
     public function offres()
    {
        return $this->belongsToMany('App\offres');
    }

     public function formations()
    {
        return $this->belongsToMany('App\Formations');
    }
}
