<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipocliente extends Model
{
    
    // Nombre de la tabla
    protected $table = 'tipocliente';
    
    // Llave primaria
    protected  $primarykey = 'id';
    
     //Campos de mi identidad tipocliente
     protected $fillable = [
        'id', 'nombre', 'fecha',
        
    ];
    
}
