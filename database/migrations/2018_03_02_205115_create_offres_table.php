<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateOffresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->date('date');
            $table->date('datefin');
            $table->longText('description');
            $table->string('salaire');
            $table->string('niv_etude');
            $table->longText('exigence');
            $table->string('experiance');

            //les clés étrangeres
            $table->integer('entreprise_id')->unsigned()->nullable()->index();
            $table->integer('location_id')->unsigned()->nullable()->index();
            $table->integer('categorie_id')->unsigned()->nullable()->index();
            $table->integer('type_contrat_id')->unsigned()->nullable()->index(); 

            $table->timestamps();
        });

        // lié les clés étrangères
         Schema::table('offres', function (Blueprint $table) {
                
                // locations foreign key 
                $table->foreign('location_id')
                ->references('id')->on('locations')
                ->onDelete('restrict')->onDelete('restrict');
                // catégories foreign key 
                $table->foreign('categorie_id')
                ->references('id')->on('categories')
                ->onDelete('restrict')->onDelete('restrict');
                // types contrat foreign key 
                $table->foreign('type_contrat_id')
                ->references('id')->on('types_contrats')
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
        Schema::dropIfExists('offres');
    }
}
