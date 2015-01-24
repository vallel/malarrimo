@extends('admin/layout')

@section('content')

    <h1 class="section-header">Noticia</h1>

    @if (Session::has('msg'))
        {{ Session::get('msg') }}
    @endif

    @if (isset($post))
    {{ Form::model($post, ['route' => ['updatePost', $post->id], 'role' => 'form', 'files' => true]) }}
    @else
    {{ Form::open(['route' => 'createPost', 'role' => 'form', 'files' => true]) }}
    @endif

        {{ Field::text('title', 'Título') }}

        <div class="clearfix">
            <div class="form-group pull-left">
                {{ Form::label('esp', 'Español') }}
                {{ Form::radio('language', 'esp', true) }}
                {{ Form::label('eng', 'Ingles') }}
                {{ Form::radio('language', 'eng') }}
                @if ($errors->has('language'))
                    <p class="text-danger">{{ $errors->first('language') }}</p>
                @endif
            </div>
        </div>

        {{ Field::file('image', 'Imagen') }}

        {{ Field::textarea('content', 'Contenido') }}

        {{ Field::text('keywords', 'Etiquetas (separadas por comas, ej. ballenas, tours, eco-tours)') }}

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    {{ Form::close() }}

@endsection