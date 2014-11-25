@extends('admin/layout')

@section('content')

    <h1 class="section-header">Noticia</h1>

    @if (Session::has('msg'))
        {{ Session::get('msg') }}
    @endif

    @if (isset($post))
    {{ Form::model($post, ['route' => ['updatePost', $post->id], 'role' => 'form']) }}
    @else
    {{ Form::open(['route' => 'createPost', 'role' => 'form']) }}
    @endif

        {{ Field::text('title', 'Título') }}

        {{ Field::checkbox('status', 'Publicado') }}

        {{ Field::textarea('content', 'Contenido') }}

        {{ Field::text('keywords', 'Etiquetas (separadas por comas, ej. ballenas, tours, eco-tours)') }}

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    {{ Form::close() }}

@endsection