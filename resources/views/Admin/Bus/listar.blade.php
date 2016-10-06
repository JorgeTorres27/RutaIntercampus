@extends('Admin.panel')

@section('title','listado de buses')

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
                       <h1 class="page-header">Listado <small class="text-success">de buses</small></h1>
                        
                        <ol class="breadcrumb">
                        <li>
                        <i class="fa fa-home text-success"></i>  <a href="{{ route('admin.panel.index') }}">Inicio</a>
                        </li>
                            
                        </ol>

                        <div class="panel panel-green w3-card-4">
                        <div class="panel-heading">
                        <h3 class="panel-title">Lista de Buses</h3>
                        </div>
                        <div class="panel-body"> 


                            <div class="row">
                    <div class="col-lg-12">
                       
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Placa</th>
                                        <th>Capacidad</th>
                                        <th>Empresa</th>
                                        
                                       

                                    </tr>
                                </thead>
                                <tbody >
                                    
                                  @foreach ($buses as $bus)

                                  <tr >

                                    <td>{{ $bus->id}}</td>
                                    <td>{{ $bus->placa}}</td>
                                    <td>{{ $bus->capacidad}}</td>
                                    <td>{{ $bus->empresa}}</td>
                                    
                                   

                                  </tr>  

                                  @endforeach
                                    
                                </tbody>
                            </table>
                            {!! $buses->render() !!}
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