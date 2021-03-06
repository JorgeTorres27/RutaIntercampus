<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','PanelController@index');

Route::group(['prefix'=> 'admin'], function(){
    
    Route::get('usuarios',[
        'uses' => 'PanelController@usuarios',
        'as' => 'admin.usuarios'

        ]);
    Route::get('usuario/{id}/eliminar', [
        'uses' => 'UsuarioController@destroy',
        'as' => 'admin.usuario.eliminar'
        ]);

    Route::get('roles',[
        'uses' => 'PanelController@roles',
        'as' => 'admin.roles'

        ]);
    Route::get('rutas',[
        'uses' => 'PanelController@rutas',
        'as' => 'admin.rutas'

        ]);

    Route::get('buses',[
        'uses' => 'PanelController@buses',
        'as' => 'admin.buses'

        ]);

    Route::get('recorridos',[
        'uses' => 'PanelController@recorridos',
        'as' => 'admin.recorridos'

        ]);

    Route::get('precios',[
        'uses' => 'PanelController@precios',
        'as' => 'admin.precios'

        ]);

    Route::get('puntosventas',[
        'uses' => 'PanelController@puntosventas',
        'as' => 'admin.puntosventas'

        ]);

    Route::get('compradores',[
        'uses' => 'PanelController@compradores',
        'as' => 'admin.compradores'

        ]);

    Route::get('tiquetes',[
        'uses' => 'PanelController@tiquetes',
        'as' => 'admin.tiquetes'

        ]);

    Route::get('tiquete/{id}/eliminar', [
        'uses' => 'TiqueteController@destroy',
        'as' => 'admin.tiquete.eliminar'
        ]);

    Route::get('tiquete/{id}/imprimir', [
        'uses' => 'TiqueteController@imprimir',
        'as' => 'admin.tiquete.imprimir'
        ]);

    Route::get('imprimirtiquetes', [
        'uses' => 'TiqueteController@imprimirTiquetes',
        'as' => 'admin.tiquete.imprimirtiquetes'
        ]);

    Route::get('imprimir_tiquetes', [
        'uses' => 'TiqueteController@imprimir_tiquetes',
        'as' => 'admin.tiquete.imprimir_tiquetes'
        ]);

    Route::get('imprimirduplicados', [
        'uses' => 'TiqueteController@imprimirduplicados',
        'as' => 'admin.tiquete.imprimirduplicados'
        ]);

    Route::get('consultartiquetes', [
        'uses' => 'TiqueteController@consultartiquetes',
        'as' => 'admin.tiquete.consultartiquetes'
        ]);

    Route::get('carritodecompras', [
        'uses' => 'TiqueteController@carritodecompras',
        'as' => 'admin.tiquete.carritodecompras'
        ]);

    Route::get('anulartiquetes', [
        'uses' => 'TiqueteController@anular_tiquetes',
        'as' => 'admin.tiquete.anulartiquetes'
        ]);

    Route::get('tiquetesanulados', [
        'uses' => 'TiqueteController@tiquetesanulados',
        'as' => 'admin.tiquete.tiquetesanulados'
        ]);



    Route::get('buses/{id}','RutaController@getBuses');

    Route::resource('panel','PanelController');
    Route::resource('usuario','UsuarioController');
    
    Route::resource('bus','BusController');
    Route::resource('rol','RolController');
    Route::resource('ruta','RutaController');
    Route::resource('precio','PrecioController');
    Route::resource('recorrido','RecorridoController');
    Route::resource('puntoventa','PuntoVentaController');
    Route::resource('comprador','CompradorController');
    Route::resource('tiquete','TiqueteController');
    Route::resource('iniciarsesion','LogController');
    Route::get('logout','LogController@logout');
    Route::get('usuario/{id}/logout','LogController@logout');

    Route::get('autocompletarcomprador', array('as'=>'autocompletarcomprador','uses'=>'CompradorController@autocompletarcomprador'));
   
    Route::get('/getPDF','PDFController@getPDF');
    Route::get('reportediariopdf','PDFController@reportediario');
    Route::get('reportegeneralpdf','PDFController@reportegeneral');
    Route::get('/exportar','ExcelController@reportediario');
    Route::get('/exportargeneral','ExcelController@reportegeneral');

   Route::get('reportediario', [
        'uses' => 'ExcelController@reporteventashoy',
        'as' => 'admin.exportarventashoy'
        ]);

   Route::get('reportegeneral', [
        'uses' => 'ExcelController@reporteventasgeneral',
        'as' => 'admin.exportarventasgeneral'
        ]);

  
    Route::get('precios/{id}','RutaController@getPrecios');
    Route::get('recorridos/{id}','RutaController@getRecorridos');
    Route::get('buses/{id}','RutaController@getBuses');

    
});

   
    