<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSheetheadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sheetheaders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ficha');
            $table->string('nombrePrograma');
            $table->string('centro');
            $table->string('horasTotalesProgramadas');
            $table->string('horasTotalesEjecutadas');
            $table->string('horasTotalesPendientes');
            $table->string('fechaInicio');
            $table->string('fechaFin');
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
        Schema::dropIfExists('sheetheaders');
    }
}
