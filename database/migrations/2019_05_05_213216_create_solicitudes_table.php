<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pasajero_id')->nullable();
            $table->foreign('pasajero_id')->references('id')->on('users');
            $table->unsignedInteger('conductor_id')->nullable();
            $table->foreign('conductor_id')->references('id')->on('users');
            $table->string('destino')->nullable();
            $table->string('distancia')->nullable();
            $table->string('tiempo_viaje')->nullable();
            $table->string('tiempo_recogida')->nullable();
            $table->string('procesada')->nullable();
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
        Schema::dropIfExists('solicitudes');
    }
}
