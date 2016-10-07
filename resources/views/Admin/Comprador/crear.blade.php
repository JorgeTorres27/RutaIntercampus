@extends('Admin.panel')

@section('title','Crear compradores')

@section('content')

<div id="page-wrapper">

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

                        <div class="panel panel-green w3-card-4">
                        <div class="panel-heading">
                        <h3 class="panel-title"><strong>Formulario</strong></h3>
                        </div>
                        <div class="panel-body"> 

                         
                        <!-- Aqui van los formularios-->

						{!! Form::open(['route' => 'admin.comprador.store', 'method' => 'POST']) !!}

						<div class="form-group  col-lg-4 has-success">
						{!! Form::label('codigo','Codigo o cedula') !!}
						{!! Form::text('codigo',null, ['class' => 'form-control w3-card-4','placeholder' => 'T00027144 o C.C', 'required']) !!}

						</div>

						<div class="form-group  col-lg-4 has-success">
						{!! Form::label('nombrecompleto','Nombre completo') !!}
						{!! Form::text('nombrecompleto',null, ['class' => 'form-control w3-card-4','placeholder' => 'Nombres y Apellidos', 'required']) !!}

						</div>

						<div class="form-group col-lg-8 has-success">
						
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