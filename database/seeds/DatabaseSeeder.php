<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // appel à tous les seeders Class
        $this->call([LocationsSeeder::class ,  
        			 TagsSeeder::class, 
                     CategoriesSeeder::class,
                     TypeContratsSeeder::class,

                     EntreprisesSeeder::class,
                     UsersSeeder::class,
                     AdminsSeeder::class,

                     OffresSeeder::class,
                     formationsSeeder::class,

        			]); 
    }
}
