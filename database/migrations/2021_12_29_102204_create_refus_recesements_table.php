<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefusRecesementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('refus_recesements', function (Blueprint $table) {
            $table->increments('id_refus_recesement');
            $table->integer('id_pos');
            $table->string('raison_refus');
            $table->string('autre_raison_refus');
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
        Schema::dropIfExists('refus_recesements');
    }
}
