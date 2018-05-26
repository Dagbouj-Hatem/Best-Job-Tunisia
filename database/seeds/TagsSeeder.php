<?php

use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // remplir la BD par les régions de Tunisie 
        
        // verifiaction de la table es tvide 
        if(DB::table('tags')->get()->count() == 0)
        {
        	DB::table('tags')->insert([
         	['nom' => 'Android',],
         	['nom' => 'Pl Sql',],
         	['nom' => 'HTML',],
         	['nom' => 'CSS',],
         	['nom' => 'Bootstrap',],
         	['nom' => 'React js',],
         	['nom' => 'Django',],
         	['nom' => 'Node js',],
         	['nom' => 'C#',],
         	['nom' => '.net',],
         	['nom' => 'Asp .net',],
         	['nom' => 'Jsp',],
         	['nom' => 'Php',],
         	['nom' => 'Laravel',],
         	['nom' => 'Angular js',],
         	['nom' => 'Français',],
         	['nom' => 'Anglais',],
         	['nom' => 'Java',],
         	['nom' => 'Java EE',],
         	['nom' => 'Sérieux',],
         	['nom' => 'Communication',],
         	['nom' => 'Dynamique',],
         	['nom' => 'Responsable',],
         	['nom' => 'Ponctuel',],
         	]);
        }
        else 
        { echo "\e[31m le table Tags n'est pas vide !\n"; }
    }
}
