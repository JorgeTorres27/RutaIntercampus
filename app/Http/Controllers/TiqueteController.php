<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\tiquete;
use App\comprador;
use App\bus;
use App\recorrido;
use App\User;
use App\ruta;
use App\precio;
use App\puntoventa;
use DB;
use PDF;
use DateTime;


class TiqueteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(){
        $this->middleware('auth');
       
     }

    public function index()
    {
        //

        $tiquetes = tiquete::select('tiquete.id','tiquete.codigocomprador','comprador.nombrecompleto', 'ruta.nombre as ruta','recorrido.hora_salida as recorrido','fecha','cupos',
            'precio.valor as precio','puntoventa.campus as puntoventa', DB::raw ('CONCAT(users.nombres, " ", users.apellidos) as vendedor'),
             'tiquete.created_at')
        ->join('comprador','comprador.codigo','=','tiquete.codigocomprador')
        ->join('ruta','ruta.id','=','tiquete.ruta_id')
        ->join('recorrido','recorrido.id','=','tiquete.recorrido_id')
        ->join('bus','bus.id','=','tiquete.bus_id')
        ->join('precio','precio.id','=','tiquete.precio_id')
        ->join('puntoventa','puntoventa.id','=','tiquete.puntoventa_id')
        ->join('users','users.id','=','tiquete.user_id')
        
        ->whereNull('deleted_at')->orderBy('created_at','DESC')->paginate(10);
        //dd($tiquetes);

        $contador = DB::table('tiquete')
        ->whereNull('deleted_at')->count();
        $totalapagar = $contador*3800;
        
        //dd($totalapagar);
        return view('Admin.Tiquete.listar')->with('tiquetes', $tiquetes)
        ->with('totalapagar', $totalapagar);



        
        
        
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
       
       $cantidadCupos = 40;
        $consultaDB = DB::table('tiquete')->where('fecha',$request['fecha'])
        ->where('ruta_id',$request['ruta_id'])
        ->where('recorrido_id',$request['recorrido_id'])
        ->whereNull('deleted_at');
        $tiquete = $consultaDB->orderBy('created_at', 'desc')->first();

        $comprador = DB::table('comprador')->where('codigo', $request['codigocomprador'])->get();

        //dd($comprador);

        if($comprador){

        }else{

             $comprador = new comprador([

                'codigo' => strtoupper($request['codigocomprador']),
                'nombrecompleto' => strtoupper($request['nombrecompleto'])

                ]);

            $comprador->save();
        }

        //comprobamos si existe un tiquete y si existe lo igualamos a la columna cupos del tiquete
        if($tiquete){
            $cantidadCupos = $tiquete->cupos;
        }


        /**Comprobamos que la cantidad de cupos sea mayor que cero y si es asi entonces que me guarde el tiquete
         y si no entonces que me diga que no hay cupos disponibles y no me guarde el tiquete.*/
        if($cantidadCupos > 0){
            $tiquete = new tiquete([
            'codigocomprador' => strtoupper($request['codigocomprador']),
            'user_id' => $request['user_id'],
            'ruta_id' => $request['ruta_id'],
            'recorrido_id' => $request['recorrido_id'],
            'fecha' => $request['fecha'],
            'bus_id' => $request['bus_id'],
            'precio_id' => $request['precio_id'],
            'puntoventa_id' => $request['puntoventa_id'],
            'cupos' => $cantidadCupos-1
            ]);
            $tiquete->save();
            
        }else{
            return redirect()->route('admin.tiquetes')
            ->with('nocupos', 'No hay cupos disponibles.');
        }

         $date = new DateTime('today');

         $ahora = new DateTime('now');
         $ahora1 = new DateTime('now');

         $antes = $ahora1->modify('-5 minutes');

        $precioruta1 = DB::table('precio')->select('valor')->where('id', 1)->get();
        $precioruta2 = DB::table('precio')->select('valor')->where('id', 2)->get();

          $contadorruta1 = DB::table('tiquete')
          ->where('codigocomprador', $request['codigocomprador'])
          ->where('ruta_id',1)
          ->whereBetween('created_at', array($antes, $ahora))->count();

          if ($request['precio_id'] = 1) {
            $contadorruta1 = $contadorruta1*$precioruta1[0]->valor;
          }


          $contadorruta2 = DB::table('tiquete')
          ->where('codigocomprador', $request['codigocomprador'])
          ->where('ruta_id',2)
          ->whereBetween('created_at', array($antes, $ahora))->count();

          if ($request['precio_id'] = 2) {
            $contadorruta2 = $contadorruta2*$precioruta2[0]->valor;
          }

        $totalapagar = $contadorruta1+$contadorruta2;   

        //Aqui hago una consulta a la base de datos para traer el nombre de la ruta
        $nombreruta = DB::table('ruta')->select('nombre')->where('id',$request['ruta_id'])->get();
        //Aqui hago una consulta a la base de datos para traer la hora de salida del recorrido al cual estoy comprando el tiquete
        $horarecorrido = DB::table('recorrido')->select('hora_salida')->where('id',$request['recorrido_id'])->get();

        $codigo = $request->input('codigocomprador');

      
        //retorno a la ruta donde vendo los tiquetes con los mensajes.
         return redirect()->route('admin.tiquetes')
         ->with('tiquetevendido', 'TIQUETE VENDIDO.')
         ->with('cuposruta', $cantidadCupos-1)
         ->with('fecha', 'Cupos disponibles para el dia ' .$request['fechaseleccionada'])
         ->with('ruta', ($nombreruta[0]->nombre))
         ->with('totalapagar', $totalapagar)
         ->with('mensajepago','Total a Pagar')
         ->with('horarecorrido','- Recorrido de las ' .($horarecorrido[0]->hora_salida))
         ->with('codigo', $codigo)
         ->withInput($request->except('ruta_id'));
        
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

        $tiquete = tiquete::find($id);
        $tiquete->delete();

         return redirect()->route('admin.tiquete.anulartiquetes')
        ->with('mensaje', "Tiquete anulado exitosamente.");
    }

    public function imprimir($id)
    {

        $tiquetes = tiquete::select('tiquete.id','ruta.nombre as ruta','recorrido.hora_salida as recorrido','fecha','cupos',
            'precio.valor as precio','puntoventa.campus as puntoventa', DB::raw ('CONCAT(users.nombres, " ", users.apellidos) as vendedor'),
             'comprador.nombrecompleto','comprador.codigo as cod_comprador','tiquete.created_at')
        ->join('ruta','ruta.id','=','tiquete.ruta_id')
        ->join('recorrido','recorrido.id','=','tiquete.recorrido_id')
        ->join('bus','bus.id','=','tiquete.bus_id')
        ->join('precio','precio.id','=','tiquete.precio_id')
        ->join('puntoventa','puntoventa.id','=','tiquete.puntoventa_id')
        ->join('users','users.id','=','tiquete.user_id')
        ->join('comprador','comprador.codigo','=','tiquete.codigocomprador')
        ->where('tiquete.id', $id)->get();

        $pdf=PDF::loadView('pdf.imprimir',['tiquetes' =>$tiquetes]);
        $paper_size = array(30,-30,360,360);
        $pdf->setPaper($paper_size);
        return $pdf->stream('tiquete.pdf');

    }

    public function imprimirTiquetes(Request $request)
    {

        $ahora = new DateTime('now');
         $ahora1 = new DateTime('now');

         $antes = $ahora1->modify('-5 minutes');

        $tiquetes = tiquete::select('tiquete.id','ruta.nombre as ruta','recorrido.hora_salida as recorrido','fecha','cupos',
            'precio.valor as precio','puntoventa.campus as puntoventa', DB::raw ('CONCAT(users.nombres, " ", users.apellidos) as vendedor'),
             'comprador.nombrecompleto','comprador.codigo as cod_comprador','tiquete.created_at')
        ->join('ruta','ruta.id','=','tiquete.ruta_id')
        ->join('recorrido','recorrido.id','=','tiquete.recorrido_id')
        ->join('bus','bus.id','=','tiquete.bus_id')
        ->join('precio','precio.id','=','tiquete.precio_id')
        ->join('puntoventa','puntoventa.id','=','tiquete.puntoventa_id')
        ->join('users','users.id','=','tiquete.user_id')
        ->join('comprador','comprador.codigo','=','tiquete.codigocomprador')
        ->where('comprador.codigo', $request->codigo)
        ->whereBetween('tiquete.created_at', array($antes, $ahora));
        if($request->fechafiltro){
            $tiquetes->where('fecha', $request->fechafiltro);
        }
        $tiquetes = $tiquetes->whereNull('deleted_at')->get();

        //dd($tiquetes);

        $pdf=PDF::loadView('pdf.imprimirtiquetes',['tiquetes' =>$tiquetes]);
        $paper_size = array(30,-30,360,360);
        $pdf->setPaper($paper_size);
        return $pdf->stream('tiquetes.pdf');

    }


    public function imprimir_tiquetes(Request $request)
    {

        $tiquetes = tiquete::codigo($request->codigo)->fecha($request->fechafiltro)->select('tiquete.id','tiquete.codigocomprador','ruta.nombre as ruta','recorrido.hora_salida as recorrido','fecha','cupos',
            'precio.valor as precio','puntoventa.campus as puntoventa', DB::raw ('CONCAT(users.nombres, " ", users.apellidos) as vendedor'),
             'comprador.nombrecompleto','tiquete.created_at')
        ->join('ruta','ruta.id','=','tiquete.ruta_id')
        ->join('recorrido','recorrido.id','=','tiquete.recorrido_id')
        ->join('bus','bus.id','=','tiquete.bus_id')
        ->join('precio','precio.id','=','tiquete.precio_id')
        ->join('puntoventa','puntoventa.id','=','tiquete.puntoventa_id')
        ->join('users','users.id','=','tiquete.user_id')
        ->join('comprador','comprador.id','=','tiquete.comprador_id')->paginate(10);


        $contador = DB::table('tiquete')
        ->join('comprador','comprador.id', '=', 'tiquete.comprador_id')
        ->where('comprador.codigo', $request->codigo)
        ->whereNull('deleted_at')->count();
        //dd($contador);
        $totalapagar = $contador*3800;

        return view('Admin.Tiquete.carritodecompras')->with('tiquetes', $tiquetes)
                                                     ->with('totalapagar', $totalapagar);

    }




    public function carritodecompras(Request $request)
    {

        $rutas = ruta::lists('nombre','id'); #Listado de rutas
        $recorridos = recorrido::lists('hora_salida','id'); #Listado de recorridos
        $codigo = $request->input('codigo'); #Codigo que ingreso
        $fechafiltro = $request->input('fechafiltro'); #fecha que ingreso
        $ahora = new DateTime('now'); #La hora actual
        $ahora1 = new DateTime('now'); #La ahora actual para modificarla
        $antes = $ahora1->modify('-5 minutes'); #Le quito 5 minutos a la hora actual

        #Listado de tiquetes
        $tiquetes = tiquete::select('tiquete.id','tiquete.codigocomprador','ruta.nombre as ruta','comprador.nombrecompleto','recorrido.hora_salida as recorrido','fecha','cupos',
            'precio.valor as precio','puntoventa.campus as puntoventa', DB::raw ('CONCAT(users.nombres, " ", users.apellidos) as vendedor'),'tiquete.created_at')
        ->join('comprador','comprador.codigo','=','tiquete.codigocomprador')
        ->join('ruta','ruta.id','=','tiquete.ruta_id')
        ->join('recorrido','recorrido.id','=','tiquete.recorrido_id')
        ->join('bus','bus.id','=','tiquete.bus_id')
        ->join('precio','precio.id','=','tiquete.precio_id')
        ->join('puntoventa','puntoventa.id','=','tiquete.puntoventa_id')
        ->join('users','users.id','=','tiquete.user_id')
        ->where('tiquete.codigocomprador', $request->codigo)
        ->whereBetween('tiquete.created_at', array($antes, $ahora));
        if ($request->idruta) {
            $tiquetes->where('ruta.id', $request->idruta);
        }
        if ($request->idrecorrido) {
            $tiquetes->where('recorrido.id', $request->idrecorrido);
        }
        
        $tiquetes = $tiquetes->whereNull('deleted_at')->get();

        #Calculo el total a pagar

        $totalapagar = tiquete::select(DB::raw('SUM(precio.valor) as total'))
        ->join('precio','precio.id','=','tiquete.precio_id')
        ->join('comprador','comprador.codigo','=','tiquete.codigocomprador')
        ->join('ruta','ruta.id','=','tiquete.ruta_id')
        ->join('recorrido','recorrido.id','=','tiquete.recorrido_id')
        ->where('comprador.codigo', $request->codigo)
        ->whereBetween('tiquete.created_at', array($antes, $ahora));
        if ($request->idruta) {
            $totalapagar->where('ruta.id', $request->idruta);
            
        }
        if ($request->idrecorrido) {
            $totalapagar->where('recorrido.id', $request->idrecorrido);
        }
        if ($request->codigo) {
            $totalapagar->where('comprador.codigo', $request->codigo);
        }
        if ($request->fechafiltro) {
            $totalapagar->where('tiquete.fecha', $request->fechafiltro);
        }
        
        $totalapagar = $totalapagar->whereNull('deleted_at')->get();  

        #Retorno la vista
        return view('Admin.Tiquete.carritodecompras')->with('tiquetes', $tiquetes)
                                                     ->with('rutas',$rutas)
                                                     ->with('recorridos',$recorridos)
                                                     ->with('totalapagar',$totalapagar[0]->total)
                                                     ->with('codigo', $codigo)
                                                     ->with('fechafiltro', $fechafiltro);
                                                        

    }

    public function imprimirduplicados(Request $request)
    {

        $tiquetes = tiquete::codigo($request->codigo)->fecha($request->fechafiltro)->select('tiquete.id','tiquete.codigocomprador','ruta.nombre as ruta','recorrido.hora_salida as recorrido','fecha','cupos',
            'precio.valor as precio','puntoventa.campus as puntoventa', DB::raw ('CONCAT(users.nombres, " ", users.apellidos) as vendedor'),
             'comprador.nombrecompleto','comprador.codigo as cod_comprador','tiquete.created_at')
        ->join('ruta','ruta.id','=','tiquete.ruta_id')
        ->join('recorrido','recorrido.id','=','tiquete.recorrido_id')
        ->join('bus','bus.id','=','tiquete.bus_id')
        ->join('precio','precio.id','=','tiquete.precio_id')
        ->join('puntoventa','puntoventa.id','=','tiquete.puntoventa_id')
        ->join('users','users.id','=','tiquete.user_id')
        ->join('comprador','comprador.codigo','=','tiquete.codigocomprador')
        ->where('comprador.codigo', $request->codigo)->paginate(10);

        $codigo = $request->input('codigo');

      
        return view('Admin.Tiquete.imprimir_duplicados')->with('tiquetes', $tiquetes)
                                                        ->with('codigo', $codigo);
                                                        

    }

    public function consultartiquetes(Request $request)
    {

        $rutas = ruta::lists('nombre','id');
        $recorridos = recorrido::lists('hora_salida','id');
        $idruta = $request->input('idruta');
        $idrecorrido = $request->input('idrecorrido');
        $codigo = $request->input('codigo');
        $fechafiltro = $request->input('fechafiltro');
        $precioinicial = 0;


        $tiquetes = tiquete::select('tiquete.id','tiquete.codigocomprador','ruta.nombre as ruta','recorrido.hora_salida as recorrido','fecha','cupos',
        'precio.valor as precio','puntoventa.campus as puntoventa', DB::raw ('CONCAT(users.nombres, " ", users.apellidos) as vendedor'),
        'comprador.nombrecompleto','tiquete.created_at')
        ->join('ruta','ruta.id','=','tiquete.ruta_id')
        ->join('recorrido','recorrido.id','=','tiquete.recorrido_id')
        ->join('bus','bus.id','=','tiquete.bus_id')
        ->join('precio','precio.id','=','tiquete.precio_id')
        ->join('puntoventa','puntoventa.id','=','tiquete.puntoventa_id')
        ->join('users','users.id','=','tiquete.user_id')
        ->join('comprador','comprador.codigo','=','tiquete.codigocomprador');
        if ($request->idruta) {
            $tiquetes->where('ruta.id', $request->idruta);
        }
        if ($request->idrecorrido) {
            $tiquetes->where('recorrido.id', $request->idrecorrido);
        }
        if ($request->codigo) {
            $tiquetes->where('comprador.codigo', $request->codigo);
        }
        if ($request->fechafiltro) {
            $tiquetes->where('tiquete.fecha', $request->fechafiltro);
        }
        $tiquetes = $tiquetes->whereNull('deleted_at')->paginate(10);


        $totalapagar = tiquete::select(DB::raw('SUM(precio.valor) as total'))
        ->join('precio','precio.id','=','tiquete.precio_id')
        ->join('comprador','comprador.codigo','=','tiquete.codigocomprador')
        ->join('ruta','ruta.id','=','tiquete.ruta_id')
        ->join('recorrido','recorrido.id','=','tiquete.recorrido_id');
        if ($request->idruta) {
            $totalapagar->where('ruta.id', $request->idruta);
            
        }
        if ($request->idrecorrido) {
            $totalapagar->where('recorrido.id', $request->idrecorrido);
        }
        if ($request->codigo) {
            $totalapagar->where('comprador.codigo', $request->codigo);
        }
        if ($request->fechafiltro) {
            $totalapagar->where('tiquete.fecha', $request->fechafiltro);
        }
        
        $totalapagar = $totalapagar->whereNull('deleted_at')->get();

        return view('Admin.Tiquete.consultatiquetes')->with('tiquetes', $tiquetes)
                                                     ->with('rutas', $rutas) 
                                                     ->with('recorridos', $recorridos)  
                                                     ->with('totalapagar', $totalapagar[0]->total)
                                                     ->with('codigo', $codigo)
                                                     ->with('idruta', $idruta)
                                                     ->with('idrecorrido', $idrecorrido)
                                                     ->with('fechafiltro', $fechafiltro);
                                                        

    }

    public function anular_tiquetes(Request $request)
    {

        $codigo = $request->input('codigo');
        $tiquetes = tiquete::codigo($request->codigo)->fecha($request->fechafiltro)->select('tiquete.id','tiquete.codigocomprador','ruta.nombre as ruta','recorrido.hora_salida as recorrido','fecha','cupos',
            'precio.valor as precio','puntoventa.campus as puntoventa', DB::raw ('CONCAT(users.nombres, " ", users.apellidos) as vendedor'),
             'comprador.nombrecompleto','tiquete.created_at')
        ->join('ruta','ruta.id','=','tiquete.ruta_id')
        ->join('recorrido','recorrido.id','=','tiquete.recorrido_id')
        ->join('bus','bus.id','=','tiquete.bus_id')
        ->join('precio','precio.id','=','tiquete.precio_id')
        ->join('puntoventa','puntoventa.id','=','tiquete.puntoventa_id')
        ->join('users','users.id','=','tiquete.user_id')
        ->join('comprador','comprador.codigo','=','tiquete.codigocomprador')
        ->where('comprador.codigo', $request->codigo);
        if ($request->fechafiltro) {
            $tiquetes->where('tiquete.fecha', $request->fechafiltro);
        }
        $tiquetes = $tiquetes->paginate(10);

         return view('Admin.Tiquete.anular_tiquetes')->with('tiquetes', $tiquetes)
                                                     ->with('codigo', $codigo);

    }

    public function tiquetesanulados()
    {

        $tiquetes = tiquete::onlyTrashed()->select('tiquete.id','tiquete.codigocomprador','ruta.nombre as ruta','recorrido.hora_salida as recorrido','fecha','cupos',
            'precio.valor as precio','puntoventa.campus as puntoventa', DB::raw ('CONCAT(users.nombres, " ", users.apellidos) as vendedor'),
             'comprador.nombrecompleto','comprador.codigo as cod_comprador','tiquete.created_at','tiquete.deleted_at')
        ->join('ruta','ruta.id','=','tiquete.ruta_id')
        ->join('recorrido','recorrido.id','=','tiquete.recorrido_id')
        ->join('bus','bus.id','=','tiquete.bus_id')
        ->join('precio','precio.id','=','tiquete.precio_id')
        ->join('puntoventa','puntoventa.id','=','tiquete.puntoventa_id')
        ->join('users','users.id','=','tiquete.user_id')
        ->join('comprador','comprador.codigo','=','tiquete.codigocomprador')->orderBy('deleted_at','DESC')->paginate(10);

        return view('Admin.Tiquete.tiquetesanulados')->with('tiquetes',$tiquetes);
    }
}
