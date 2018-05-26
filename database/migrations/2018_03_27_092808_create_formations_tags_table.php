<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormationsTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations_tags', function (Blueprint $table) {
            $table->increments('id');
            //les clés étrangeres
            $table->integer('formations_id')->unsigned()->nullable()->index();
            $table->integer('tags_id')->unsigned()->nullable()->index();

            $table->timestamps();
        });
        // lié les clés étrangères
         Schema::table('formations_tags', function (Blueprint $table) {
                
                // offre foreign key 
                $table->foreign('formations_id')
                ->references('id')->on('formations')
                ->onDelete('restrict')->onDelete('restrict');
                // Tags foreign key 
                $table->foreign('tags_id')
                ->references('id')->on('tags')
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
        Schema::dropIfExists('formations_tags');
    }
}
