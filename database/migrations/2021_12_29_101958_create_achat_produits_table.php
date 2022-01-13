<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchatProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('achat_produits', function (Blueprint $table) {
            $table->increments('id_produit');
            $table->integer('id_pos');
            $table->integer('id_type_produit');
            $table->string('marque_produit');
            $table->float('prix_produit');
            $table->integer('qte_achat_produit');
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
        Schema::dropIfExists('achat_produits');
    }
}
