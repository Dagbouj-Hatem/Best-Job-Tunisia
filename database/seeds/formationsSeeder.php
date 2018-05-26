<?php

use Illuminate\Database\Seeder;

class formationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // remplir la BD par les formations de Tunisie 

        // verifiaction de la table est vide 
      /*  if(DB::table('formations')->get()->count() == 0)
        {
            $faker = Faker\Factory::create();

            // faker laravel formations 
            foreach (range(1,20) as $index) {
            DB::table('formations')->insert([ 
            'nom' =>  $faker->realText($maxNbChars = 10, $indexSize = 2),
            'date' => $faker->date ,
            'description' =>  $faker->text ,
            'prix' =>  $faker->number_format(500),
            'photo'=>  $faker->image('public\\logo_formations"',200, 200 ,'technics',null ,false ),,
                ]);
        } //end foreach
        }
        else 
        { echo "\e[31m le table formations n'est pas vide !\n"; } */
    }
}
