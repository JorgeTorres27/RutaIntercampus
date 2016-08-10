<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecorridoRutaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('recorrido_ruta', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('recorrido_id')->unsigned();
            $table->foreign('recorrido_id')->references('id')->on('recorrido')->onDelete('cascade');
            $table->integer('ruta_id')->unsigned();
            $table->foreign('ruta_id')->references('id')->on('ruta')->onDelete('cascade');
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
        Schema::drop('recorrido_ruta');
    }
}
