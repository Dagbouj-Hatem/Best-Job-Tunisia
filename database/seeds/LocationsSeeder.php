<?php

use Illuminate\Database\Seeder;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // remplir la BD par les régions de Tunisie 

        // verifiaction de la table est vide 
        if(DB::table('locations')->get()->count() == 0)
        {
        	DB::table('locations')->insert([
         	['nom' => 'Ariana',],
         	['nom' => 'Béja',],
         	['nom' => 'Ben Arous',],
         	['nom' => 'Bizerte',],
         	['nom' => 'Gabès',],
         	['nom' => 'Gafsa',],
         	['nom' => 'Jendouba',],
         	['nom' => 'Kairouan',],
         	['nom' => 'Kasserine',],
         	['nom' => 'Kébili',],
         	['nom' => 'Le Kef',],
         	['nom' => 'Mahdia',],
         	['nom' => 'La Manouba',],
         	['nom' => 'Médenine',],
         	['nom' => 'Monastir',],
         	['nom' => 'Nabeul',],
         	['nom' => 'Sfax',],
         	['nom' => 'Sidi Bouzid',],
         	['nom' => 'Siliana',],
         	['nom' => 'Sousse',],
         	['nom' => 'Tataouine',],
         	['nom' => 'Tozeur',],
         	['nom' => 'Tunis',],
         	['nom' => 'Zaghouan',],
         	]);
        }
        else 
        { echo "\e[31m le table Locations n'est pas vide !\n"; }
    }
}
