<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ruta;
use App\bus;
use App\precio;
use App\recorrido;
use DB;


class RutaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rutas = ruta::orderBy('id','ASC')->paginate(5);
        return view('Admin.Ruta.listar')->with('rutas', $rutas);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
   

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $ruta = new ruta($request->all());
        //dd($usuario);
        $ruta->save();
        //$ruta->buses()->attach($ruta);
        //dd('Ruta creado');
        return redirect()->route('admin.ruta.index')
        ->with('mensaje', "Se ha agregado la ruta ( " . $ruta->nombre ." ) exitosamente.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getPrecios(Request $request, $id){
        if($request->ajax()){
            $precios = precio::precios($id);
            return response()->json($precios);
        }
    }

    public function getRecorridos(Request $request, $id){
        if($request->ajax()){
            $recorridos = recorrido::recorridos($id);
            return response()->json($recorridos);
        }
    }

    public function getBuses(Request $request, $id){
        if($request->ajax()){
            $buses = bus::buses($id);
            return response()->json($buses);
        }
    }



}
