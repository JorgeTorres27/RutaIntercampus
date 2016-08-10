@extends('Admin.panel')

@section('title','Editar usuario '. $usuario->nombre)

@section('content')


 <div id="page-wrapper" class="w3-card-5">

            <div class="container-fluid">

                 @yield('content')  

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Editar - Eliminar <small class="text-success">usuario ({{$usuario->nombres}} {{$usuario->apellidos}})</small></h1>
                        <ol class="breadcrumb">
                        <li>
                        <i class="fa fa-home text-success"></i>  <a href="{{ route('admin.panel.index') }}">Inicio</a>
                        </li>
                            
                        </ol>

                        <div class="panel panel-green">
                        <div class="panel-heading">
                        <h3 class="panel-title"><strong>Editar usuario</strong></h3>
                        </div>
                        <div class="panel-body"> 

                         

                        <!-- Aqui van los formularios-->   

                        {!! Form::open(['route' => ['admin.usuario.update', $usuario], 'method' => 'PUT']) !!}

                        <div class="form-group col-lg-4 has-success">
	                    {!! Form::label('nombres','Nombre') !!}
	                     {!! Form::text('nombres',$usuario->nombres, ['class' => 'form-control','placeholder' => 'Nombres', 'required']) !!}

                        </div>

                          <div class="form-group col-lg-4 has-success">
	                       {!! Form::label('apellidos','Apellidos') !!}
	                       {!! Form::text('apellidos',$usuario->apellidos, ['class' => 'form-control','placeholder' => 'Apellidos', 'required']) !!}

                        </div>

                        <div class="form-group col-lg-4 has-success">
	                       {!! Form::label('cedula','Cedula') !!}
	                       {!! Form::text('cedula',$usuario->cedula, ['class' => 'form-control','placeholder' => 'Documento de identidad', 'required']) !!}

                        </div>

                        <div class="form-group col-lg-4 has-success">
                        	{!! Form::label('email','Usuario') !!}
                        	{!! Form::text('email',$usuario->email, ['class' => 'form-control','placeholder' => 'Usuario', 'required']) !!}

                        </div>

                    
                        <div class="form-group col-lg-4 has-success">
                        {!! Form::label('rol','Rol') !!}
                        {!! Form::select('rol', $roles, $usuario->rol, ['class' => 'form-control', 'required','placeholder' => 'Seleccione un rol'])!!}

                        </div>



                        <div class="form-group col-lg-10">
	                       {!! Form::submit('Actualizar', ['class' => 'btn btn-warning w3-card-4']) !!}
                           {!! Form::close() !!}
                        </div>
                        <div class="form-group col-lg-2">
                           {!!link_to_route('admin.usuario.eliminar', $title = 'Eliminar usuario', $parameters = $usuario->id, $attributes = ['class' => 'btn btn-danger w3-card-4'])!!}
	

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