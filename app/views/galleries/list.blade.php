@extends('layout')

@section('content')

    <header class="section-header">

        <h1>Galerías de fotos</h1>

    </header>

    <div class="section-content">

        <div class="galleries-list clearfix">
            @foreach ($galleries as $gallery)
                <article class="galleries-list--item">
                    <a href="{{ route('gallery', ['id' => $gallery->id, 'title' => Str::slug($gallery->title)]) }}">
                        <figure class="galleries-list--item--picture">
                            <img src="{{ asset('uploads/galleries/'.$gallery->id.'/'.$gallery->pictures[0]->file_name) }}" alt="{{ $gallery->title }}">
                        </figure>
                        <h1 class="galleries-list--item--title">{{ $gallery->title }}</h1>
                        @if (!empty($gallery->autor))
                            <p class="small text-muted">Autor: {{ $gallery->autor }}</p>
                        @endif
                    </a>
                </article>
            @endforeach
        </div>

        {{ $galleries->links() }}

    </div>

@endsection