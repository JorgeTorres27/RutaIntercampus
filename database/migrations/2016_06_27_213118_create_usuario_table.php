<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        
        Schema::create('usuario', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('nombre'); 
            $table->string('apellidos');
            $table->string('rol');
            $table->string('correo')->unique();
            $table->string('password');
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
        Schema::drop('usuario');
    }
}
