@extends('layout')

@section('content')

    <header class="section-header">

        <h1>{{ Lang::get('news.news') }}</h1>

    </header>

    <div class="section-content">

        <nav class="section-sidebar">
            <ul>
                <li class="section-menu-item"><h1 class="section-menu-title">{{ Lang::get('news.mostPopular') }}</h1></li>
                @foreach ($mostVisited as $visitedPost)
                <li class="section-menu-item">
                    <article class="news--most-readed">
                        <h2 class="news--most-readed-title">{{ $visitedPost->title }}</h2>
                        <p class="small">{{ Str::limit(strip_tags($visitedPost->content, 200)) }}</p>
                        <a href="{{ route('post', ['id' => $visitedPost->id, 'title' => Str::slug($visitedPost->title)]) }}" class="news--read-more">{{ Lang::get('news.readMore') }}</a>
                    </article>
                </li>
                @endforeach
            </ul>
        </nav>

        <section class="section-content-article post">

            <h1 class="section-content-title">{{ $post->title }}</h1>

            <div class="post-meta-data">
                <small class="text-muted">{{ date('d/m/Y', strtotime($post->created_at)) }}</small>
                <div class="social-icons">
                    <div class="social-icon">
                        <div class="g-plusone" data-size="medium"></div>
                    </div>
                    <div class="social-icon">
                        <a href="https://twitter.com/share" class="twitter-share-button" data-lang="es">Twittear</a>
                        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                    </div>
                    <div class="social-icon">
                        <div class="fb-like" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
                    </div>
                </div>
            </div>

            @if ($post->image)
                <figure class="post-image">
                    <img src="{{ asset('uploads/news/' . $post->image) }}" alt=""/>
                </figure>
            @endif

            <div class="post-content">
                {{ $post->content }}
            </div>

            <p class="post-tags">{{ $post->keywords }}</p>

        </section>

    </div>

@endsection