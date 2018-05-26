<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offres extends Model
{
    /**
     * les attributs de Model Offres
     *
     * @var array
     */
    protected $fillable = [
        'id','nom', 'date', 'datefin', 'description','salaire','niv_etude','exigence','experiance',
        'entreprise_id','location_id' , 'categorie_id' ,'type_contrat_id', 

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
     public function type_contrat()
    {
        return $this->belongsTo('App\typesContrat');
    }
     public function tags()
    {
        return $this->belongsToMany('App\Tags');
    }


     
    
}
