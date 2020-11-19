<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Factures', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('num_dossier');
            $table->string('nom_client');
            $table->string('adresse');
            $table->string('commune');
            $table->string('surface');
            $table->string('nature_projet');
            $table->string('montant_ht');
            $table->string('tva');
            $table->string('montant_ttc');
            $table->string('date');
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
        Schema::dropIfExists('Factures');
    }
}
