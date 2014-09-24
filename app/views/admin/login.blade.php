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
		<div class="container-fluid">
			<section class="well well-lg col-md-4 col-md-offset-4 login">
				{{ Form::open(array('url' => '', 'role' => 'form')) }}
					<div class="form-group">
						{{ Form::label('username', 'Usuario') }}
						<div class="input-group">
							<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
							{{ Form::text('username', null, array('class' => 'form-control')) }}
						</div>
					</div>
					<div class="form-group">
						{{ Form::label('password', 'Contraseña') }}
						<div class="input-group">
							<div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
							{{ Form::password('password', array('class' => 'form-control')) }}
						</div>
					</div>
					<div class="form-group">
						{{ Form::submit('Entrar', array('class' => 'btn btn-primary')) }}
					</div>
				{{ Form::close() }}
			</section>

			<p class="col-md-4 col-md-offset-4 login-footer">
				<small class="text-muted">Desarrollado por <a href="http://pixsis.com"><img src="{{ asset('img/pixsis-mini.png') }}" alt="Pixsis" class="pixsis-mini-logo"></a></small>
			</p>
		</div>
	</body>
</html>