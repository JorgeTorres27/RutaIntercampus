@extends('Admin.panel')

@section('title','listado de tiquetes')

@section('content')
                   
 <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">

                    

                    <div class="col-lg-12">
                       <h1 class="page-header">Listado <small class="text-success">de tiquetes</small></h1>
                        
                        <ol class="breadcrumb">
                        <li>
                        <i class="fa fa-home text-success"></i>  <a href="{{ route('admin.panel.index') }}">Inicio</a>
                        </li>
                            
                        </ol>

                        <div class="panel panel-green w3-card-4">
                        <div class="panel-heading">
                        <h3 class="panel-title">Lista de Tiquetes</h3>
                        </div>
                        <div class="panel-body"> 


                            <div class="row">
                    <div class="col-lg-12">
                       
                        <div class="table-responsive">
                            <table class="table table-striped table-hover textotablaanulados">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Codigo</th>
                                        <th>Nombre Completo</th>
                                        <th>Ruta</th>
                                        <th>Recorrido</th>
                                        <th>Fecha</th>
                                        <th>Cupos</th>
                                        <th>Precio</th>
                                        <th>Punto venta</th>
                                        <th>Vendió</th>
                                        <th>Vendidó</th>                                   
                                     </tr>
                                </thead>
                                <tbody >
                                    
                                  @foreach ($tiquetes as $tiquete)

                                  <tr>

                                    <td>{{ $tiquete->id }}</td>
                                    <td>{{ $tiquete->codigocomprador}}</td>
                                    <td>{{ $tiquete->nombrecompleto}}</td>
                                    <td>{{ $tiquete->ruta }}</td>
                                    <td>{{ $tiquete->recorrido }}</td>
                                    <td>{{ $tiquete->fecha }}</td>
                                    <td>{{ $tiquete->cupos }}</td>
                                    <td align=left>{{ $tiquete->precio }}</td>
                                    <td>{{ $tiquete->puntoventa }}</td>
                                    <td>{{ $tiquete->vendedor }}</td>
                                    <td>{{ $tiquete->created_at}}</td>
                            
                                  </tr>  


                                  @endforeach

                                   <tr>
    
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <th scope="row">Total ventas</th>
                                    <td> </td>
                                    <td align=left><strong>{{ $totalapagar }}</strong></td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    
                                  </tr>

                                    
                                </tbody>
                            </table>
                            {!! $tiquetes->render() !!}
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


@endsection