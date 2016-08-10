<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrecioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('precio', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('valor');
            $table->integer('ruta_id')->unsigned();
            $table->foreign('ruta_id')->references('id')->on('ruta');
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
        Schema::drop('precio');
    }
}
