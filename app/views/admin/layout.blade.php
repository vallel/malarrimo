<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ $title or '' }}Panel de administración</title>

	{{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/admin.css') }}

    {{ HTML::script('js/jquery-1.11.1.min.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}

</head>
<body>

    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Malarrimo</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{ URL::to('admin/usuarios') }}">Usuarios</a></li>
                </ul>

                {{ Form::open(['route' => 'logout', 'class' => 'navbar-form navbar-right', 'role' => 'form']) }}
                    {{ Form::button('Cerrar sesión', ['class' => 'btn btn-danger', 'type' => 'submit']) }}
                {{ Form::close() }}
            </div>
        </div>
    </nav>

    <section class="container-fluid">

        @yield('content')

    </section>

</body>
</html>
