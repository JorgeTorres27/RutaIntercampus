<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tiquete extends Model
{
    
    // Nombre de la tabla
    protected $table = 'tiquete';
    
    // Llave primaria
    protected  $primarykey = 'id';
    
     //Campos de mi identidad tiquete
     protected $fillable = [
        'ruta_id','recorrido_id','fecha','bus_id','precio_id','puntoventa_id','user_id','comprador_id',
        
    ];

    
}
