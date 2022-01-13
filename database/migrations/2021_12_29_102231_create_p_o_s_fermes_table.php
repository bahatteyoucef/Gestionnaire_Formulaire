<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePOSFermesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('pos_fermes', function (Blueprint $table) {
            $table->increments('id_pos_ferme');
            
            $table->integer('id_secteur');
            $table->integer('id_enquetteur');
            $table->integer('id_type_pos');

            $table->string('point_repere_pos_ferme');
            $table->float('longitude_pos_ferme');
            $table->float('latitude_pos_ferme');
            $table->integer('id_motif_fermeture');
            $table->string('date_fermeture_pos_ferme');

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
        Schema::dropIfExists('p_o_s_fermes');
    }
}
