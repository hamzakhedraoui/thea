<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterventionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interventions', function (Blueprint $table) {
            $table->id();
            $table->integer('id_employe')->nullable();
            $table->integer('id_client');
            $table->integer('id_service');
            $table->integer('duree')->nullable();
            $table->string('descreption');
            $table->string('date_debut')->nullable();
            $table->string('date_fin')->nullable();
            $table->string('accepted')->default('non'); //no for no , oui for accepted
            $table->string('feneshed')->default('non'); //no for no , oui for accepted
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
        Schema::dropIfExists('interventions');
    }
}
