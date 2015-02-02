@extends('layout')

@section('content')

    <header class="section-header">

        <h1>Bienvenidos a <strong>Malarrimo</strong></h1>
        <p>Cada año miles de ballenas grises migran casi 10,000 kilómetros desde las aguas frías de los mares de
            Bering de Alaska y Chukchi a las aguas templadas de la zona central de la costa occidental de la península
            de Baja California. Desde mediados de diciembre hasta marzo la Laguna Ojo de Liebre es el destino de la
            mayoría de estos magníficos mamíferos.</p>
        <p>Más de 1,800 ejemplares, incluyendo cientos de recién nacidos, y antes de que llegaran todos, fueron
            contados a principios de 2004.</p>

    </header>

    <div class="section-content">

        <nav class="section-menu">
            <ul>
                <li class="section-menu-item"><h1 class="section-menu-title">Últimas Noticias</h1></li>
                @foreach ($lastNews as $post)
                <li class="section-menu-item">
                    <article class="news--most-readed">
                        <a href="" class="news--most-readed-title"><h1>{{ $post->title }}</h1></a>
                        <p class="small">{{ Str::limit($post->content, 200) }}</p>
                        <a href="{{ $post->id }}" class="news--read-more">Continuar leyendo</a>
                    </article>
                </li>
                @endforeach
            </ul>
        </nav>

        <!-- Dinamic content -->
        <article class="section-content-article">

            <h1 class="section-content-title">Galerías de fotos</h1>

            <div class="home-page-galleries clearfix">
                @foreach ($galleries as $i => $gallery)
                    <a href="{{ route('gallery', ['id' => $gallery->id, 'title' => Str::slug($gallery->title)]) }}">
                        <figure class="{{ $i == 0 ? 'home-galleries-big' : 'home-galleries-small' }}">
                            <img src="{{ asset('uploads/galleries/'.$gallery->id.'/'.$gallery->pictures[0]->file_name) }}" alt="{{ $gallery->title }}"/>
                        </figure>
                    </a>
                @endforeach
            </div>

            <a href="{{ route('galleries') }}" class="btn btn-info btn-lg more-galleries-btn">Ver más fotos</a>

        </article>

    </div>

@endsection