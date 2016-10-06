<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\comprador;
use App\User;
use Input;
use App\LdapServerConnection;

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
        $compradores = comprador::orderBy('id','ASC')->paginate(5);
        return view('Admin.Comprador.listar')->with('compradores', $compradores);
    }

    public function autocompletarcomprador(Request $request){


        $ldap = new LdapServerConnection;

        
        $term=$request->term;
        
        $data = $ldap->verificarUsuarioById($term);

        //dd($data);

        if ($data) {
            # code...
            $resultado=array();
        
            $resultado[]=['id'=>$data->codigo, 'nombrecompleto'=>$data->nombrecompleto, 'value'=>$data->codigo];
       
        return response()->json($resultado);

        }else{

        $term=$request->term;
        $data = comprador::where('codigo','LIKE','%' .$term. '%')
        ->take(1)
        ->get();
        $resultado=array();
        foreach ($data as $key => $v) {
            # code...
            $resultado[]=['id'=>$v->id, 'nombrecompleto'=>$v->nombrecompleto, 'value'=>$v->codigo];
        }
        return response()->json($resultado);


        }

       

      


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
        $comprador = new comprador([

            'codigo' => $request['codigo'],
            'nombrecompleto' => strtoupper($request['nombrecompleto'])

            ]);
        //dd($usuario);
        $comprador->save();
       // dd('Comprador creado');

        return redirect()->route('admin.comprador.index')
        ->with('mensaje', "Se ha agregado el comprador ( " . $comprador->nombrecompleto. " con codigo ". $comprador->codigo." ) exitosamente.");
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
