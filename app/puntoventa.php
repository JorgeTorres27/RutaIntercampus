<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class puntoventa extends Model
{
    //
    // Nombre de la tabla
    protected $table = 'puntoventa';
    
    // Llave primaria
    protected  $primarykey = 'id';
    
     //Campos de mi identidad puntosventas.
     protected $fillable = [
        'id', 'campus',
        
    ];
    
}
