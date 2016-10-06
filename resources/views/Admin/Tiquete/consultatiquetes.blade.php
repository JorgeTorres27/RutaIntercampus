@extends('Admin.panel')

@section('title','Consultar Tiquetes')

@section('content')

               

 <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">

                    

                    <div class="col-lg-12">
                       <h1 class="page-header">  <small class="text-warning">Consultar Tiquetes</small></h1>
                        
                           <!-- Buscador -->

                      {!! Form::open(['route' => 'admin.tiquete.consultartiquetes', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}

                      <div class="input-group has-warning">
                                 
                       {!! Form::select('idruta', $rutas, null, [ 'id'=>'ruta', 'class' => 'form-control input-sm','placeholder' => 'Seleccione una ruta'])!!}
                        
                      </div>

                      <div class="input-group has-warning">
            
                       {!! Form::select('idrecorrido', $recorridos, null, [ 'id'=>'recorrido', 'class' => 'form-control input-sm','placeholder' => 'Seleccione un recorrido'])!!}
                      </div>

                      <div class="input-group has-warning">

                        <div class="input-group has-warning">
                            {!! Form::text('codigo', $codigo, ['class' => 'form-control input-sm', 'placeholder' => 'Codigo', 
                            'aria-describedby' => 'codigo']) !!}
                            <span class="input-group-addon input-sm" id="codigo"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
                      </div>
                      </div>



                      <div class="input-group has-warning">
                            {!! Form::text('fechafiltro', $fechafiltro, ['class' => 'form-control input-sm', 'placeholder' => 'Fecha: DD-MM-YYYY', 
                            'aria-describedby' => 'fechafiltro']) !!}
                            <span class="input-group-addon input-sm" id="fechafiltro"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
                      </div>

                       <div class="input-group has-warning">
                        {!! Form::button('Consultar &nbsp;&nbsp; <span class="glyphicon glyphicon-search"></span>', array('class' => 'btn btn-warning btn-sm', 'type' => 'submit')) !!}
  

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

                      @if(Session::has('notiquetes'))
                    <div class="alert alert-dismissible alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <p> <strong> {{ Session::get('notiquetes') }} </strong> </p>
                   
                    </div>
                    @endif
                       
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
                                                  
                                  </tr>  

                                  @endforeach

                                  <tr>
    
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <th scope="row">Total ventas</th>
                                    <td> </td>
                                    <td> </td>
                                     <td align=left><strong>{{ $totalapagar }}</strong></td>
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