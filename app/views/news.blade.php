@extends('layout')

@section('content')

    <header class="section-header">

        <h1>Noticias</h1>

    </header>

    <div class="section-content">

        <nav class="section-sidebar">
            <ul>
                <li class="section-menu-item"><h1 class="section-menu-title">Las más leidas</h1></li>
                @foreach ($mostVisited as $visitedPost)
                <li class="section-menu-item">
                    <article class="news--most-readed">
                        <h2 class="news--most-readed-title">{{ $visitedPost->title }}</h2>
                        <p class="small">{{ Str::limit(strip_tags($visitedPost->content, 200)) }}</p>
                        <a href="{{ route('post', ['id' => $visitedPost->id, 'title' => Str::slug($visitedPost->title)]) }}" class="news--read-more">Continuar leyendo</a>
                    </article>
                </li>
                @endforeach
            </ul>
        </nav>

        <section class="section-content-article news">

            <div class="clearfix">
            @foreach ($news as $i => $post)
                <article class="post-item {{ $i%2 == 0 ? '' : 'clearfix' }}">
                    @if (!empty($post->image))
                    <figure class="news-image-container">
                        <img class="news-image" src="{{ asset('uploads/news/thumb/' . $post->image) }}" alt="{{ $post->title }}"/>
                    </figure>
                    @endif
                    <h1 class="post-item-title">{{ $post->title }}</h1>
                    <div class="post-item-content">
                        {{ Str::limit($post->content, 250) }}
                    </div>
                    <a href="{{ route('post', ['id' => $post->id, 'title' => Str::slug($post->title)]) }}" class="post-item--read-more">Continuar leyendo</a>
                </article>
            @endforeach
            </div>

            {{ $news->links('pagination::simple') }}

        </section>

    </div>

@endsection