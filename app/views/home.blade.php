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

        <!-- Dinamic content -->
        <article class="section-content-article">

            <h1 class="section-content-title">Galerías de fotos</h1>

            <div class="home-page-galleries clearfix">
                @foreach ($galleries as $i => $photo)
                    <figure class="{{ $i == 0 ? 'home-galleries-big' : 'home-galleries-small' }}">
                        <img src="{{ asset('uploads/galleries/1/' . $photo) }}" alt=""/>
                    </figure>
                @endforeach
            </div>

            <a href="{{ route('gallery') }}" class="btn btn-info btn-lg more-galleries-btn">Ver más fotos</a>

        </article>

    </div>

@endsection