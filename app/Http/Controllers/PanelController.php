<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\rol;
use App\ruta;
use App\comprador;
use App\User;
use App\bus;
use App\recorrido;
use App\precio;
use App\puntoventa;
use App\Admin;

class PanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
     public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin',['only' => ['usuarios','roles','rutas','buses','recorridos','precios','puntosventas']]);
     }


    public function index()
    {
        //
        
        return view('Admin.panel');
    }


    public function usuarios()
    {
        //
        
        $roles = rol::lists('nombre','id');
       return view('Admin.Usuario.crear', compact('roles'));
    }

    public function roles()
    {
        //
        
        return view('Admin.Rol.crear');
    }

    public function rutas()
    {
        //
        
        return view('Admin.Ruta.crear');
    }

    public function buses()
    {
        //
        
       $rutas = ruta::lists('nombre','id');
       return view('Admin.Bus.crear', compact('rutas'));
    }

    public function recorridos()
    {
        //
        $rutas = ruta::lists('nombre','id');
        return view('Admin.Recorrido.crear', compact('rutas'));
    }

    public function precios()
    {
        //$rutas = ruta::lists('nombre','id');
        $rutas = ruta::lists('nombre','id');

        return view('Admin.Precio.crear', compact('rutas'));
    }

    public function puntosventas()
    {
        //
        return view('Admin.Puntoventa.crear');
    }
    public function compradores()
    {
        //
         return view('Admin.Comprador.crear');
    }

    public function tiquetes()
    {
        //
        
         $compradores = comprador::lists('codigo','id');
         $vendedores = User::lists('nombres','id');
         $buses = bus::lists('placa','id');
         $rutas = ruta::lists('nombre','id');
         $recorridos = recorrido::lists('nombre','id');
         $precios = precio::lists('valor','id');
         $puntosventas = puntoventa::lists('campus','id');
         $bus1 = bus::find(1);
         $bus2 = bus::find(2);
         $bus3 = bus::find(3);
         return view('Admin.Tiquete.crear', compact('compradores','vendedores','buses','precios','puntosventas','rutas','recorridos','bus1','bus2','bus3'));

      
    }


   
}
