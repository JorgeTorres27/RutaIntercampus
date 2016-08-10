<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\comprador;
use App\User;
use Input;

class CompradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function autocompletarcomprador(Request $request){

        $term=$request->term;
        $data = comprador::where('codigo','LIKE','%' .$term. '%')
        ->take(1)
        ->get();
        $resultado=array();
        foreach ($data as $key => $v) {
            # code...
            $resultado[]=['id'=>$v->id, 'nombre'=>$v->nombre, 'apellidos'=>$v->apellidos, 'value'=>$v->codigo];
        }
        return response()->json($resultado);
    }

    public function autocompletarvendedor(Request $request){

        $term=$request->term;
        $data = User::where('cedula','LIKE','%' .$term. '%')
        ->take(1)
        ->get();
        $resultado=array();
        foreach ($data as $key => $v) {
            # code...
            $resultado[]=['id'=>$v->id, 'nombres'=>$v->nombres, 'apellidos'=>$v->apellidos, 'value'=>$v->cedula];
        }
        return response()->json($resultado);
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
         //dd($request->all());
        $comprador = new comprador($request->all());
        //dd($usuario);
        $comprador->save();
        dd('Comprador creado');
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
}
