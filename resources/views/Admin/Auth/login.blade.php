<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Iniciar Sesión</title>

    {!! Html::style('css/bootstrap.min.css') !!}
    {!! Html::style('css/jquery-ui-1.7.2.custom.css') !!}
    {!! Html::style('css/main.css') !!}
    {!! Html::style('css/sb-admin.css') !!}
    {!! Html::style('css/plugins/morris.css') !!}
    {!! Html::style('font-awesome/css/font-awesome.min.css') !!}


</head>

<body>
    <div class="container">

        <div class="row">
            <div class="panel-sesion col-md-4 col-md-offset-4">
                @include('Alertas.error')
                @include('Alertas.request')
               
                <div class=" panel panel-green">
                    <div class="panel-heading">
                        <p class="app-panel-login">Ruta Intercampus<br>
                <small class="app-panel-login">Universidad Tecnologica de Bolivar</small></p>
                
                    </div>
                    <div class="panel-body">

                        {!! Form::open(['route' => 'admin.iniciarsesion.store','method' => 'POST']) !!}
                        
                            
                            <fieldset>
                                
                                <div class="form-group has-success">
                                 {!! Form::label('correo','Correo') !!}
                                 {!!Form::email('email',null,['class'=>'form-control w3-card-4',
                                 'placeholder'=>'usuario@unitecnologica.edu.co'])!!}
                                </div>
                                
                                <div class="form-group has-success">
                                {!! Form::label('password','Contraseña') !!}
                            {!!Form::password('password', ['class' => 'form-control w3-card-4','placeholder' => '***********'])!!}
                                </div>
                                
                                <!-- Change this to a button or input when using this as a form -->
                                <div class="form-group col-md-offset">
                                    {!! Form::submit('Iniciar sesión', ['class' => 'btn btn-success w3-card-4 col-xs-12 col-md-12']) !!}
                                
                               </div>
                            </fieldset>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {!! Html::script('js/jquery.js') !!}
    {!! Html::script('js/jquery-ui.js') !!}
    {!! Html::script('js/bootstrap.min.js') !!}
    {!! Html::script('js/calendario.js') !!}
    {!! Html::script('js/plugins/morris/raphael.min.js') !!}
    {!! Html::script('js/plugins/morris/morris.min.js') !!}
    {!! Html::script('js/plugins/morris/morris-data.js') !!}


</body>

<script>
$('div.alert').not('.alert-important').delay(4000).fadeOut(350);
</script>

</html>

