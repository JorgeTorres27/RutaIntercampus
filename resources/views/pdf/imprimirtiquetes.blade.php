 <!doctype html>
 <html>

  <head>
  <meta charset="utf-8"/>   
  <title>Imprimir Tiquetes</title>

  {!! Html::style('css/main.css') !!}
  </head>

  <body>

   @foreach ($tiquetes as $tiquete)

  <div style="font-family:sans-serif">
  <strong><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tiquete de abordaje<br>
  <small class="">Universidad Tecnologica de Bolivar</small></p></strong>

  <strong><table class="ancho-tabla" border="1px" cellspacing="0" cellpadding="8">

    
                 
  <tr><th class="text-tiquete">ID</th><td>{{ $tiquete->id}}</td></tr>
  <tr><th class="text-tiquete">Ruta</th><td class="datos-tiquete">{{ $tiquete->ruta }}</td></tr>
  <tr><th class="text-tiquete">Recorrido</th><td>{{ $tiquete->recorrido }}</td></tr>
  <tr><th class="text-tiquete">Salida</th><td>{{ $tiquete->fecha }}</td></tr>
  <tr><th class="text-tiquete">Venta</th><td>{{ $tiquete->puntoventa }}</td></tr>
  <tr><th class="text-tiquete">Vendió</th><td>{{ Auth::user()->nombres }}</td></tr>
  <tr><th class="text-tiquete">Vendido</th><td>{{ $tiquete->created_at }}</td></tr>

  

                              
  </table></strong>
  </div>

  @endforeach 
  
  </body>

 </html>