@extends('Admin.panel')

@section('title','Crear usuarios')

@section('content')


 <div id="page-wrapper">

            <div class="container-fluid">

                 @yield('content')  

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Agregar
                            <small class="text-success">Usuarios</small>
                        </h1>
                        <ol class="breadcrumb">
                        <li>
                        <i class="fa fa-home text-success"></i>  <a href="{{ route('admin.panel.index') }}">Inicio</a>
                        </li>
                            
                        </ol>

                        <div class="panel panel-green w3-card-5">
                        <div class="panel-heading">
                        <h3 class="panel-title"><strong>Formulario</strong></h3>
                        </div>
                        <div class="panel-body w3-card-4"> 

                         

                        <!-- Aqui van los formularios-->   

                        {!! Form::open(['route' => 'admin.usuario.store', 'method' => 'POST']) !!}

                        <div class="form-group col-lg-4 has-success">
	                    {!! Form::label('nombres','Nombres') !!}
	                     {!! Form::text('nombres',null, ['class' => 'form-control w3-card-4','placeholder' => 'Nombres', 'required']) !!}

                        </div>

                          <div class="form-group col-lg-4 has-success">
	                       {!! Form::label('apellidos','Apellidos') !!}
	                       {!! Form::text('apellidos',null, ['class' => 'form-control w3-card-4','placeholder' => 'Apellidos', 'required']) !!}

                        </div>

                        <div class="form-group col-lg-4 has-success">
	                       {!! Form::label('cedula','Cedula') !!}
	                       {!! Form::text('cedula',null, ['class' => 'form-control w3-card-4','placeholder' => 'Documento de identidad', 'required']) !!}

                        </div>

                        <div class="form-group col-lg-4 has-success">
                        	{!! Form::label('email','Correo') !!}
                        	{!! Form::email('email',null, ['class' => 'form-control w3-card-4','placeholder' => 'usuario@unitecnologica.edu.co', 'required']) !!}

                        </div>

                        <div class="form-group col-lg-4 has-success">
                        	{!! Form::label('password','Contraseña') !!}
                        	{!! Form::password('password', ['class' => 'form-control w3-card-4','placeholder' => '***********', 'required']) !!}

                        </div>
                        <div class="form-group col-lg-4 has-success">
                        {!! Form::label('rol','Rol') !!}
                        {!! Form::select('rol', $roles, null, ['class' => 'form-control w3-card-4', 'required','placeholder' => 'Seleccione un rol'])!!}

                        </div>



                        <div class="form-group col-lg-4">
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