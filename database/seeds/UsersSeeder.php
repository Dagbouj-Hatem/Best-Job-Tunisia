<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        // verifiaction de la table est vide 
        if(DB::table('users')->get()->count() == 0)
        {
             $faker = Faker\Factory::create();
        	DB::table('users')->insert([
            [
            'name' => 'Ghaith',
            'prenom' => 'BETTAIB',
            'email' => 'ghaith.bettaib@gmail.com',
            'password' =>  bcrypt('password1'), 
            ], 
            ]);
             // faker laravel entreprises 
            foreach (range(1,20) as $index) {
            DB::table('users')->insert([ 
            'name' =>  $faker->firstNameMale ,
            'prenom' =>  $faker->lastName ,
            'email' => $faker->email ,
            'password' =>  bcrypt('password'),
            'cv' =>  'cv.pdf',
                ]);
        } //end foreach
        }
        else 
        { echo "\e[31m le table users n'est pas vide !\n"; }
    }
}
