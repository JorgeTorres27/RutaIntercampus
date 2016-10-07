<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class precio extends Model
{

    // Nombre de la tabla
    protected $table = 'precio';
    
    // Llave primaria
    protected  $primarykey = 'id';

    // Campos de mi identidad
    
     protected $fillable = [
        'valor', 'ruta_id',
        
    ];
     
     //Una ruta tiene un precio asignado
     
    public function rutas(){
        
        return $this->belongsTo(ruta::class);
        
    }


    public static function precios($id){
        return precio::where('ruta_id','=',$id)
        ->get();
    }
   
}
