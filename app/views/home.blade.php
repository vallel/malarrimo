@extends('layout')

@section('scripts')
    {{ HTML::script('js/home.js') }}
@endsection

@section('content')

    <header class="section-header home-section-header">

        <h1>{{ Lang::get('home.welcome') }} <strong>Malarrimo</strong></h1>
        {{ Lang::get('home.welcomeMessage') }}

    </header>

    <div class="section-content">

        <nav class="section-menu">
            <ul>
                <li class="section-menu-item"><h1 class="section-menu-title">{{ Lang::get('news.lastNews') }}</h1></li>
                @foreach ($lastNews as $post)
                <li class="section-menu-item">
                    <article class="news--most-readed">
                        <h1 class="news--most-readed-title">{{ $post->title }}</h1>
                        <div class="news--most-readed-content">{{ Str::limit(strip_tags($post->content), 200) }}</div>
                        <a href="{{ route('post', ['id' => $post->id, 'title' => Str::slug($post->title)]) }}" class="news--read-more">{{ Lang::get('news.readMore') }}</a>
                    </article>
                </li>
                @endforeach
            </ul>
        </nav>

        <!-- Dinamic content -->
        <article class="section-content-article">

            <h1 class="section-content-title">{{ Lang::get('galleries.galleries') }}</h1>

            <div class="home-page-galleries clearfix">
                @foreach ($galleries as $i => $gallery)
                    <a href="{{ route('gallery', ['id' => $gallery->id, 'title' => Str::slug($gallery->title)]) }}">
                        <figure class="{{ $i == 0 ? 'home-galleries-big' : 'home-galleries-small' }}">
                            <img src="{{ asset('uploads/galleries/'.$gallery->id.'/'.$gallery->Pictures[0]->file_name) }}" alt="{{ $gallery->title }}"/>
                        </figure>
                    </a>
                @endforeach
            </div>

            <a href="{{ route('galleries') }}" class="btn btn-info btn-lg more-galleries-btn">{{ Lang::get('galleries.moreGalleries') }}</a>

        </article>

        <div class="award-icons-container">
            <a href="#" class="award-icon" data-img="{{ asset('img/baja-traveller-2008.jpg') }}">
                <img src="{{ asset('img/bestofbaja.jpg') }}" alt="Best of Baja Reader's choice award" width="150" height="150"/>
            </a>
            <a href="#" class="award-icon" data-img="{{ asset('img/cert-profepa-2009-2011.jpg') }}">
                <img src="{{ asset('img/calidadambiental.jpg') }}" alt="Calidad ambiental turistica" width="150" height="150"/>
            </a>
        </div>

        <div class="modal fade awards-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><!-- Modal title --></h4>
                    </div>
                    <div class="modal-body">
                        <!-- Modal body -->
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>

@endsection
