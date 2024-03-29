@extends('admin/layout')

@section('content')

    <h1 class="section-header">Crear usuario</h1>

    @if (Session::has('msg'))
        {{ Session::get('msg') }}
    @endif

    @if (isset($user))
    {{ Form::model($user, ['route' => ['updateUser', $user->id], 'role' => 'form']) }}
    @else
    {{ Form::open(['route' => 'createUser', 'role' => 'form']) }}
    @endif

        {{ Field::text('user_name', 'Nombre') }}

        {{ Field::email('email', 'Email') }}

        {{ Field::password('password', 'Contraseña') }}

        {{ Field::password('password_confirmation', 'Confirme la contraseña') }}

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    {{ Form::close() }}

@endsection