@extends('admin/layout')

@section('scripts')
    {{ HTML::script('js/admin.galleries.js') }}
@endsection

@section('content')

    <h1 class="page-header">Galerias</h1>

    @if (Session::has('msg'))
        {{ Session::get('msg') }}
    @endif

    <a href="{{ route('addGallery') }}" class="btn btn-primary tool-btn pull-right"><span class="glyphicon glyphicon-plus"></span> Agregar galería</a>

    <table class="table table-striped">
        <tr>
            <th>Galería</th>
            <th>Fecha</th>
            <th>Fotos</th>
            <th width="100"></th>
        </tr>

        @if (isset($galleries) && $galleries->count() > 0)
            @foreach ($galleries as $gallery)

            <tr>
                <td>{{ $gallery->title }}</td>
                <td>{{ $gallery->date }}</td>
                <td>{{ $gallery->pictures->count() }}</td>
                <td>
                    <a href="{{ route('editGallery', ['id' => $gallery->id]) }}" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
                    <a href="{{ route('deleteGallery', ['id' => $gallery->id]) }}" class="btn btn-default delete-gallery"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
            </tr>

            @endforeach

        @else
            <tr>
                <td colspan="5" class="text-center">No hay galerias registradas</td>
            </tr>
        @endif

    </table>

    @if (isset($galleries) && $galleries->count() > 0)
        
        {{ $galleries->links() }}

    @endif

@endsection