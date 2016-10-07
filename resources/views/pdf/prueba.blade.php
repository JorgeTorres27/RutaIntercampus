 <!doctype html>
 <html>

   <head>
      <meta charset="utf-8"/>   
      <title>PDF</title>

       {!! Html::style('css/main.css') !!}
   </head>

   <body>

   	<div style="font-family:sans-serif">
      <strong><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tiquete de abordaje<br>
     <small class="">Universidad Tecnologica de Bolivar</small></p></strong>
               
     <strong><table class="ancho-tabla" border="1px" cellspacing="0" cellpadding="8">

     							@foreach ($tiquetes as $tiquete)
                                
                                         
                                         <tr><th class="text-tiquete">ID</th><td>{{ $tiquete->id}}</td></tr>
                                         <tr><th class="text-tiquete">Ruta</th><td class="datos-tiquete">
                                         	@if( $tiquete->ruta_id == 1)
                                        RUTA 1
                                        @else
                                        RUTA 2
                                        @endif


                                         </td></tr>
                                         <tr><th class="text-tiquete">salida</th><td>

                                          @if( $tiquete->recorrido_id == 1)
                                          07:00:00
                                          @else
                                          otra hora
                                          @endif

                                         </td></tr>
                                         <tr><th class="text-tiquete">Fecha salida </th><td>{{ $tiquete->fecha}}</td></tr>
                                         
                                         <tr><th class="text-tiquete">venta</th><td>
                                         	@if( $tiquete->puntoventa_id == 1)
                                        Ternera
                                        @else
                                        Manga
                                        @endif

                                         </td></tr>
                                         <tr><th class="text-tiquete">Vendió</th><td>
                                         {{ Auth::user()->nombres }} {{ Auth::user()->apellidos }}

                                        </td></tr>
                                        <tr><th class="text-tiquete">Vendido</th><td> {{ $tiquete->created_at}}</td></tr>


                                  @endforeach
                     
                                
                            </table></strong>
                        </div>
   </body>

 </html>