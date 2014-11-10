@extends('admin/layout')

@section('content')

    <h1>Usuarios</h1>

    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#create-user">
        <span class="glyphicon glyphicon-plus-sign"></span> Crear usuario
    </a>

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
                <a href="" class="btn" title="Editar usuario"><span class="glyphicon glyphicon-pencil"></span></a>
                <a href="" class="btn" title="Eliminar usuario"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
        </tr>
        @endforeach
    @endif
    </table>

    <div class="modal fade" id="create-user" tabindex="-1" role="dialog" aria-labelledby="create-user-label" aria-hidden="true">
        <div class="modal-dialog">
            {{ Form::open(['route' => 'createUser', 'role' => 'form']) }}
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                        <h4 class="modal-title" id="create-user-label">Usuario</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            {{ Form::label('userName', 'Nombre') }}
                            {{ Form::text('userName', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::email('email', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('password', 'Contraseña') }}
                            {{ Form::password('password', ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('password2', 'Confirme contraseña') }}
                            {{ Form::password('password2', ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div><!-- /.modal-content -->
            {{ Form::close() }}
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection