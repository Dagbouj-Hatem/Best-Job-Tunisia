<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
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
        if(DB::table('categories')->get()->count() == 0)
        {
        	DB::table('categories')->insert([
         	['nom' => 'Technologies de L\'information',],
         	['nom' => 'Centre d\'appels',],
         	['nom' => 'Développement web & applis',],
         	['nom' => 'Ingénierie',],
         	['nom' => 'Marketing, Vente et Service',],
         	['nom' => 'Digital Marketing',],
         	['nom' => 'Communication - Design',],
         	['nom' => 'Designer',],
         	['nom' => 'Relation Client',],
         	['nom' => 'Gestion',], 
         	]);
        }
        else 
        { echo "\e[31m le table categories n'est pas vide !\n"; }
    }
}
