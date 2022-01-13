<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrigosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('frigos', function (Blueprint $table) {
            $table->increments('id_frigo');
            $table->integer('id_pos');
            $table->string('libelle_frigo_marque');
            $table->string('etat_frigo');
            $table->string('proprietaire_frigo');
            $table->string('model_frigo');
            $table->integer('alimentation_frigo');
            $table->string('code_bar_frigo');
            $table->string('date_attribution_frigo');
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
        Schema::dropIfExists('frigos');
    }
}
