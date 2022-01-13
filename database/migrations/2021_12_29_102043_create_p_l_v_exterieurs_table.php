<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePLVExterieursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plv_exterieurs', function (Blueprint $table) {
            $table->increments('id_plv_ext');
            $table->integer('id_pos');
            $table->integer('id_photo');
            $table->string('libelle_plv_ext');
            $table->string('marque_plv_ext');
            $table->integer('nombre_plv_ext');
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
        Schema::dropIfExists('p_l_v_exterieurs');
    }
}
