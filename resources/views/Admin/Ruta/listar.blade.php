@extends('Admin.panel')

@section('title','listado de rutas')

@section('content')

@if(Session::has('mensaje'))
<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <br>
  <strong> {{ Session::get('mensaje') }}</strong>
  <br>
  <br>
</div>
@endif                        
                        

 <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">

                    

                    <div class="col-lg-12">
                       <h1 class="page-header">Listado <small class="text-success">de rutas</small></h1>
                        
                        <ol class="breadcrumb">
                        <li>
                        <i class="fa fa-home text-success"></i>  <a href="{{ route('admin.panel.index') }}">Inicio</a>
                        </li>
                            
                        </ol>

                        <div class="panel panel-green w3-card-4">
                        <div class="panel-heading">
                        <h3 class="panel-title">Lista de Rutas</h3>
                        </div>
                        <div class="panel-body"> 


                            <div class="row">
                    <div class="col-lg-12">
                       
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        
                                       

                                    </tr>
                                </thead>
                                <tbody >
                                    
                                  @foreach ($rutas as $ruta)

                                  <tr >

                                    <td>{{ $ruta->id}}</td>
                                    <td>{{ $ruta->nombre}}</td>
                                    
                                   

                                  </tr>  

                                  @endforeach
                                    
                                </tbody>
                            </table>
                            {!! $rutas->render() !!}
                        </div>
                    </div>
                   
                </div>


                </div>

                    </div>

                 </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>


@endsection