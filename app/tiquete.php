<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tiquete extends Model
{

    use SoftDeletes;
    
    // Nombre de la tabla
    protected $table = 'tiquete';
    
    // Llave primaria
    protected  $primarykey = 'id';
    
     //Campos de mi identidad tiquete
     protected $fillable = [
        'ruta_id','recorrido_id','fecha', 'fechaseleccionada', 'bus_id','precio_id','puntoventa_id','user_id','codigocomprador','cupos',
        
    ];

    protected $dates = ['deleted_at'];

     public function buses(){
        
        return $this->belongsTo(bus::class);
        
    }

     public function rutas(){
        
        return $this->belongsTo(ruta::class);
        
    }

     public function precios(){
        
        return $this->belongsTo(precio::class);
        
    }

     public function puntosventas(){
        
        return $this->belongsTo(puntoventa::class);
        
    }

     public function recorridos(){
        
        return $this->belongsTo(recorrido::class);
        
    }

     public function usuarios(){
        
        return $this->belongsTo(User::class);
        
    }

     public function compradores(){
        
        return $this->belongsTo(comprador::class);
        
    }

    public function scopeCodigo($query, $codigo){

        return $query->where('comprador.codigo', 'LIKE', "%$codigo%");
    }

    public function scopeFecha($query, $fecha){

        return $query->where('fecha', 'LIKE', "%$fecha%");
    }

    public function scopeRuta($query, $idruta){

        return $query->where('ruta.id', '=', "%$idruta%");
    }

    public function scopeRecorrido($query, $idrecorrido){

        return $query->where('recorrido.id', '=', "%$idrecorrido%");
    }
}
