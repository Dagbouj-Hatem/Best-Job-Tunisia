<?php

use Illuminate\Database\Seeder;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // remplir la BD   
        // verifiaction de la table est vide 
        if(DB::table('admins')->get()->count() == 0)
        {
        	DB::table('admins')->insert([
            [
            'name' => 'Ghaith',
            'prenom' => 'BETTAIB',
            'email' => 'ghaith.bettaib@gmail.com',
            'password' =>  bcrypt('password1'), 
            ], 
            [
            'name' => 'ali',
            'prenom' => 'BETTAIB',
            'email' => 'ali.bettaib@gmail.com',
            'password' =>  bcrypt('password2'), 
            ],
            [
            'name' => 'Ahmed',
            'prenom' => 'BETTAIB',
            'email' => 'ahmed.bettaib@gmail.com',
            'password' =>  bcrypt('password3'), 
            ],

            ]);
        }
        else 
        { echo "\e[31m le table admins n'est pas vide !\n"; }
    }
}
