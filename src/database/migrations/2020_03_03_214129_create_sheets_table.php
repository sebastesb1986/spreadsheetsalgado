<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sheets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('NombreInstructor')->nullable();
            $table->string('ApellidoInstructor')->nullable();
            $table->string('EstadoInstructor')->nullable();
            $table->string('Competencia')->nullable();
            $table->longText('FechaInicioProgramacion')->nullable();
            $table->longText('FechaFinProgramacion')->nullable();
            $table->longText('HorasProgramadas')->nullable();
            $table->string('codigoFicha')->nullable();

            // Relationship with sheetHeader table
            $table->bigInteger('sheetheader_id')->unsigned()->nullable();
            $table->foreign('sheetheader_id')->references('id')->on('sheetheaders');
            
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
        Schema::dropIfExists('sheets');
    }
}
