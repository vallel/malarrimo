@extends('layout')

@section('content')

    <header class="section-header home-section-header">

        <h1>Welcome to <strong>Malarrimo</strong></h1>
        <p>Every year thousands of California gray whales migrate 6,000 miles from the warm waters of Baja California's
            central Pacific coast. From mid-December through March, Scammon's Lagoon is the destination of the largest
            number of these magnificent mammals, aproximately 1,500 --including newborn calves-- every year.</p>

    </header>

    <div class="section-content">

        <nav class="section-menu">
            <ul>
                <li class="section-menu-item"><h1 class="section-menu-title">Last News</h1></li>
                @foreach ($lastNews as $post)
                <li class="section-menu-item">
                    <article class="news--most-readed">
                        <h1 class="news--most-readed-title">{{ $post->title }}</h1>
                        <div class="news--most-readed-content small">{{ Str::limit(strip_tags($post->content), 200) }}</div>
                        <a href="{{ route('post', ['id' => $post->id, 'title' => Str::slug($post->title)]) }}" class="news--read-more">Read more</a>
                    </article>
                </li>
                @endforeach
            </ul>
        </nav>

        <!-- Dinamic content -->
        <article class="section-content-article">

            <h1 class="section-content-title">Galleries</h1>

            <div class="home-page-galleries clearfix">
                @foreach ($galleries as $i => $gallery)
                    <a href="{{ route('gallery', ['id' => $gallery->id, 'title' => Str::slug($gallery->title)]) }}">
                        <figure class="{{ $i == 0 ? 'home-galleries-big' : 'home-galleries-small' }}">
                            <img src="{{ asset('uploads/galleries/'.$gallery->id.'/'.$gallery->Pictures[0]->file_name) }}" alt="{{ $gallery->title }}"/>
                        </figure>
                    </a>
                @endforeach
            </div>

            <a href="{{ route('galleries') }}" class="btn btn-info btn-lg more-galleries-btn">More galleries</a>

        </article>

    </div>

@endsection