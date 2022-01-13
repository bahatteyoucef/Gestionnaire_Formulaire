<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentBoutteillesVerresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('vent_boutteilles_verres', function (Blueprint $table) {
            $table->increments('id_vt');
            $table->integer('id_pos');
            $table->string('marque_bt');
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
        Schema::dropIfExists('vent_boutteilles_verres');
    }
}
