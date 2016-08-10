<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ruta extends Model
{
        
    // Nombre de la tabla
    protected $table = 'ruta';
    

    // Campos de mi identidad
    
     protected $fillable = [
     'nombre',
        
    ];
     
     
     //Una ruta puede tener muchos recorridos
     
    public function recorridos(){
        
        return $this->belongsToMany(recorrido::class);
        
    }
    
    
    //Muchas rutas pueden tener muchos buses asignados
    public function buses(){
        
        return $this->belongsToMany(bus::class);
    }
    

    public function precios(){
        
        return $this->hasOne(precio::class);
    }

    
    
}
