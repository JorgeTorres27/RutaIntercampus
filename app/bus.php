<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bus extends Model
{
    
    // Nombre de la tabla
    protected $table = 'bus';
    
      //Campos de mi identidad buses
    
     protected $fillable = [
        'placa', 'capacidad', 'empresa','ruta_id',
        
    ];
     
     
     //Muchos buses pueden tener muchas rutas asignadas
    public function rutas(){
        
        return $this->belongsTo(ruta::class);
        
    }

    public static function buses($id){
        return bus::where('ruta_id','=',$id)->get();
    }

}
