@extends('Admin.panel')

@section('title','listado de recorridos')

@section('content')

@if(Session::has('mensaje'))
<div class="alert alert-dismissible alert-success">
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
                       <h1 class="page-header">Listado <small class="text-success">de recorridos</small></h1>
                        
                        <ol class="breadcrumb">
                        <li>
                        <i class="fa fa-home text-success"></i>  <a href="{{ route('admin.panel.index') }}">Inicio</a>
                        </li>
                            
                        </ol>

                        <div class="panel panel-green w3-card-4">
                        <div class="panel-heading">
                        <h3 class="panel-title">Lista de Recorridos</h3>
                        </div>
                        <div class="panel-body"> 


                            <div class="row">
                    <div class="col-lg-12">
                       
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Hora salida</th>
                                        <th>Lugar salida</th>
                                        <th>Hora llegada</th>
                                        <th>Lugar llegada</th>
                                        <th>Descripcion</th>
                                        
                                       

                                    </tr>
                                </thead>
                                <tbody >
                                    
                                  @foreach ($recorridos as $recorrido)

                                  <tr >

                                    <td>{{ $recorrido->id}}</td>
                                    <td>{{ $recorrido->nombre}}</td>
                                    <td>{{ $recorrido->hora_salida}}</td>
                                    <td>{{ $recorrido->lugar_salida}}</td>
                                    <td>{{ $recorrido->hora_llegada}}</td>
                                    <td>{{ $recorrido->lugar_llegada}}</td>
                                    <td>{{ $recorrido->descripcion}}</td>
                                    
                                   

                                  </tr>  

                                  @endforeach
                                    
                                </tbody>
                            </table>
                            {!! $recorridos->render() !!}
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