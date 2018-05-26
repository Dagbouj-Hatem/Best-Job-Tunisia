<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formations extends Model
{
    // les champs public  
    protected $fillable = [
        'id','nom', 'date', 'description','prix','photo',
        'entreprise_id','location_id' , 'categorie_id' ,

    ];

     public function categorie()
    {
        return $this->belongsTo('App\categories');
    }
    public function entreprise()
    {
        return $this->belongsTo('App\entreprise');
    }
     public function location()
    {
        return $this->belongsTo('App\locations');
    } 
     public function tags()
    {
        return $this->belongsToMany('App\Tags');
    }
}
