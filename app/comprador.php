<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comprador extends Model
{
    
     // Nombre de la tabla
    protected $table = 'comprador';
    
    // Llave primaria
    protected  $primarykey = 'id';


    //Campos de mi identidad usuarios
    
    protected $fillable = [
        'codigo', 'nombrecompleto',
        
    ];
    
    
    //Muchos usuarios pueden tener muchos roles
    
    public function tiquetes()
    {
        return $this->hasMany(tiquete::class);
    }
}
