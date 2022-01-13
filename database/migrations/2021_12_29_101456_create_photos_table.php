<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->increments('id_photo');
            $table->integer('id_backoffice_photo');
            $table->integer('id_pos');
            $table->integer('libelle_photo');
            $table->integer('url_photo');
            $table->integer('etat_photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos');
    }
}
