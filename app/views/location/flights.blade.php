@extends('layout')

@section('scripts')
    {{ HTML::script('https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false') }}
    {{ HTML::script('js/location.map.js') }}
@endsection

@section('content')

    <header class="section-header">

        <h1>Ubicación</h1>
        <p>Localizadoa 720 kilómetros al sur de la frontera con Estados Unidos (Tijuana), Guerrero Negro es la entrada
        norteña [paralelo 28°] del estado de Baja California Sur.</p>

        <p>Nuestras oficinas se encuentran localizadas en:</p>

    </header>

    <div class="section-banner" id="map-canvas">

    </div>

    <div class="section-content">

        <nav class="section-menu location-section-menu">
            <ul>
                <li><h1 class="section-menu-item section-menu-title">Cómo llegar a Guerrero Negro</h1></li>
                <li><a href="" class="section-menu-item section-menu-active"><span class="location-icon flight-icon"></span> Vuelos comerciales</a></li>
                <li><a href="" class="section-menu-item"><span class="location-icon bus-icon"></span> Autobuses</a></li>
                <li><a href="" class="section-menu-item"><span class="location-icon boat-icon"></span> Por barco a la Paz</a></li>
            </ul>
        </nav>

        <!-- Dinamic content -->
        <article class="section-content-article">
            <h1 class="section-content-title">Vuelos comerciales</h1>
            <ul class="section-content-list">
                <li>Hermosillo - Guerrero Negro (Aereo Litoral)</li>
                <li>Ensenada - Guerrero Negro (Aereo Servicios Guerrero)</li>
                <li>Tucson - Hermosillo (Aereo Litoral)</li>
                <li>La Paz - Loreto (Aereo Calafia)</li>
                <li>Cd. Obregón - Loreto (Aereo Calafia)</li>
                <li>Los Angeles - Loreto o Los Angeles - La Paz (Aereo Litoral)</li>
            </ul>
        </article>

    </div>

@endsection