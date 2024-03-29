@extends('layout')

@section('scripts')
    {{ HTML::script('https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false') }}
    {{ HTML::script('js/location.map.js') }}
@endsection

@section('content')

    <header class="section-header">

        <h1>{{ Lang::get('location.location') }}</h1>
        {{ Lang::get('location.headerText') }}

    </header>

    <div class="section-banner" id="map-canvas">

    </div>

    <div class="section-content">

        <nav class="section-menu location-section-menu">
            <ul>
                <li><a href="{{ route('location') }}" class="section-menu-item {{ Route::currentRouteName() == 'location' ? 'section-menu-active' : '' }}">{{ Lang::get('location.howToGetHere') }}</a>
                    <ul class="sub-section-menu">
                        <li><a href="{{ route('location') }}#flights" class="section-menu-item"><span class="location-icon flight-icon"></span> {{ Lang::get('location.flights') }}</a></li>
                        <li><a href="{{ route('location') }}#bus" class="section-menu-item"><span class="location-icon bus-icon"></span> {{ Lang::get('location.bus') }}</a></li>
                        @if (Lang::getLocale() == 'es')
                        <li><a href="{{ route('location') }}#boat" class="section-menu-item"><span class="location-icon boat-icon"></span> Barco</a></li>
                        @endif
                    </ul>
                </li>
                <li><a href="{{ route('briefHistory') }}" class="section-menu-item {{ Route::currentRouteName() == 'briefHistory' ? 'section-menu-active' : '' }}">Guerrero Negro - <small>{{ Lang::get('location.briefHistory') }}</small></a></li>
            </ul>
        </nav>

        <!-- Dinamic content -->
        <article class="section-content-article">
            @yield('locationSection')
        </article>

    </div>

@endsection