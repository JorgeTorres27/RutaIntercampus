@extends('Admin.panel')

@section('title','Crear buses')

@section('content')

<div id="page-wrapper">

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

                        <div class="panel panel-green w3-card-4">
                        <div class="panel-heading">
                        <h3 class="panel-title"><strong>Formulario</strong></h3>
                        </div>
                        <div class="panel-body"> 

                         
                        <!-- Aqui van los formularios-->

						{!! Form::open(['route' => 'admin.bus.store', 'method' => 'POST']) !!}


						<div class="form-group col-lg-2 has-success">
						{!! Form::label('placa','Placa') !!}
						{!! Form::text('placa',null, ['class' => 'form-control w3-card-4','placeholder' => 'UTB 01', 'required']) !!}

						</div>

						<div class="form-group col-lg-2 has-success">
						{!! Form::label('capacidad','Capacidad') !!}
						{!! Form::text('capacidad',null, ['class' => 'form-control w3-card-4','placeholder' => '30', 'required']) !!}

						</div>

						<div class="form-group col-lg-4 has-success">
						{!! Form::label('empresa','Empresa') !!}
						{!! Form::text('empresa',null, ['class' => 'form-control w3-card-4','placeholder' => 'Empresa', 'required']) !!}

						</div>

						<div class="form-group col-lg-2 has-success">
						{!! Form::label('ruta_id','Ruta') !!}
						{!! Form::select('ruta_id', $rutas, null, ['class' => 'form-control w3-card-4', 'required','placeholder' => 'Seleccionar'])!!}

						</div>


						<div class="form-group col-lg-10 has-success">
						{!! Form::submit('Agregar', ['class' => 'btn btn-success w3-card-4']) !!}	

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