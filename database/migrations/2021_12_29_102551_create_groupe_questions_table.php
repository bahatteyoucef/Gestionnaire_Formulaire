<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupeQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('groupe_questions', function (Blueprint $table) {
            $table->increments('id_grp_qst');
            $table->integer('id_formulaire');
            $table->text('description_grp_qst');
            $table->string('nom_grp_qst');
            $table->integer('order_grp_qst');
            $table->integer('etat_grp_qst');
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
        Schema::dropIfExists('groupe_questions');
    }
}
