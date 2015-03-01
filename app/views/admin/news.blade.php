@extends('admin/layout')

@section('content')

    <h1 class="section-header">Noticias</h1>

    @if (Session::has('msg'))
        {{ Session::get('msg') }}
    @endif

    <a href="{{ route('addNews') }}" class="btn btn-primary tool-btn"><span class="glyphicon glyphicon-plus-sign"></span> Agregar noticia</a>

    <table class="table table-striped">
        <tr>
            <th>Título</th>
            <th>Fecha</th>
            <th>Autor</th>
            <th>Visitas</th>
            <th width="100"></th>
        </tr>
    @if (isset($news))
        @foreach($news as $post)
        <tr>
            <td>{{ $post->title }}</td>
            <td>{{ date('d/m/Y h:j:s a', strtotime($post->created_at)) }}</td>
            <td>{{ $post->user->user_name }}</td>
            <td>{{ $post->visits }}</td>
            <td>
                <a href="{{ route('editNews', [$post->id]) }}" class="btn btn-default" title="Editar noticia"><span class="glyphicon glyphicon-pencil"></span></a>
                <a href="{{ route('deleteNews', [$post->id]) }}" class="btn btn-default delete-post-btn" title="Eliminar noticia"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
        </tr>
        @endforeach
    @endif
    </table>

    {{ isset($news) ? $news->links() : '' }}

    {{ HTML::script('js/admin.news.js') }}

@endsection