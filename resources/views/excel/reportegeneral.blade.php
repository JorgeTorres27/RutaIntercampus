@extends('Admin.panel')

@section('title','listado de tiquetes')

@section('content')
                   
 <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">

                    

                    <div class="col-lg-12">
                       <h1 class="page-header"><small class="text-success">REPORTE DE VENTA GENERAL</small></h1>
                        
                        <ol class="breadcrumb">
                        <li>
                        <i class="fa fa-home text-success"></i>  <a href="{{ route('admin.panel.index') }}">Inicio</a>
                        </li>
                            
                        </ol>

                         <div class="btn-group">
                            <button type="button" class="btn btn-success btn-sm"><span class="fa fa-download"></span>&nbsp;&nbsp;Descargar</button>

                            <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggole Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu" id="exportar-menu">
                                <li id="exportaraexcel"><a href="{{URL::to('admin/exportargeneral')}}"><i class="fa fa-file-excel-o text-success"></i>&nbsp;&nbsp;Formato Excel</a></li>
                                <li id="exportarapdf"><a href="{{URL::to('admin/reportegeneralpdf')}}"><i class="fa fa-file-pdf-o text-danger"></i>&nbsp;&nbsp;Formato PDF</a></li>
                            </ul>

                        </div>

                        <br><br>

                        <div class="panel panel-green w3-card-4">
                        <div class="panel-heading">
                        <h3 class="panel-title">Lista de Tiquetes</h3>
                        </div>
                        <div class="panel-body"> 


                            <div class="row">
                    <div class="col-lg-12">
                       
                        <div class="table-responsive">
                            <table class="table table-striped table-hover textotabla">
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

                                    <td>{{ $tiquete->id }}</td>
                                    <td>{{ $tiquete->codigocomprador}}</td>
                                    <td>{{ $tiquete->nombrecompleto}}</td>
                                    <td>{{ $tiquete->ruta }}</td>
                                    <td>{{ $tiquete->recorrido }}</td>
                                    <td>{{ $tiquete->fecha }}</td>
                                    <td align=left>{{ $tiquete->precio }}</td>
                                    <td>{{ $tiquete->puntoventa }}</td>
                                    <td>{{ $tiquete->vendedor }}</td>
                                    <td>{{ $tiquete->vendido}}</td>
                            
                                  </tr>  


                                  @endforeach
                                    
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