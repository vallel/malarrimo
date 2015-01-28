@extends('layout')

@section('content')

    <header class="section-header">

        <h1>Comodidades</h1>

    </header>

    <div class="section-banner {{ $facilitiesBanner }}"></div>

    <div class="section-content">

        <nav class="section-menu">
            <ul>
                <li><a href="{{ route('facilities') }}" class="section-menu-item {{ Route::currentRouteName() == 'facilities' ? 'section-menu-active' : '' }}">Eco-Tours Malarrimo</a></li>
                <li><a href="{{ route('restaurant') }}" class="section-menu-item {{ Route::currentRouteName() == 'restaurant' ? 'section-menu-active' : '' }}">Restaurante Malarrimo</a></li>
                <li><a href="{{ route('motel') }}" class="section-menu-item {{ Route::currentRouteName() == 'motel' ? 'section-menu-active' : '' }}">Motel Malarrimo - <small>Cabañas Don Miguelito</small></a></li>
                <li><a href="{{ route('rvparking') }}" class="section-menu-item {{ Route::currentRouteName() == 'rvparking' ? 'section-menu-active' : '' }}">RV Parking - <small>Estacionamiento de casas rodantes</small></a></li>
                <li><a href="{{ route('casaelviejocactus') }}" class="section-menu-item {{ Route::currentRouteName() == 'casaelviejocactus' ? 'section-menu-active' : '' }}">Casa El Viejo Cactus</a></li>
                <li><a href="{{ route('deli') }}" class="section-menu-item {{ Route::currentRouteName() == 'deli' ? 'section-menu-active' : '' }}">Malarrimo Deli - <small>Tienda de conveniencia</small></a></li>
            </ul>
        </nav>

        <!-- Dinamic content -->
        <article class="section-content-article">
            @yield('facilities.content')
        </article>

    </div>

@endsection