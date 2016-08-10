@extends('Admin.panel')

@section('title','Crear buses')

@section('content')

<div id="page-wrapper" class="w3-card-5">

            <div class="container-fluid"> 

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Agregar <small class="text-success"> Buses</small></h1>
                        <ol class="breadcrumb">
                        <li>
                        <i class="fa fa-home text-success"></i>  <a href="{{ route('admin.panel.index') }}">Inicio</a>
                        </li>
                        </ol>

                        <div class="panel panel-green">
                        <div class="panel-heading">
                        <h3 class="panel-title"><strong>Formulario</strong></h3>
                        </div>
                        <div class="panel-body"> 

                         
                        <!-- Aqui van los formularios-->

						{!! Form::open(['route' => 'admin.bus.store', 'method' => 'POST']) !!}


						<div class="form-group col-lg-2 has-success">
						{!! Form::label('placa','Placa') !!}
						{!! Form::text('placa',null, ['class' => 'form-control','placeholder' => 'UTB 01', 'required']) !!}

						</div>

						<div class="form-group col-lg-2 has-success">
						{!! Form::label('capacidad','Capacidad') !!}
						{!! Form::text('capacidad',null, ['class' => 'form-control','placeholder' => '30', 'required']) !!}

						</div>

						<div class="form-group col-lg-4 has-success">
						{!! Form::label('empresa','Empresa') !!}
						{!! Form::text('empresa',null, ['class' => 'form-control','placeholder' => 'Empresa', 'required']) !!}

						</div>

						<div class="form-group col-lg-2 has-success">
						{!! Form::label('id','Ruta') !!}
						{!! Form::select('id', $rutas, null, ['class' => 'form-control', 'required','placeholder' => 'Seleccionar'])!!}

						</div>


						<div class="form-group col-lg-10 has-success">
						{!! Form::submit('Agregar', ['class' => 'btn btn-success']) !!}	

						</div>

						<!-- Fin del formulario -->

                        {!! Form::select('rutas',$rutas,null,['id'=>'rutas']) !!}

                        {!! Form::select('buses',['placeholder'=>'selecione'],null,['id'=>'buses']) !!}

                        </div>

                    </div>

                  </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>


@endsection