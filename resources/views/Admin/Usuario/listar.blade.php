@extends('Admin.panel')

@section('title','listado de usuarios')

@section('content')




@include('flash::message')
                            
                        

 <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">

                    

                    <div class="col-lg-12">
                       <h1 class="page-header">Listado <small class="text-success">de usuarios</small></h1>
                        
                        <ol class="breadcrumb">
                        <li>
                        <i class="fa fa-home text-success"></i>  <a href="{{ route('admin.panel.index') }}">Inicio</a>
                        </li>
                            
                        </ol>

                        <div class="panel panel-green w3-card-4">
                        <div class="panel-heading">
                        <h3 class="panel-title">Lista de usuarios</h3>
                        </div>
                        <div class="panel-body"> 


                            <div class="row">
                    <div class="col-lg-12">
                       
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th class="app-datos1">Rol</th>
                                        <th>Correo</th>
                                        <th>Cedula</th>
                                        <th>Creado</th>
                                        <th>Actualizado</th>
                                        <th class="app-datos1">Accion</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    
                                  @foreach ($usuarios as $usuario)

                                  <tr>

                                    <td>{{ $usuario->id}}</td>
                                    <td>{{ $usuario->nombres}}</td>
                                    <td>{{ $usuario->apellidos}}</td>
                                    <td class="app-datos1">
                                        @if( $usuario->rol == 1)
                                        <span class="btn btn-info btn-xs">Administrador</span>
                                        @else
                                        <span class="btn btn-primary btn-xs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vendedor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                        @endif

                                    </td>
                                    <td>{{ $usuario->email}}</td>
                                    <td>{{ $usuario->cedula}}</td>
                                    <td>{{ $usuario->created_at}}</td>
                                    <td>{{ $usuario->updated_at}}</td>
                                    <td class="app-datos1">
                                    {!!link_to_route('admin.usuario.edit', $title = 'Editar', $parameters = $usuario->id, $attributes = ['class' => 'btn btn-warning btn-xs'])!!}

                                    </td>

                                  </tr>  

                                  @endforeach
                                    
                                </tbody>
                            </table>
                            {!! $usuarios->render() !!}
                        </div>
                    </div>
                   
                </div>

                         

                        <!-- Aqui van los formularios-->   

                        

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