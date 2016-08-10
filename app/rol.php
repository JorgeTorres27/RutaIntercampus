<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rol extends Model
{
    // Nombre de la tabla
    protected $table = 'rol';
    
    // Llave primaria
    protected  $primarykey = 'id';
    
     //Campos de mi identidad rol
     protected $fillable = [
        'id', 'nombre', 'descripcion', 'permisos',
        
    ];
     
     //Muchos roles pueden tener muchos usuarios
    public function usuarios(){
        
        return $this->belongsToMany(usuario::class);
    }
    
}
