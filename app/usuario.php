<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class usuario extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    // Nombre de la tabla
    protected $table = 'usuario';
    
    // Llave primaria
    protected  $primarykey = 'id';


    //Campos de mi identidad usuarios
    
    protected $fillable = [
     'nombres', 'apellidos','rol', 'cedula', 'email','password',
        
    ];
    
    
    //Muchos usuarios pueden tener muchos roles
    
    public function roles()
    {
        return $this->belongsToMany(rol::class);
    }
}

    
    

