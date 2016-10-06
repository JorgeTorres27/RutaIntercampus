<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use PDF;
use App\User;
use App\tiquete;
use DB;
use DateTime;

class PDFController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
     }

    Public function getPDF(){


        $tiquetes = DB::table('tiquete')->limit(1)->orderBy('created_at', 'desc')->get();

    	/**$nombreruta = DB::table('ruta')->limit(1)->select('nombre')
    	 ->join('tiquete', 'ruta.id', '=', 'tiquete.ruta_id')->get();*/
    	
        
       //dd($nombreruta);

    	  	
    	$pdf=PDF::loadView('pdf.prueba',['tiquetes' =>$tiquetes]);
        $paper_size = array(30,-30,360,360);
        $pdf->setPaper($paper_size);
    	return $pdf->stream('tiquete.pdf');
    }

    public function reportediario(){

        $hoy = new DateTime('today');
        $hoy = $hoy->format('Y-m-d');

        $tiquetes = tiquete::select('tiquete.id','tiquete.codigocomprador','ruta.nombre as ruta','recorrido.hora_salida as recorrido','fecha','cupos',
            'precio.valor as precio','puntoventa.campus as puntoventa', DB::raw ('CONCAT(users.nombres, " ", users.apellidos) as vendedor'),
             'comprador.nombrecompleto','tiquete.created_at as vendido')
        ->join('ruta','ruta.id','=','tiquete.ruta_id')
        ->join('recorrido','recorrido.id','=','tiquete.recorrido_id')
        ->join('bus','bus.id','=','tiquete.bus_id')
        ->join('precio','precio.id','=','tiquete.precio_id')
        ->join('puntoventa','puntoventa.id','=','tiquete.puntoventa_id')
        ->join('users','users.id','=','tiquete.user_id')
        ->join('comprador','comprador.codigo','=','tiquete.codigocomprador')
        ->where('tiquete.created_at','LIKE', "%$hoy%")
        ->whereNull('deleted_at')->orderBy('tiquete.created_at','DESC')->get();

        $totalapagar = tiquete::select(DB::raw('SUM(precio.valor) as total'))
        ->join('precio','precio.id','=','tiquete.precio_id')
        ->join('comprador','comprador.codigo','=','tiquete.codigocomprador')
        ->where('tiquete.created_at','LIKE', "%$hoy%")
        ->whereNull('deleted_at')->get();

        $pdf=PDF::loadView('pdf.reportediario',['tiquetes' =>$tiquetes, 'totalapagar'=>$totalapagar[0]->total]);
        $pdf->setPaper("letter","landscape");
        
        return $pdf->stream('reportediario.pdf');

    }

    public function reportegeneral(){

        
        $tiquetes = tiquete::select('tiquete.id','tiquete.codigocomprador','ruta.nombre as ruta','recorrido.hora_salida as recorrido','fecha','cupos',
            'precio.valor as precio','puntoventa.campus as puntoventa', DB::raw ('CONCAT(users.nombres, " ", users.apellidos) as vendedor'),
             'comprador.nombrecompleto','tiquete.created_at as vendido')
        ->join('ruta','ruta.id','=','tiquete.ruta_id')
        ->join('recorrido','recorrido.id','=','tiquete.recorrido_id')
        ->join('bus','bus.id','=','tiquete.bus_id')
        ->join('precio','precio.id','=','tiquete.precio_id')
        ->join('puntoventa','puntoventa.id','=','tiquete.puntoventa_id')
        ->join('users','users.id','=','tiquete.user_id')
        ->join('comprador','comprador.codigo','=','tiquete.codigocomprador')
        ->whereNull('deleted_at')->orderBy('tiquete.created_at','DESC')->get();

        $totalapagar = tiquete::select(DB::raw('SUM(precio.valor) as total'))
        ->join('precio','precio.id','=','tiquete.precio_id')
        ->join('comprador','comprador.codigo','=','tiquete.codigocomprador')
        ->whereNull('deleted_at')->get();

        $pdf=PDF::loadView('pdf.reportegeneral',['tiquetes' =>$tiquetes, 'totalapagar'=>$totalapagar[0]->total]);
        $pdf->setPaper("letter","landscape");
        
        return $pdf->stream('reportegeneral.pdf');

    }
}
