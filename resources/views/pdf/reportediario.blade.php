<html>
<head>
    <title>Reporte diario</title>
    {!! Html::style('css/main.css') !!}
</head>
<body>


 <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">

                    <IMG SRC="img/logo.png">

                        <br><br>
                    

                    <div class="col-lg-12">
                       <h1 class="tablapdf">REPORTE DE VENTA DIARIO</h1>
                        
                      

                        <div class="panel panel-green w3-card-4">
                        
                        <div class="panel-body"> 


                            <div class="row">
                    <div class="col-lg-12">
                       
                        <div class="table-responsive">
                            <table class="estilo-tabla" border="1px" cellspacing="0" cellpadding="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>CODIGO</th>
                                        <th>NOMBRE COMPLETO</th>
                                        <th>RUTA</th>
                                        <th>RECORRIDO</th>
                                        <th>FECHA</th>
                                        <th>PRECIO</th>
                                        <th>PUNTO VENTA</th>
                                        <th>VENDIÓ</th>
                                        <th>VENDIDÓ</th>                                
                                     </tr>
                                </thead>
                                <tbody >
                                    
                                  @foreach ($tiquetes as $tiquete)

                                  <tr>
                                    <td align=center>{{ $tiquete->id }}</td>
                                    <td align=center>{{ $tiquete->codigocomprador}}</td>
                                    <td align=center>{{ $tiquete->nombrecompleto}}</td>
                                    <td align=center>{{ $tiquete->ruta }}</td>
                                    <td align=center>{{ $tiquete->recorrido }}</td>
                                    <td align=center>{{ $tiquete->fecha }}</td>
                                    <td align=center>{{ $tiquete->precio }}</td>
                                    <td align=center>{{ $tiquete->puntoventa }}</td>
                                    <td align=center>{{ $tiquete->vendedor }}</td>
                                    <td align=center>{{ $tiquete->vendido}}</td>
                                  </tr>  


                                  @endforeach

                              
    
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <th scope="row">Total Ventas</th>
                                    <td> </td>
                                    <td> </td>
                                    <td align=center><strong>{{ $totalapagar }}</strong></td>
                                    <td> </td>
                                    <td> </td>
                                    
                                    

                                  

                                                                      
                                </tbody>
                            </table>
                          
                          
                           
                        </div>
                    </div>
                   
                </div>


                </div>

                    </div>

                 </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>


</body>
</html>