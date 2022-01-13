<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePLVInterieursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('plv_interieurs', function (Blueprint $table) {
            $table->increments('id_plv_int');
            $table->integer('id_pos');
            $table->integer('id_photo');
            $table->string('libelle_plv_int');
            $table->string('marque_plv_int');
            $table->integer('nombre_plv_int');
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
        Schema::dropIfExists('p_l_v_interieurs');
    }
}
