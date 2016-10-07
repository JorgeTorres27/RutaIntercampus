@extends('Admin.panel')

@section('title','Imprimir Duplicados')

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
                       <h1 class="page-header">Imprimir <small class="text-warning">duplicados de tiquetes</small></h1>
                        
                           <!-- Buscador -->

                      {!! Form::open(['route' => 'admin.tiquete.imprimirduplicados', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}

                      <div class="input-group has-warning">

                        <div class="input-group has-warning">
                            {!! Form::text('codigo', $codigo, ['class' => 'form-control input-sm', 'placeholder' => 'Codigo', 
                            'aria-describedby' => 'codigo']) !!}
                            <span class="input-group-addon input-sm" id="codigo"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
                      </div>
                      </div>



                      <div class="input-group has-warning">
                            {!! Form::text('fechafiltro', null, ['class' => 'form-control input-sm', 'placeholder' => 'Fecha: DD-MM-YYYY', 
                            'aria-describedby' => 'fechafiltro']) !!}
                            <span class="input-group-addon input-sm" id="fechafiltro"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
                      </div>

                       <div class="input-group has-warning">
                        {!! Form::button('Filtrar &nbsp;&nbsp; <span class="glyphicon glyphicon-filter"></span>', array('class' => 'btn btn-warning btn-sm', 'type' => 'submit')) !!}
  

                        </div> 

                      
                        
                        {!! Form::close() !!}

                        <!-- Fin del buscador -->

                        <br><br><br>

                        <div class="panel panel-yellow w3-card-4">
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
                                        <th>Vendido</th>
                                        <th class="app-datos1">Imprimir</th>
                                        
                     
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
                                    <td>{{ $tiquete->precio }}</td>
                                    <td>{{ $tiquete->puntoventa }}</td>
                                    <td>{{ $tiquete->vendedor }}</td>
                                    <td>{{ $tiquete->created_at}}</td>
                                    <td align=center>

                                      {!!link_to_route('admin.tiquete.imprimir', $title = '', $parameters = $tiquete->id, 
                                               $attributes = ['class' => 'btn btn-warning glyphicon glyphicon-print btn-circle-xs btn-sm'])!!}

                                     
                                     </td>
                     
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