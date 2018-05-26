<?php

use Illuminate\Database\Seeder;

class EntreprisesSeeder extends Seeder
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
        if(DB::table('entreprises')->get()->count() == 0)
        {
            $faker = Faker\Factory::create();

        	DB::table('entreprises')->insert([
         	[
            'name' => 'Ooredoo Tunisie',
            'email' => 'ooredoo@gmail.com',
            'password' =>  bcrypt('password'),
            'adresse' =>  'Adresse Ooredoo Tunisie' ,
            'tele' =>  $faker->phoneNumber,
            'fax'=>   $faker->phoneNumber,
            'description'=>  'Description Ooredoo tunisie ...' ,
            'photo' => '1522145808.jpg' ,
            ],

         	]);

            // faker laravel entreprises 
            foreach (range(1,20) as $index) {
                    DB::table('entreprises')->insert([ 
                    'name' =>  $faker->company,
                    'email' => $faker->email ,
                    'password' =>  bcrypt('password'),
                    'adresse' =>  $faker->address,
                    'tele' =>  $faker->phoneNumber,
                    'fax'=>   $faker->phoneNumber,
                    'description'=>  $faker->text ,                    
                    'photo'  =>  '1522145808.jpg' ,// $faker->image('public\\logo_entreprises',200, 200 ,'business',null ,false ),
                        ]);
             } //end foreach
        }
        else 
        { echo "\e[31m le table Entreprises n'est pas vide !\n"; }
    }
}
