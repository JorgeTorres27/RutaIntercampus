@extends('Admin.panel')

@section('title','Crear punto de venta')


@section('content')

<div id="page-wrapper" class="w3-card-5">

            <div class="container-fluid"> 

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Agregar <small class="text-success"> Puntos de ventas</small></h1>
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



						{!! Form::open(['route' => 'admin.puntoventa.store', 'method' => 'POST']) !!}


						<div class="form-group col-lg-4 has-success">
						{!! Form::label('campus','Campus') !!}
						{!! Form::text('campus',null, ['class' => 'form-control','placeholder' => 'Manga o Ternera', 'required']) !!}

						</div>

						<div class="form-group col-lg-10 has-success">
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