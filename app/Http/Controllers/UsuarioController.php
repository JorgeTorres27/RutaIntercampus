<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\rol;
use App\bus;
use Laracasts\Flash\Flash;
use App\Admin;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function index()
    {
        //

        $buses = bus::find(1);
        $usuarios = User::orderBy('id','ASC')->paginate(5);
        return view('Admin.Usuario.listar', compact('buses'))->with('usuarios', $usuarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   /** public function create()
    {
        //
        $roles = rol::lists('nombre','id');
       return view('Admin.Usuario.crear', compact('roles'));
    }
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
        $usuario = new User([

            'nombres' => strtoupper($request['nombres']),
            'apellidos' => strtoupper($request['apellidos']),
            'rol' => $request['rol'],
            'cedula' => $request['cedula'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),

            ]);
        //dd($usuario);
        $usuario->save();
        $usuario->roles()->attach($request['rol']);

        flash("Se ha agregado el usuario ( " . $usuario->nombres ." " .$usuario->apellidos. " ) exitosamente.",'success');
        //dd('Usuario creado');
        return redirect()->route('admin.usuario.index');
    }

     public function logout(){
        Auth::logout();
        return Redirect::to('admin/log');

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
        $usuario = User::find($id);
        $roles = rol::lists('nombre','id');
        return view('Admin.Usuario.editar',['usuario' => $usuario],compact('roles'));
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

        $usuario = User::find($id);
        $usuario->nombres = $request->nombres;
        $usuario->apellidos = $request->apellidos;
        $usuario->cedula = $request->cedula;
        $usuario->email = $request->email;
        $usuario->rol = $request->rol;

        $usuario->save();

        Flash::warning("El usuario ( " . $usuario->nombres ." " .$usuario->apellidos. " ) fue editado de forma exitosa");
        return redirect()->route('admin.usuario.index');
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
        $usuario = User::find($id);
        $usuario->delete();

        Flash::error("El usuario ( " . $usuario->nombres ." " .$usuario->apellidos. " ) fue eliminado de forma exitosa");
        return redirect()->route('admin.usuario.index');

        //dd($usuario);
    }
}
