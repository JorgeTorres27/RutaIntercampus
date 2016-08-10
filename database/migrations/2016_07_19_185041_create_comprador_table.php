<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompradorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('comprador', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('codigo')->unique();
            $table->string('nombre'); 
            $table->string('apellidos');
            $table->string('tipo_doc');
            $table->integer('cedula')->unique();
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
        Schema::drop('comprador');
    }
}
