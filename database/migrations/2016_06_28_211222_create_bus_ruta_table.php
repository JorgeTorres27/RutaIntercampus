<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusRutaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('bus_ruta', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('bus_id')->unsigned();
            $table->foreign('bus_id')->references('id')->on('bus')->onDelete('cascade');
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
        Schema::drop('bus_ruta');
    }
}
