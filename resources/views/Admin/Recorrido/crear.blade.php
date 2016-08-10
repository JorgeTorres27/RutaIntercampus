@extends('Admin.panel')

@section('title','Crear recorrido')

@section('content')

<div id="page-wrapper" class="w3-card-5">

            <div class="container-fluid"> 

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Agregar <small class="text-success"> Recorridos</small></h1>
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

						{!! Form::open(['route' => 'admin.recorrido.store', 'method' => 'POST']) !!}

						<div class="form-group col-lg-2 has-success">
						{!! Form::label('id','Ruta asignada') !!}
						{!! Form::select('id', $rutas, null, ['class' => 'form-control', 'required','placeholder' => 'Seleccionar'])!!}
						</div>

						<div class="form-group col-lg-4 has-success">
							{!! Form::label('nombre','Nombre') !!}
							{!! Form::text('nombre',null, ['class' => 'form-control','placeholder' => 'Nombre recorrido', 'required']) !!}

						</div>

						<div class="form-group col-lg-2 has-success">
							{!! Form::label('hora_salida','Hora de salida') !!}
							{!! Form::text('hora_salida',null, ['class' => 'form-control','placeholder' => '00:00', 'required']) !!}

						</div>

						<div class="form-group col-lg-4 has-success">
							{!! Form::label('lugar_salida','Lugar de salida') !!}
							{!! Form::text('lugar_salida',null, ['class' => 'form-control','placeholder' => 'Lugar de salida', 'required']) !!}

						</div>

						<div class="form-group col-lg-2 has-success">
							{!! Form::label('hora_llegada','Hora de llegada') !!}
							{!! Form::text('hora_llegada',null, ['class' => 'form-control','placeholder' => '00:00', 'required']) !!}

						</div>

						<div class="form-group col-lg-4 has-success">
							{!! Form::label('lugar_llegada','Lugar de llegada') !!}
							{!! Form::text('lugar_llegada',null, ['class' => 'form-control','placeholder' => 'Lugar de llegada', 'required']) !!}

						</div>

						<div class="form-group col-lg-6 has-success">
							{!! Form::label('descripcion','Descripcion del recorrido') !!}
							{!! Form::text('descripcion',null, ['class' => 'form-control','placeholder' => 'Descripcion del recorrido', 'required']) !!}

						</div>

						<div class="form-group col-lg-2">
						{!! Form::submit('Agregar', ['class' => 'btn btn-success']) !!}
	

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
