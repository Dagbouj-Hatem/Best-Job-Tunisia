<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntreprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entreprises', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('adresse');
            $table->string('tele');
            $table->string('fax');
            $table->string('photo')->nullable(true);
            $table->longText('description');
            $table->rememberToken();
            $table->timestamps();
            
        });
        // lié les clés étrangères
         Schema::table('offres', function (Blueprint $table) {
                
                // locations foreign key 
                $table->foreign('entreprise_id')
                ->references('id')->on('entreprises')
                ->onDelete('restrict')->onDelete('restrict'); 
                
         }); 
         // lié les clés étrangères
         Schema::table('formations', function (Blueprint $table) {
                
                // locations foreign key 
                $table->foreign('entreprise_id')
                ->references('id')->on('entreprises')
                ->onDelete('restrict')->onDelete('restrict'); 
                
         }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('entreprises');
    }
}
