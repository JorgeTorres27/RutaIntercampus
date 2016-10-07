<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\tiquete;
use Input;
use DB;
use Excel;
use DateTime;

class ExcelController extends Controller
{
    //

    public function reportediario(){

    	$hoy = new DateTime('today');
        $hoy = $hoy->format('Y-m-d');

    	$Tiquetes = tiquete::select('tiquete.id as ID','tiquete.codigocomprador as CODIGO','comprador.nombrecompleto as NOMBRE_COMPLETO','ruta.nombre as RUTA',
            'recorrido.hora_salida as RECORRIDO','FECHA','CUPOS','precio.valor as PRECIO','puntoventa.campus as PUNTO_VENTA', DB::raw ('CONCAT(users.nombres, " ", users.apellidos) as VENDEDOR'),
             'tiquete.created_at as VENDIDO')
        ->join('ruta','ruta.id','=','tiquete.ruta_id')
        ->join('recorrido','recorrido.id','=','tiquete.recorrido_id')
        ->join('bus','bus.id','=','tiquete.bus_id')
        ->join('precio','precio.id','=','tiquete.precio_id')
        ->join('puntoventa','puntoventa.id','=','tiquete.puntoventa_id')
        ->join('users','users.id','=','tiquete.user_id')
        ->join('comprador','comprador.codigo','=','tiquete.codigocomprador')
        ->where('tiquete.created_at','LIKE', "%$hoy%")
        ->whereNull('deleted_at')->orderBy('tiquete.created_at','DESC')->get();

        $totalapagar = tiquete::select(DB::raw('SUM(precio.valor) as "TOTAL VENTAS"'))
        ->join('precio','precio.id','=','tiquete.precio_id')
        ->join('comprador','comprador.codigo','=','tiquete.codigocomprador')
        ->where('tiquete.created_at','LIKE', "%$hoy%")
        ->whereNull('deleted_at')->get();

    	Excel::create('Reporte diario', function($excel) use ($Tiquetes, $totalapagar){
    		$excel->sheet('Tiquetes Vendidos', function($sheet) use ($Tiquetes) {
    			$sheet->fromArray($Tiquetes);
              
    		});
            $excel->sheet('Total Ventas', function($sheet) use ($totalapagar) {
            
                $sheet->fromArray($totalapagar);
            });
    	})->export('xlsx');
    }

    public function reportegeneral(){

    	
    	$Tiquetes = tiquete::select('tiquete.id as ID','tiquete.codigocomprador as CODIGO','comprador.nombrecompleto as NOMBRE_COMPLETO','ruta.nombre as RUTA',
            'recorrido.hora_salida as RECORRIDO','FECHA','CUPOS','precio.valor as PRECIO','puntoventa.campus as PUNTO_VENTA', DB::raw ('CONCAT(users.nombres, " ", users.apellidos) as VENDEDOR'),
             'tiquete.created_at as VENDIDO')
        ->join('ruta','ruta.id','=','tiquete.ruta_id')
        ->join('recorrido','recorrido.id','=','tiquete.recorrido_id')
        ->join('bus','bus.id','=','tiquete.bus_id')
        ->join('precio','precio.id','=','tiquete.precio_id')
        ->join('puntoventa','puntoventa.id','=','tiquete.puntoventa_id')
        ->join('users','users.id','=','tiquete.user_id')
        ->join('comprador','comprador.codigo','=','tiquete.codigocomprador')
        ->whereNull('deleted_at')->orderBy('tiquete.created_at','DESC')->get();

        $totalapagar = tiquete::select(DB::raw('SUM(precio.valor) as "TOTAL VENTAS"'))
        ->join('precio','precio.id','=','tiquete.precio_id')
        ->join('comprador','comprador.codigo','=','tiquete.codigocomprador')
        ->whereNull('deleted_at')->get();

    	Excel::create('Reporte general', function($excel) use ($Tiquetes, $totalapagar){
    		$excel->sheet('Tiquetes Vendidos en General', function($sheet) use ($Tiquetes) {
    			$sheet->fromArray($Tiquetes);
    		});
            $excel->sheet('Total Ventas', function($sheet) use ($totalapagar) {
            
                $sheet->fromArray($totalapagar);
            });
    	})->export('xlsx');
    }

    public function reporteventasgeneral(){

    	
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
        ->whereNull('deleted_at')->orderBy('tiquete.created_at','DESC')->paginate(10);

    	return view('excel.reportegeneral')->with('tiquetes', $tiquetes);
    }

    public function reporteventashoy(){

    	
        $hoy = new DateTime('today');

        $hoy = $hoy->format('Y-m-d');

    	$tiquetes = tiquete::select('tiquete.id','tiquete.codigocomprador as codigo','comprador.nombrecompleto as nombre_completo','ruta.nombre as ruta','recorrido.hora_salida as recorrido','fecha','cupos',
            'precio.valor as precio','puntoventa.campus as puntoventa', DB::raw ('CONCAT(users.nombres, " ", users.apellidos) as vendedor'),
             'tiquete.created_at as vendido')
        ->join('ruta','ruta.id','=','tiquete.ruta_id')
        ->join('recorrido','recorrido.id','=','tiquete.recorrido_id')
        ->join('bus','bus.id','=','tiquete.bus_id')
        ->join('precio','precio.id','=','tiquete.precio_id')
        ->join('puntoventa','puntoventa.id','=','tiquete.puntoventa_id')
        ->join('users','users.id','=','tiquete.user_id')
        ->join('comprador','comprador.codigo','=','tiquete.codigocomprador')
        ->where('tiquete.created_at','LIKE', "%$hoy%")
        ->whereNull('deleted_at')->orderBy('tiquete.created_at','DESC')->paginate(10);

        $totalapagar = tiquete::select(DB::raw('SUM(precio.valor) as total'))
        ->join('precio','precio.id','=','tiquete.precio_id')
        ->join('comprador','comprador.codigo','=','tiquete.codigocomprador')
        ->where('tiquete.created_at','LIKE', "%$hoy%")->get();



    	return view('excel.reportediario')->with('tiquetes', $tiquetes)
                                          ->with('totalapagar',$totalapagar[0]->total);
    }

}
