<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormationsTags extends Model
{
     // les champs public  
   	protected $fillable = [
        'id' ,'formations_id','tags_id',
    ];
}
