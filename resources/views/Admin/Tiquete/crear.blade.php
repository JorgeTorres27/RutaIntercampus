@extends('Admin.panel')

@section('title','Crear tiquete')

@section('content')

<div id="page-wrapper">

            <div class="container-fluid"> 

                <!-- Page Heading -->
                <div class="row">

                	@if($bus1->capacidad > 10)
                    
                        <div class="col-xs-4 app-cupo">
                         <div class="panel panel-green w3-card-4">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-bus fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{$bus1->capacidad}}</div>
                                        <div>Cupos disponibles!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">RUTA 1</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    @else

                     <div class="col-xs-4 app-cupo">
                         <div class="panel panel-red w3-card-4">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-bus fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{$bus1->capacidad}}</div>
                                        <div>Cupos disponibles!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">RUTA 1</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>



                    @endif

                    @if($bus2->capacidad > 10)
                    
                        <div class="col-xs-4 app-cupo">
                         <div class="panel panel-green w3-card-4">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-bus fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{$bus2->capacidad}}</div>
                                        <div>Cupos disponibles!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">RUTA 2</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    @else

                     <div class="col-xs-4 app-cupo">
                         <div class="panel panel-red w3-card-4">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-bus fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{$bus2->capacidad}}</div>
                                        <div>Cupos disponibles!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">RUTA 2</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>



                    @endif

                    @if($bus3->capacidad > 10)
                    
                        <div class="col-xs-4 app-cupo">
                         <div class="panel panel-green w3-card-4">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-bus fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{$bus3->capacidad}}</div>
                                        <div>Cupos disponibles!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">RUTA 3</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    @else

                     <div class="col-xs-4 app-cupo">
                         <div class="panel panel-red w3-card-4">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-bus fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{$bus3->capacidad}}</div>
                                        <div>Cupos disponibles!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">RUTA 3</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>



                    @endif


                    <div class="col-lg-12">
                       
                        <ol class="breadcrumb">
                        <li>
                        <i class="fa fa-home text-success"></i>  <a href="{{ route('admin.panel.index') }}">Inicio</a>
                        </li>
                        </ol>

                        <div class="panel panel-green w3-card-5">
                        <div class="panel-heading">
                        <h3 class="panel-title"><strong>Datos del tiquete a vender</strong></h3>
                        </div>
                        <div class="panel-body"> 

                         
                        <!-- Aqui van los datos del comprador-->

						{!! Form::open(['route' => 'admin.tiquete.store', 'method' => 'POST']) !!}

                        <div class="form-group col-lg-3 has-success">
                            {!! Form::label('codigocomprador','Codigo comprador') !!}
                        <input type="text" name="codigocomprador" class="form-control w3-card-4" id="codigocomprador" placeholder="T00000000">
                        </div>
                        <div class="form-group has-success">
                            
                        <input type="hidden" name="comprador_id" class="form-control w3-card-4" id="id" readonly="readonly">
                        </div>
                        <div class="form-group col-lg-4 has-success">
                            {!! Form::label('nombre','Nombre del comprador') !!}
                        <input type="text" name="nombre" class="form-control w3-card-4" id="nombre" readonly="readonly" placeholder="Fulanito">
                        </div>
                        <div class="form-group col-lg-4 has-success">
                            {!! Form::label('apellidos','Apellidos del comprador') !!}
                        <input type="text" name="apellidos" class="form-control w3-card-4" id="apellidos" readonly="readonly" placeholder="de Tal">
                        </div>

                        <!-- Aqui van los datos del vendedor-->

                        <div class="form-group col-lg-3 has-success">
                            {!! Form::label('cedulavendedor','Cedula vendedor') !!}
                        <input type="text" name="codigovendedor" value="{{Auth::user()->cedula}}" class="form-control w3-card-4" id="codigovendedor" placeholder="Cedula vendedor" readonly="readonly">
                        </div>
                        <div class="form-group has-success">
                            
                        <input type="hidden" name="user_id" class="form-control w3-card-4" id="idvendedor" readonly="readonly">
                        </div>
                        <div class="form-group col-lg-4 has-success">
                            {!! Form::label('nombres','Nombre del vendedor') !!}
                        <input type="text" name="nombres" value="{{Auth::user()->nombres}}" class="form-control w3-card-4" id="nombresvendedor" readonly="readonly" placeholder="Fulanito">
                        </div>
                        <div class="form-group col-lg-4 has-success">
                            {!! Form::label('apellidos','Apellidos del vendedor') !!}
                        <input type="text" name="apellidos" value="{{Auth::user()->apellidos}}" class="form-control w3-card-4" id="apellidosvendedor" readonly="readonly" placeholder="de Tal">
                        </div>
						

						<div class="form-group col-lg-3 has-success">
						{!! Form::label('ruta_id','Ruta') !!}
						{!! Form::select('ruta_id', $rutas, null, ['class' => 'form-control w3-card-4', 'required','placeholder' => 'Seleccione una ruta'])!!}

						</div>

						<div class="form-group col-lg-3 has-success">
						{!! Form::label('recorrido_id','Recorrido') !!}
						{!! Form::select('recorrido_id', $recorridos, null, ['class' => 'form-control w3-card-4', 'required','placeholder' => 'Seleccione un recorrido'])!!}

						</div>

						<div class="form-group col-lg-3 has-success">
						{!! Form::label('fecha','Seleccione una fecha') !!}
	                    <input type="text" name="fecha" id="fecha" id="alternate" readonly="readonly" class="form-control w3-card-4" />
	                    </div>

	                    <div class="form-group col-lg-3 has-success">
	                    {!! Form::label('','Fecha seleccionada') !!}
	                    <input type="text" id="alternate" readonly="readonly" class="form-control w3-card-4">
	                    </div>

						<div class="form-group col-lg-3 has-success">
						{!! Form::label('bus_id','Bus') !!}
						{!! Form::select('bus_id', $buses, null, ['class' => 'form-control w3-card-4', 'required','placeholder' => 'Seleccione un bus'])!!}

						</div>

						<div class="form-group col-lg-3 has-success">
						{!! Form::label('precio_id','Precio') !!}
						{!! Form::select('precio_id', $precios, null, ['class' => 'form-control w3-card-4', 'required','placeholder' => 'Seleccione un precio'])!!}

						</div>

						<div class="form-group col-lg-3 has-success">
						{!! Form::label('puntoventa_id','Punto de venta') !!}
						{!! Form::select('puntoventa_id', $puntosventas, null, ['class' => 'form-control w3-card-4', 'required','placeholder' => 'Seleccionar'])!!}

						</div>

	                 	<div class="form-group col-lg-10">
						{!! Form::submit('Vender Tiquete', ['class' => 'btn btn-success w3-card-4']) !!}
	
						</div>

						<div class="form-group col-lg-2">
						{!! Form::reset('Limpiar campos', ['class' => 'btn btn-warning w3-card-4']) !!}
	
						</div>


						<!-- Fin del formulario -->

                        </div>

                     </div>

                  </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>




@endsection