@extends('layout')

@section('content')

    <header class="section-header">

        <h1>Noticias</h1>

    </header>

    <div class="section-content">

        <nav class="section-sidebar">
            <ul>
                <li class="section-menu-item"><h1 class="section-menu-title">Las más leidas</h1></li>
                <li class="section-menu-item">
                    <article class="news--most-readed">
                        <a href="" class="news--most-readed-title"><h2>Aumentó 40% la población de ballena gris en Baja California Sur</h2></a>
                        <p class="small">El investigador de la Universidad Autonoma de Baja California Sur, Jorge Urban, informó que en la temporada
                            actual, de diciembre-abril, la población de ballena gris ha aumentado más de 40 por ciento en las lagunas
                            costeras de la entidad.</p>
                        <a href="" class="news--read-more">Continuar leyendo</a>
                    </article>
                </li>
                <li class="section-menu-item">
                    <article class="news--most-readed">
                        <a href="" class="news--most-readed-title"><h2>Aumentó 40% la población de ballena gris en Baja California Sur</h2></a>
                        <p class="small">El investigador de la Universidad Autonoma de Baja California Sur, Jorge Urban, informó que en la temporada
                            actual, de diciembre-abril, la población de ballena gris ha aumentado más de 40 por ciento en las lagunas
                            costeras de la entidad.</p>
                        <a href="" class="news--read-more">Continuar leyendo</a>
                    </article>
                </li>
                <li class="section-menu-item">
                    <article class="news--most-readed">
                        <a href="" class="news--most-readed-title"><h2>Aumentó 40% la población de ballena gris en Baja California Sur</h2></a>
                        <p class="small">El investigador de la Universidad Autonoma de Baja California Sur, Jorge Urban, informó que en la temporada
                            actual, de diciembre-abril, la población de ballena gris ha aumentado más de 40 por ciento en las lagunas
                            costeras de la entidad.</p>
                        <a href="" class="news--read-more">Continuar leyendo</a>
                    </article>
                </li>
            </ul>
        </nav>

        <section class="section-content-article news">

            @foreach ($news as $i => $post)
                <article class="post-item {{ $i%2 == 0 ? '' : 'clearfix' }}">
                    @if (!empty($post->image))
                    <figure class="news-image-container">
                        <img class="news-image" src="{{ asset('uploads/news/' . $post->image) }}" alt="{{ $post->title }}"/>
                    </figure>
                    @endif
                    <h1 class="post-item-title">{{ $post->title }}</h1>
                    <div class="post-item-content">
                        {{ $post->content }}
                    </div>
                    <a href="{{ $post->id }}" class="post-item--read-more">Continuar leyendo</a>
                </article>
            @endforeach

        </section>

    </div>

@endsection