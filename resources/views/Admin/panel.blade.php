<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

   <title>@yield('title')</title>

   <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <!--<link href="css/bootstrap.min.css" rel="stylesheet"> -->
    {!! Html::style('css/bootstrap.min.css') !!}
    {!! Html::style('css/jquery-ui-1.7.2.custom.css') !!}
    {!! Html::style('css/main.css') !!}

    <!-- Custom CSS -->
    <!--<link href="css/sb-admin.css" rel="stylesheet"> -->
    {!! Html::style('css/sb-admin.css') !!}

    <!-- Morris Charts CSS -->
    <!--<link href="css/plugins/morris.css" rel="stylesheet">-->
    {!! Html::style('css/plugins/morris.css') !!}

    <!-- Custom Fonts -->
    <!--<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">-->
    {!! Html::style('font-awesome/css/font-awesome.min.css') !!}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand app-datos1" href="{{ route('admin.panel.index') }}">Ruta Intercampus<br>
                <small class="text-success app-datos">Universidad Tecnologica de Bolivar</small>
                </a>
            </div>
            <!-- Top Menu Items -->
            
            <ul class="nav navbar-right top-nav">                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <!--<IMG SRC="../img/user.png">-->  Binvenido (a) {!!Auth::user()->nombres!!} {!!Auth::user()->apellidos!!} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Perfil</a>
                        </li>
                        <li>
                            <a href="https://login.microsoftonline.com/?whr=unitecnologica.edu.co"><i class="fa fa-fw fa-envelope"></i> Correo</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Configuración</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout"><i class="fa fa-fw fa-sign-out"></i> Cerrar sesión</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
           
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    @if(Auth::user()->rol == 1)
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#usuarios"><i class="fa fa-user"></i>&nbsp;&nbsp;Usuarios</a>
                        <ul id="usuarios" class="collapse">
                            <li>
                                <a href="{{ route('admin.usuarios') }}"><i class="fa fa-user-plus text-success"></i>&nbsp;Agregar</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.usuario.index') }}"><i class="fa fa-list-alt text-primary"></i>&nbsp;&nbsp;Listar</a>
                            </li>
                           
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#roles"><i class="fa fa-user-md"></i>&nbsp;&nbsp;Roles</a>
                        <ul id="roles" class="collapse">
                            <li>
                            <a href="{{ route('admin.roles') }}"><i class="glyphicon glyphicon-plus text-success"></i>&nbsp;&nbsp;Agregar</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.rol.index') }}"><i class="fa fa-list-alt text-primary"></i>&nbsp;&nbsp;Listar</a>
                            </li>
                            
                        </ul>
                    </li>
                     <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#rutas"><i class="fa fa-map-marker"></i>&nbsp;&nbsp; Rutas</a>
                        <ul id="rutas" class="collapse">
                            <li>
                            <a href="{{ route('admin.rutas') }}"><i class="glyphicon glyphicon-plus text-success"></i>&nbsp;&nbsp;Agregar</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.ruta.index') }}"><i class="fa fa-list-alt text-primary"></i>&nbsp;&nbsp;Listar</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#buses"><i class="fa fa-bus"></i>&nbsp;&nbsp;Buses</a>
                        <ul id="buses" class="collapse">
                            <li>
                                <a href="{{ route('admin.buses') }}"><i class="glyphicon glyphicon-plus text-success"></i>&nbsp;&nbsp;Agregar</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.bus.index') }}"><i class="fa fa-list-alt text-primary"></i>&nbsp;&nbsp;Listar</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#recorridos"><i class="fa fa-road"></i>&nbsp;Recorridos</a>
                        <ul id="recorridos" class="collapse">
                            <li>
                            <a href="{{ route('admin.recorridos') }}"><i class="glyphicon glyphicon-plus text-success"></i>&nbsp;&nbsp;Agregar</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.recorrido.index') }}"><i class="fa fa-list-alt text-primary"></i>&nbsp;&nbsp;Listar</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#precios"><i class="fa fa-money"></i>&nbsp;&nbsp;Precios</a>
                        <ul id="precios" class="collapse">
                            <li>
                            <a href="{{ route('admin.precios') }}"><i class="glyphicon glyphicon-plus text-success"></i>&nbsp;&nbsp;Agregar</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.precio.index') }}"><i class="fa fa-list-alt text-primary"></i>&nbsp;&nbsp;Listar</a>
                            </li>
                           
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#puntoventa"><i class="fa fa-building"></i>&nbsp;&nbsp; Puntos de ventas</a>
                        <ul id="puntoventa" class="collapse">
                            <li>
                            <a href="{{ route('admin.puntosventas') }}"><i class="glyphicon glyphicon-plus text-success"></i>&nbsp;&nbsp;Agregar</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.puntoventa.index') }}"><i class="fa fa-list-alt text-primary"></i>&nbsp;&nbsp;Listar</a>
                            </li>
                            
                        </ul>
                    </li>
                    @endif
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#compradores"><i class="fa fa-users"></i>&nbsp;&nbsp;Compradores</a>
                        <ul id="compradores" class="collapse">
                            <li>
                                <a href="{{ route('admin.compradores') }}"><i class="glyphicon glyphicon-plus text-success"></i>&nbsp;&nbsp;Agregar</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.comprador.index') }}"><i class="fa fa-list-alt text-primary"></i>&nbsp;&nbsp;Listar</a>
                            </li>
                            
                        </ul>
                    </li>
                     
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#tiquetes"><i class="fa fa-ticket"></i>&nbsp;&nbsp;Tiquetes</a>
                        <ul id="tiquetes" class="collapse">
                            <li>
                                <a href="{{ route('admin.tiquetes') }}"><i class="glyphicon glyphicon-plus text-success"></i>&nbsp;&nbsp;Vender Tiquetes</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.tiquete.index') }}"><i class="fa fa-list-alt text-primary"></i>&nbsp;&nbsp;Ver Tiquetes</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.tiquete.consultartiquetes') }}"><i class="fa fa-search text-warning"></i>&nbsp;&nbsp;Consultar Tiquetes</a>
                            </li>
                                                        
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#carritodecompras"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;Carrito de compras</a>
                        <ul id="carritodecompras" class="collapse">
                           
                            <li>
                                <a href="{{ route('admin.tiquete.carritodecompras') }}"><i class="fa fa-money text-success"></i>&nbsp;&nbsp;Pagos e impresión&nbsp; <i class="glyphicon glyphicon-print text-warning"></i></a>
                            </li>
                                                        
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#imprimirduplicados"><i class="glyphicon glyphicon-print"></i>&nbsp;&nbsp;Duplicados de Tiquetes</a>
                        <ul id="imprimirduplicados" class="collapse">
                            
                            <li>
                                <a href="{{ route('admin.tiquete.imprimirduplicados') }}"><i class="fa fa-print"></i>&nbsp;&nbsp;Imprimir Duplicados</a>
                            </li>
                            
                        </ul>
                    </li>

                      <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#anulartiquetes"><i class="fa fa-ban"></i>&nbsp;&nbsp;Anular Tiquetes</a>
                        <ul id="anulartiquetes" class="collapse">
                            
                            <li>
                                <a href="{{ route('admin.tiquete.anulartiquetes') }}"><i class="fa fa-trash text-danger"></i>&nbsp;&nbsp;Anular Tiquetes</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.tiquete.tiquetesanulados') }}"><i class="fa fa-list-alt text-primary"></i>&nbsp;&nbsp;Tiquetes Anulados</a>
                            </li>
                            
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#reportes"><i class="fa fa-bar-chart"></i>&nbsp;&nbsp;Reportes</a>
                        <ul id="reportes" class="collapse">
                            
                            <li>
                                <a href="{{ route('admin.exportarventashoy') }}"><i class="fa fa-line-chart text-warning"></i>&nbsp;&nbsp;Reporte diario</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.exportarventasgeneral') }}"><i class="fa fa-pie-chart text-success"></i>&nbsp;&nbsp;Reporte general</a>
                            </li>
                           
                            
                        </ul>
                    </li>
                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
           
        </nav>

        <!-- Aqui va el contenido -->

        

         @yield('content')
         @include ('Alertas.error');





         <!-- Fin del contenido-->


    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    
    {!! Html::script('js/jquery.js') !!}
    {!! Html::script('js/jquery-ui.js') !!}
    <!--<script src="js/jquery.js"></script>-->
    <!--{!! Html::script('js/jquery.js') !!}-->
    

    <!-- Bootstrap Core JavaScript -->
   <!-- <script src="js/bootstrap.min.js"></script>-->
    {!! Html::script('js/bootstrap.min.js') !!}
    {!! Html::script('js/calendario.js') !!}
    {!! Html::script('js/dropdown.js') !!}
    

    

    <!-- Morris Charts JavaScript -->
    <!--<script src="js/plugins/morris/raphael.min.js"></script>-->
   

    <!--<script src="js/plugins/morris/morris.min.js"></script>-->
   

    <!--<script src="js/plugins/morris/morris-data.js"></script>-->
    

    

    

</body>

<script>
$('div.alert').not('.alert-important').delay(4000).fadeOut(350);
</script>

<script type="text/javascript">
$('#codigocomprador').autocomplete({
    source : '{!!URL::route('autocompletarcomprador')!!}',
    minLength:6,
    autoFocus:true,
    select:function(e,ui){
        $('#id').val(ui.item.id);
        $('#nombrecompleto').val(ui.item.nombrecompleto);
        
    }
})

</script>

<script>
function direccion(){
location.href="{{URL::to('admin/carritodecompras')}}";
}
</script>

<script type="text/javascript">
function copiarAlPortapapeles(id_elemento) {
  var aux = document.createElement("input");
  aux.setAttribute("value", document.getElementById(id_elemento).innerHTML);
  document.body.appendChild(aux);
  aux.select();
  document.execCommand("copy");
  document.body.removeChild(aux);
}

</script>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>

</html>