<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassementLivraisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('classement_livraisons', function (Blueprint $table) {
            $table->increments('id_classement_livraison');
            $table->integer('id_pos');
            $table->string('marque_livraison');
            $table->string('avis_livraison');
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
        Schema::dropIfExists('classement_livraisons');
    }
}
