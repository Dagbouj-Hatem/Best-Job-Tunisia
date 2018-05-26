<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->date('date');
            $table->longText('description');
            $table->string('prix'); 
            $table->string('photo');

            //les clés étrangeres
            $table->integer('entreprise_id')->unsigned()->index();
            $table->integer('location_id')->unsigned()->index();
            $table->integer('categorie_id')->unsigned()->index(); 


            $table->timestamps();
        });
        // lié les clés étrangères
         Schema::table('formations', function (Blueprint $table) {
                
                // locations foreign key 
                $table->foreign('location_id')
                ->references('id')->on('locations')
                ->onDelete('restrict')->onDelete('restrict');
                // catégories foreign key 
                $table->foreign('categorie_id')
                ->references('id')->on('categories')
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
        Schema::dropIfExists('formations');
    }
}
