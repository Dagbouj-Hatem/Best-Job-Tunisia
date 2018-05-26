<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class OffresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
               // remplir la BD par les offres de Tunisie 

        // verifiaction de la table est vide 
       /* if(DB::table('offres')->get()->count() == 0)
        {
            $faker = Faker\Factory::create();

            // faker laravel offres 
            foreach (range(1,20) as $index) {
            DB::table('offres')->insert([ 
            'nom' =>  $faker->realText(rand(10,20)),
            'date' => $faker->date($format = 'Y-m-d', $max = 'now') ,
            'datefin' => $faker->date($format = 'Y-m-d', $max = 'now') ,
            'description' => $faker->realText(rand(10,20)),
            'salaire' =>  $faker->realText($faker->number_format(2000)),
            'niv_etude'=>  'Bac',
            'exigence'=>  $faker->realText(rand(10,20)),                   
            'experiance'  =>  $faker->realText(rand(10,20)),
                ]);
        } //end foreach
        }
        else 
        { echo "\e[31m le table offres n'est pas vide !\n"; } */
    }
}
