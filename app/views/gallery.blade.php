@extends('layout')

@section('content')

    <header class="section-header">

        <h1>Galería de fotos</h1>

    </header>

    <div class="section-content">

        <div id='carousel-custom' class='carousel slide' data-ride='carousel'>
            <div class='carousel-outer'>
                <!-- Wrapper for slides -->
                <div class='carousel-inner'>
                    @foreach ($gallery as $i => $photo)
                        <div class='item {{ $i == 0 ? 'active' : '' }}'>
                            <img src='{{ asset('uploads/galleries/1/' . $photo) }}' alt='' />
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

            <!-- Indicators -->
            <ol class='carousel-indicators mCustomScrollbar'>
                @foreach ($gallery as $i => $photo)
                    <li data-target='#carousel-custom' data-slide-to='{{ $i }}' class='{{ $i == 0 ? 'active' : '' }}'><img src='{{ asset('uploads/galleries/1/thumbs/' . $photo) }}' alt='' /></li>
                @endforeach
            </ol>
        </div>

    </div>

@endsection