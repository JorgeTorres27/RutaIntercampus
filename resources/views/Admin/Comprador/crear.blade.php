@extends('Admin.panel')

@section('title','Crear compradores')

@section('content')

<div id="page-wrapper" class="w3-card-5">

            <div class="container-fluid"> 

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Agregar <small class="text-success"> Compradores</small></h1>
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

						{!! Form::open(['route' => 'admin.comprador.store', 'method' => 'POST']) !!}

						<div class="form-group  col-lg-4 has-success">
						{!! Form::label('codigo','Codigo') !!}
						{!! Form::text('codigo',null, ['class' => 'form-control','placeholder' => 'T00027144', 'required']) !!}

						</div>

						<div class="form-group  col-lg-4 has-success">
						{!! Form::label('nombre','Nombre') !!}
						{!! Form::text('nombre',null, ['class' => 'form-control','placeholder' => 'Nombres', 'required']) !!}

						</div>

						<div class="form-group col-lg-4 has-success">
						{!! Form::label('apellidos','Apellidos') !!}
						{!! Form::text('apellidos',null, ['class' => 'form-control','placeholder' => 'Apellidos', 'required']) !!}

						</div>

						<div class="form-group col-lg-4 has-success">
						{!! Form::label('tipo_doc','Tipo de documento') !!}
						{!! Form::select('tipo_doc', ['CC' => 'Cedula', 'TI' => 'Tarjeta de identidad'],null, ['class' => 'form-control','placeholder' => 'Seleccione un tipo de Documento']) !!}

						</div>

						<div class="form-group col-lg-4 has-success">
						{!! Form::label('cedula','Cedula') !!}
						{!! Form::text('cedula',null, ['class' => 'form-control','placeholder' => 'Documento de identidad', 'required']) !!}

						</div>


						<div class="form-group col-lg-8 has-success">
						
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