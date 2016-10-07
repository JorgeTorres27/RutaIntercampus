<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecorridoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('recorrido', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('ruta_id')->unsigned();
            $table->foreign('ruta_id')->references('id')->on('ruta');
            $table->string('nombre'); 
            $table->time('hora_salida');
            $table->string('lugar_salida');
            $table->time('hora_llegada');
            $table->string('lugar_llegada');
            $table->string('descripcion'); 
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
        //
        Schema::drop('recorrido');
    }
}
