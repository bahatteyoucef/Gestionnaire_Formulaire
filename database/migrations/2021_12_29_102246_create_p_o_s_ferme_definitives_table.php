<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePOSFermeDefinitivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pos_ferme_definitives', function (Blueprint $table) {
            $table->increments('id_pos_ferme_def');
            
            $table->integer('id_pos');
            $table->string('date_fermeture_pos_ferme_def');

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
        Schema::dropIfExists('p_o_s_ferme_definitives');
    }
}
