<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class recorrido extends Model
{
    // Nombre de la tabla
    protected $table = 'recorrido';
    
    // Llave primaria
    protected  $primarykey = 'id';

    //Campos de mi identidad recorrido
    
     protected $fillable = [
        'nombre', 'hora_salida', 'lugar_salida',
         'hora_llegada','lugar_llegada','descripcion', 'fecha',
        
    ];
     
     //Un recorrido puede tener muchas rutas asignadas.
     public function rutas(){
        
        return $this->belongsToMany(ruta::class);
        
    }

    
}
