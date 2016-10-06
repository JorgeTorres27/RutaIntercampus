<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiqueteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tiquete', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('codigocomprador');
            $table->integer('ruta_id')->unsigned();
            $table->foreign('ruta_id')->references('id')->on('ruta');
            $table->integer('recorrido_id')->unsigned(); 
            $table->foreign('recorrido_id')->references('id')->on('recorrido');
            $table->string('fecha');
            $table->integer('cupos')->default(40);
            $table->integer('bus_id')->unsigned();
            $table->foreign('bus_id')->references('id')->on('bus');
            $table->integer('precio_id')->unsigned();
            $table->foreign('precio_id')->references('id')->on('precio');
            $table->integer('puntoventa_id')->unsigned();
            $table->foreign('puntoventa_id')->references('id')->on('puntoventa');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::drop('tiquete');
    }
}
