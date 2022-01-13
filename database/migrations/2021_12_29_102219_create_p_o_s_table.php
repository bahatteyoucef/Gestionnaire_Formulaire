<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePOSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('pos', function (Blueprint $table) {
            $table->increments('id_pos');

            $table->integer('id_secteur');
            $table->integer('id_enquetteur');
            $table->integer('id_backoffice_modif');
            $table->integer('id_backoffice_image');
            $table->integer('id_type_pos');
            $table->integer('id_src_achat');
            $table->integer('id_zone_achalendage');
            $table->integer('id_jr_vst');
            $table->integer('id_refus_recesement');

            $table->string('libelle_pos');
            $table->float('nom_gerant');
            $table->float('nom_proprietaire_pos');
            $table->string('num_proprietaire_pos');
            $table->float('latitude_pos');
            $table->float('longitude_pos');
            $table->float('superficie_pos');
            $table->string('point_repere_pos');
            $table->integer('nombre_facade_pos');
            $table->integer('caisse_enrg_pos');
            $table->integer('frequence_achat_pos');
            $table->integer('classification_pos');
            $table->integer('stock_chaud_boisson_pos');
            $table->integer('etat_POS');
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
        Schema::dropIfExists('p_o_s');
    }
}
