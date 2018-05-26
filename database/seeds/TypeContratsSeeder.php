<?php

use Illuminate\Database\Seeder;

class TypeContratsSeeder extends Seeder
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
        if(DB::table('types_contrats')->get()->count() == 0)
        {
        	DB::table('types_contrats')->insert([
         	['nom' => 'CDI',],
         	['nom' => 'Full-time',],
         	['nom' => 'SIVP',],
         	['nom' => 'Stage/Apprentissage',],
         	['nom' => 'CDD',],
         	['nom' => 'Stage',],
         	['nom' => 'CDD/Interim/Mission',],
         	['nom' => 'Indépendant/Freelance',],
         	['nom' => 'Temps Partiel',], 
         	]);
        }
        else 
        { echo "\e[31m le table types_contrats n'est pas vide !\n"; }

    }
}
