<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Iniciar sesión | Panel de administración</title>
	
	{{ HTML::style('css/bootstrap.min.css') }}
	{{ HTML::style('css/admin.css') }}

</head>
	<body>
		<div class="container-fluid login">

			<section class="col-md-4 col-md-offset-4">

			    @if (Session::has('error'))
                    <p class="alert alert-danger">{{ Session::get('error') }}</p>
                @endif


                <div class="well well-lg login-form">
                    {{ Form::open(['route' => 'login', 'role' => 'form']) }}
                        <div class="form-group">
                            {{ Form::label('email', 'Email') }}
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                                {{ Form::text('email', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('password', 'Contraseña') }}
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                                {{ Form::password('password', ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::submit('Entrar', ['class' => 'btn btn-primary']) }}
                        </div>
                    {{ Form::close() }}
                </div>

			</section>

			<p class="col-md-4 col-md-offset-4 login-footer">
				<small class="text-muted">Desarrollado por <a href="http://pixsis.com"><img src="{{ asset('img/pixsis-mini.png') }}" alt="Pixsis" class="pixsis-mini-logo"></a></small>
			</p>
		</div>
	</body>
</html>