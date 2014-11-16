@extends('admin/layout')

@section('content')

    <h1 class="section-header">Crear usuario</h1>

    {{ Form::open(['route' => 'createUser', 'role' => 'form']) }}
        <div class="form-group">
            {{ Form::label('userName', 'Nombre') }}
            {{ Form::text('userName', null, ['class' => 'form-control']) }}
            @if ($errors->has('userName'))
                <p class="text-danger">{{ $errors->first('userName') }}</p>
            @endif
        </div>

        <div class="form-group">
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email', null, ['class' => 'form-control']) }}
            @if ($errors->has('email'))
                <p class="text-danger">{{ $errors->first('email') }}</p>
            @endif
        </div>

        <div class="form-group">
            {{ Form::label('password', 'Contraseña') }}
            {{ Form::password('password', ['class' => 'form-control']) }}
            @if ($errors->has('password'))
                <p class="text-danger">{{ $errors->first('password') }}</p>
            @endif
        </div>

        <div class="form-group">
            {{ Form::label('password_confirmation', 'Confirme la contraseña') }}
            {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
            @if ($errors->has('password_confirmation'))
                <p class="text-danger">{{ $errors->first('password_confirmation') }}</p>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    {{ Form::close() }}

@endsection