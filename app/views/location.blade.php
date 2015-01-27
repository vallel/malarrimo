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

    </header>

    <div class="section-banner" id="map-canvas">

    </div>

    <div class="section-content">

        <nav class="section-menu location-section-menu">
            <ul>
                <li><h1 class="section-menu-item section-menu-title">Cómo llegar a Guerrero Negro</h1></li>
                <li><a href="#flights" class="section-menu-item"><span class="location-icon flight-icon"></span> Vuelos comerciales</a></li>
                <li><a href="#bus" class="section-menu-item"><span class="location-icon bus-icon"></span> Autobuses</a></li>
                <li><a href="#boat" class="section-menu-item"><span class="location-icon boat-icon"></span> Barco</a></li>
            </ul>
        </nav>

        <!-- Dinamic content -->
        <article class="section-content-article">
            <h1 class="section-content-title">Guerrero Negro - Localización</h1>

            <p>Localizado a 720 kilómetros al sur de la frontera con Estados Unidos (Tijuana), Guerrero Negro es la
                entrada norteña (paralelo 28&deg;) del estado de Baja California Sur. En automóvil, es un recorrido de
                aproximadamente 12 &frac12; horas desde Los Ángeles, 10 &frac12; horas de San Diego, 10 horas de Tijuana,
                ú 8 &frac12; horas de Ensenada. De sur a norte en automóvil, La Paz se encuentra a 10 horas y Loreto a 5
                horas de camino respectivamente.</p>


            <h2 id="flights" class="section-content-subtitle">Vuelos comerciales</h2>

            <ul class="section-content-list">
                <li>Hermosillo - Guerrero Negro (Aereo Litoral)</li>
                <li>Ensenada - Guerrero Negro (Aereo Servicios Guerrero)</li>
                <li>Tucson - Hermosillo (Aereo Litoral)</li>
                <li>La Paz - Loreto (Aereo Calafia)</li>
                <li>Cd. Obregón - Loreto (Aereo Calafia)</li>
                <li>Los Angeles - Loreto o Los Angeles - La Paz (Aereo Litoral)</li>
            </ul>


            <h2 id="bus" class="section-content-subtitle">Autobuses</h2>

            <p>Por autobús de Tijuana o La Paz; tomar autobuses <a href="http://www.abc.com.mx" target="_blank">ABC</a>
                o Águila (recomendamos tomarlos de noche para arribar a Guerrero Negro por la mañana).</p>


            <h2 id="boat" class="section-content-subtitle">Barco</h2>

            <p>Por barco a La Paz; tomar <a href="http://www.bajafierries.com.mx" target="_blank">Baja Ferries</a>
                de Mazatlán o Los Mochis (Topolobampo) hacia la ciudad de La Paz y después rentar automóvil
                o viajar por autobús hacia Guerrero Negro.</p>

        </article>

    </div>

@endsection