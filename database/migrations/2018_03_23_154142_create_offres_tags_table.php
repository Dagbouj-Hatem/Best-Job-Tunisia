<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffresTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offres_tags', function (Blueprint $table) {
            $table->increments('id');//les clés étrangeres
            $table->integer('offres_id')->unsigned()->nullable()->index();
            $table->integer('tags_id')->unsigned()->nullable()->index();

            $table->timestamps();
        });
        // lié les clés étrangères
         Schema::table('offres_tags', function (Blueprint $table) {
                
                // offre foreign key 
                $table->foreign('offres_id')
                ->references('id')->on('offres')->onDelete('cascade');
                // Tags foreign key 
                $table->foreign('tags_id')
                ->references('id')->on('tags')->onDelete('cascade'); 
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offres_tags');
    }
}
