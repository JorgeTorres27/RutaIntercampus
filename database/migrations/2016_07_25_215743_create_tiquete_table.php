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
            $table->integer('ruta_id')->unsigned();
            $table->foreign('ruta_id')->references('id')->on('ruta')->onDelete('cascade');
            $table->integer('recorrido_id')->unsigned(); 
            $table->foreign('recorrido_id')->references('id')->on('recorrido')->onDelete('cascade');
            $table->string('fecha');
            $table->integer('bus_id')->unsigned();
            $table->foreign('bus_id')->references('id')->on('bus')->onDelete('cascade');
            $table->integer('precio_id')->unsigned();
            $table->foreign('precio_id')->references('id')->on('precio')->onDelete('cascade');
            $table->integer('puntoventa_id')->unsigned();
            $table->foreign('puntoventa_id')->references('id')->on('puntoventa')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('comprador_id')->unsigned();
            $table->foreign('comprador_id')->references('id')->on('comprador')->onDelete('cascade');
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
