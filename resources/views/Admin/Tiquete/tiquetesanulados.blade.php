@extends('Admin.panel')

@section('title','Anular tiquetes')

@section('content')

@if(Session::has('mensaje'))
<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <br>
  <strong> {{ Session::get('mensaje') }}</strong>
  <br>
  <br>
</div>
@endif                        
                        

 <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">

                    <div class="col-lg-12">
                       <h1 class="page-header">Tiquetes<small class="text-danger"> Anulados</small></h1>

                         <ol class="breadcrumb">
                        <li>
                        <i class="fa fa-home text-success"></i>  <a href="{{ route('admin.panel.index') }}">Inicio</a>
                        </li>
                            
                        </ol>

                        <div class="panel panel-red w3-card-4">
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
                                        <th>Punto venta</th>
                                        <th>Vendió</th>
                                        <th>Vendidó</th>
                                        <th>Anuló</th>
                                        <th class="app-datos1">Anulado</th>
                                        
                     
                                    </tr>
                                </thead>
                                <tbody >
                                    
                                  @foreach ($tiquetes as $tiquete)

                                  <tr >

                                    <td>{{ $tiquete->id }}</td>
                                    <td>{{ $tiquete->codigocomprador}}</td>
                                    <td>{{ $tiquete->nombrecompleto}}</td>
                                    <td>{{ $tiquete->ruta }}</td>
                                    <td>{{ $tiquete->recorrido }}</td>
                                    <td>{{ $tiquete->fecha }}</td>
                                    <td align=center>{{ $tiquete->puntoventa }}</td>
                                    <td>{{ $tiquete->vendedor }}</td>
                                    <td>{{ $tiquete->created_at}}</td>
                                    <td>{{ Auth::user()->nombres }}</td>
                                    <td>{{ $tiquete->deleted_at}}</td>
                                                        
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