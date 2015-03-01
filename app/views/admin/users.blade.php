@extends('admin/layout')

@section('content')

    <h1 class="section-header">Usuarios</h1>

    @if (Session::has('msg'))
        {{ Session::get('msg') }}
    @endif

    <a href="{{ route('newUser') }}" class="btn btn-primary tool-btn"><span class="glyphicon glyphicon-plus-sign"></span> Crear usuario</a>

    <table class="table table-striped">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Email</th>
            <th width="100"></th>
        </tr>
    @if (isset($users))
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->user_name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ route('editUser', [$user->id]) }}" class="btn btn-default" title="Editar usuario"><span class="glyphicon glyphicon-pencil"></span></a>
                <a href="{{ route('deleteUser', [$user->id]) }}" class="btn btn-default" title="Eliminar usuario"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
        </tr>
        @endforeach
    @endif
    </table>

@endsection