@extends('layout')

@section('content')

    <header class="section-header">

        <h1>Galería de fotos | {{ $gallery->title }}</h1>

    </header>

    <div class="section-content">

        <div id='carousel-custom' class='carousel slide' data-ride='carousel'>
            <!-- Indicators -->
            <ol class='carousel-indicators mCustomScrollbar'>
                @foreach ($gallery->pictures as $i => $picture)
                    <li data-target='#carousel-custom' data-slide-to='{{ $i }}' class='{{ $i == 0 ? 'active' : '' }}'>
                        <img src='{{ asset('uploads/galleries/' . $gallery->id . '/thumbnail/' . $picture->file_name) }}' alt='' />
                    </li>
                @endforeach
            </ol>

            <div class='carousel-outer'>
                <!-- Wrapper for slides -->
                <div class='carousel-inner'>
                    @foreach ($gallery->pictures as $i => $picture)
                        <div class='item {{ $i == 0 ? 'active' : '' }}'>
                            <img src='{{ asset('uploads/galleries/' . $gallery->id . '/' . $picture->file_name) }}' alt='' />
                        </div>
                    @endforeach
                </div>

                <!-- Controls -->
                <a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
                    <span class='glyphicon glyphicon-chevron-left'></span>
                </a>
                <a class='right carousel-control' href='#carousel-custom' data-slide='next'>
                    <span class='glyphicon glyphicon-chevron-right'></span>
                </a>
            </div>

            @if (!empty($gallery->autor))
                <p class="text-center small text-muted">
                    Fotografía de: {{ $gallery->autor }}<br>
                    Todos los derechos reservados
                </p>
            @endif
        </div>

    </div>

@endsection