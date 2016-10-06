@extends('Admin.panel')

@section('title','Crear tiquete')

@section('content')

@if(Session::has('tiquetevendido'))
                    <div class="alert alert-dismissible alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <p> <strong> {{ Session::get('tiquetevendido') }} </strong> </p>
                   
                    </div>
                    @endif

                    @if(Session::has('nocupos'))
                    <div class="alert alert-dismissible alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <p> <strong> {{ Session::get('nocupos') }} </strong> </p>
                   
                    </div>
                    @endif

<div id="page-wrapper">

            <div class="container-fluid"> 

                <!-- Page Heading -->
                <div class="row"> 


                    
                      <div class="col-xs-4 app-cupo">
                         <div class="panel panel-green w3-card-4">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-bus fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">

                                       {{ Session::get('cuposruta') }}

                                        </div>
                                        
                                        <div> {{ Session::get('fecha') }} </div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">{{ Session::get('ruta') }} {{ Session::get('horarecorrido') }}  </span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <div class="col-xs-8 app-totalapagar">
                         <div class="panel panel-yellow w3-card-4">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-usd fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">

                                       {{ Session::get('totalapagar') }}

                                        </div>
                                        
                                        <div> {{ Session::get('mensajepago') }} </div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">  </span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>


                    <div class="col-lg-12">
                       
                        <ol class="breadcrumb">
                        <li>
                        <i class="fa fa-home text-success"></i> &nbsp; <a href="{{ route('admin.panel.index') }}">Inicio</a>
                        </li>
                        <li>
                        <i class="fa fa-user text-success"></i> &nbsp; <a href="{{ route('admin.compradores') }}"> Agregar nuevo usuario</a>
                        </li>
                        </ol>

                        <div class="panel panel-green w3-card-4">
                        <div class="panel-heading">
                        <h3 class="panel-title"><strong>Datos del tiquete a vender</strong></h3>
                        </div>
                        <div class="panel-body"> 

                        @if(Session::has('codigo'))
                        <p id="codigo" style="visibility:hidden">{{ Session::get('codigo') }}</p>
                        @endif

                         
                        <!-- Aqui van los datos del comprador-->

						{!! Form::open(['route' => 'admin.tiquete.store', 'method' => 'POST']) !!}

                         <div class="modal fade" id="myModal" role="dialog">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                              <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Confirmación de venta</h4>
                            </div>
                            <div class="modal-body">
                            <p>¿Desea vender el tiquete?</p>
                            </div>
                            <div class="modal-footer">

                            {!! Form::button('<span class="fa fa-check"></span>&nbsp;&nbsp;Confirmar', array('type'=>'submit', 'class' => 'btn btn-success btn-sm')) !!}

                            {!! Form::button('<span class="fa fa-times"></span>&nbsp;&nbsp;Cancelar', array('class' => 'btn btn-danger btn-sm','data-dismiss'=>'modal')) !!}
                            
                            </div>
                           </div>
                         </div>
                       </div>


                        <div class="form-group col-lg-4 has-success">
                            {!! Form::label('codigocomprador','Codigo comprador') !!}
                        <input type="text" name="codigocomprador" class="form-control w3-card-4" id="codigocomprador" placeholder="T00000000" value="{{old('codigocomprador')}}" required="required" style='text-transform:uppercase;'>          
                        
                        </div>
                       
                        <div class="form-group col-lg-8 has-success">
                            {!! Form::label('nombrecompleto','Nombre completo del comprador') !!}
                        <input type="text" name="nombrecompleto" class="form-control w3-card-4" id="nombrecompleto" placeholder="Fulanito De Tal" value="{{old('nombrecompleto')}}" style='text-transform:uppercase;'>
                        </div>

                        <!-- Aqui van los datos del vendedor-->

                        <div class="form-group col-lg-4 has-success">
                            {!! Form::label('cedulavendedor','Cedula vendedor') !!}
                        <input type="text" name="codigovendedor" value="{{Auth::user()->cedula}}" class="form-control w3-card-4" id="codigovendedor" placeholder="Cedula vendedor" readonly="readonly">
                        </div>
                       
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}" class="form-control w3-card-4" id="idvendedor" readonly="readonly">
                       
                        <div class="form-group col-lg-4 has-success">
                            {!! Form::label('nombres','Nombre del vendedor') !!}
                        <input type="text" name="nombres" value="{{Auth::user()->nombres}}" class="form-control w3-card-4" id="nombresvendedor" readonly="readonly" placeholder="Fulanito" style='text-transform:uppercase;'>
                        </div>
                        <div class="form-group col-lg-4 has-success">
                            {!! Form::label('apellidos','Apellidos del vendedor') !!}
                        <input type="text" name="apellidos" value="{{Auth::user()->apellidos}}" class="form-control w3-card-4" id="apellidosvendedor" readonly="readonly" placeholder="de Tal" style='text-transform:uppercase;'>
                        </div>
						

						<div class="form-group col-lg-3 has-success">
						{!! Form::label('ruta_id','Ruta') !!}
						{!! Form::select('ruta_id', $rutas, null, [ 'id'=>'ruta', 'class' => 'form-control w3-card-4', 'required','placeholder' => 'Seleccione una ruta'])!!}

						</div>

                        <div class="form-group col-lg-3 has-success">
                        {!! Form::label('recorrido_id','Recorrido') !!}
                        {!! Form::select('recorrido_id',['placeholder'=>'Seleccione un recorrido'],null,['id'=>'recorrido', 'class' => 'form-control w3-card-4', 'required'])!!}

                        </div>

                        <div class="form-group col-lg-3 has-success">
                        {!! Form::label('precio_id','Precio') !!}
                        {!! Form::select('precio_id',['placeholder'=>'Seleccione un precio'],null,['id'=>'precio', 'class' => 'form-control w3-card-4', 'required'])!!}

                        </div>

                        <div class="form-group col-lg-3 has-success">
                        {!! Form::label('bus_id','Bus') !!}
                        {!! Form::select('bus_id', ['placeholder'=>'Seleccione un bus'],null,['id'=>'bus','class' => 'form-control w3-card-4', 'required'])!!}

                        </div>

						<div class="form-group col-lg-3 has-success">
						{!! Form::label('fecha','Seleccione una fecha') !!}
	                    <input type="text" required="required" name="fecha" id="fecha" id="alternate"  class="form-control w3-card-4" autocomplete="off">
	                    </div>

	                    <div class="form-group col-lg-3 has-success">
	                    {!! Form::label('','Fecha seleccionada') !!}
	                    <input type="text" readonly="readonly" name='fechaseleccionada' id="alternate"  class="form-control w3-card-4">
	                    </div>

											

						<div class="form-group col-lg-3 has-success">
						{!! Form::label('puntoventa_id','Punto de venta') !!}
						{!! Form::select('puntoventa_id', $puntosventas, null, ['class' => 'form-control w3-card-4', 'required','placeholder' => 'Seleccionar'])!!}

						</div>

	                 	<div class="form-group col-lg-5">
                            <br>
						{!! Form::button('<span class="glyphicon glyphicon-send"></span>&nbsp;&nbsp;Vender Tiquete', array('class' => 'btn btn-success w3-card-4', 'data-toggle'=>'modal', 'data-target'=>'#myModal')) !!}
	
						</div>

                        <br>

                        <div class="form-group col-lg-5">
                            <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! Form::button('<span class="fa fa-clipboard"></span>', array('class' => 'btn btn-success btn-circle w3-card-4', 'onClick' => "copiarAlPortapapeles('codigo')", 'data-toggle' => 'tooltip', 'data-placement'=>'top', 'title'=>'Copiar codigo')) !!}
                        </div>

						<div class="form-group col-lg-2">
                            <br>
						&nbsp;&nbsp;&nbsp;&nbsp;{!! Form::button('<span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;&nbsp;Ir al carrito', array('class' => 'btn btn-success w3-card-4', 'onClick' => 'direccion()')) !!}
	
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