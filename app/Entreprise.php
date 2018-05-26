<?php

namespace App;

use App\Notifications\EntrepriseResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Entreprise extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name', 'email', 'password','adresse','tele','fax','photo','description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new EntrepriseResetPassword($token));
    }


     public function offres()
    {
        return $this->hasMany('App\offres');
    } 


        public function formations()
    {
        return $this->hasMany('App\Formations');
    }
}
