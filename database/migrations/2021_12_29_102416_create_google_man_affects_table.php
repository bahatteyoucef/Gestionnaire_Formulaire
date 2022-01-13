<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoogleManAffectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('google_man_affects', function (Blueprint $table) {
            $table->increments('id_google_man_aff');
            $table->integer('id_google_man');
            $table->integer('id_enquetteur');
            $table->integer('id_secteur');
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
        Schema::dropIfExists('google_man_affects');
    }
}
