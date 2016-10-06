<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\bus;
use App\ruta;
use DB;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $buses = bus::orderBy('id','ASC')->paginate(5);
        return view('Admin.Bus.listar')->with('buses', $buses);
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
        $bus = new bus([

            'placa'      => strtoupper($request['placa']),
            'capacidad'  => $request['capacidad'],
            'empresa'    => strtoupper($request['empresa']),
            'ruta_id'    => $request['ruta_id'],
            
            ]);
        
        $bus->save();
        
        //dd($bus);
        
        
        
       // dd('Bus creado');

        return redirect()->route('admin.bus.index')
        ->with('mensaje', "Se ha agregado el bus con placa ( " . $bus->placa ." ) exitosamente.");
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
