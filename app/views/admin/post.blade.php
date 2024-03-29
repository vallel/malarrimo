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
                {{ Form::label('es', 'Español') }}
                {{ Form::radio('language', 'es', true) }}
                {{ Form::label('en', 'Ingles') }}
                {{ Form::radio('language', 'en') }}
                @if ($errors->has('language'))
                    <p class="text-danger">{{ $errors->first('language') }}</p>
                @endif
            </div>
        </div>

        @if (isset($post) && !empty($post->image))
            <figure>
                <img src="{{ asset('uploads/news/thumb/' . $post->image) }}" alt=""/>
                <figcaption><a href="{{ route('deletePostImage', ['id' => $post->id]) }}">Borrar imagen</a></figcaption>
            </figure>
        @else
            {{ Field::file('image', 'Imagen') }}
        @endif

        {{ Field::textarea('content', 'Contenido', null, ['class' => 'tinymce']) }}

        {{ Field::text('keywords', 'Etiquetas (separadas por comas, ej. ballenas, tours, eco-tours)') }}

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    {{ Form::close() }}

@endsection

@section('appendScripts')
    {{ HTML::script('js/vendor/tinymce/tinymce.min.js') }}
    {{ HTML::script('js/admin.post.js') }}
@endsection