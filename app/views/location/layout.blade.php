@extends('layout')

@section('scripts')
    {{ HTML::script('https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false') }}
    {{ HTML::script('js/location.map.js') }}
@endsection

@section('content')

    <header class="section-header">

        <h1>Ubicación</h1>
        <p>Localizado a 720 kilómetros al sur de la frontera con Estados Unidos (Tijuana), Guerrero Negro es la
            entrada norteña (paralelo 28&deg;) del estado de Baja California Sur. En automóvil, es un recorrido de
            aproximadamente 12 &frac12; horas desde Los Ángeles, 10 &frac12; horas de San Diego, 10 horas de Tijuana,
            ú 8 &frac12; horas de Ensenada. De sur a norte en automóvil, La Paz se encuentra a 10 horas y Loreto a 5
            horas de camino respectivamente.</p>

    </header>

    <div class="section-banner" id="map-canvas">

    </div>

    <div class="section-content">

        <nav class="section-menu location-section-menu">
            <ul>
                <li><a href="{{ route('location') }}" class="section-menu-item {{ Route::currentRouteName() == 'location' ? 'section-menu-active' : '' }}">Cómo llegar a Guerrero Negro</a>
                    <ul class="sub-section-menu">
                        <li><a href="{{ route('location') }}#flights" class="section-menu-item"><span class="location-icon flight-icon"></span> Vuelos comerciales</a></li>
                        <li><a href="{{ route('location') }}#bus" class="section-menu-item"><span class="location-icon bus-icon"></span> Autobuses</a></li>
                        <li><a href="{{ route('location') }}#boat" class="section-menu-item"><span class="location-icon boat-icon"></span> Barco</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('briefHistory') }}" class="section-menu-item {{ Route::currentRouteName() == 'briefHistory' ? 'section-menu-active' : '' }}">Guerrero Negro - <small>Breve historia</small></a></li>
            </ul>
        </nav>

        <!-- Dinamic content -->
        <article class="section-content-article">
            @yield('locationSection')
        </article>

    </div>

@endsection