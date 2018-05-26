<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OffresTags extends Model
{
     // les champs public  
   	protected $fillable = [
        'id' ,'offres_id','tags_id',
    ];
}
