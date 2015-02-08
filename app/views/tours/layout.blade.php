@extends('layout')

@section('content')

    <header class="section-header">

        <h1>Tours</h1>

    </header>

    <div class="section-banner {{ $toursBanner }}"></div>

    <div class="section-content">

        <nav class="section-menu">
            <ul>
                <li><a href="{{ route('tours') }}" class="section-menu-item {{ Route::currentRouteName() == 'tours' ? 'section-menu-active' : '' }}">Tour Avistamiento Ballena Gris</a>
                    <ul class="sub-section-menu">
                        <li><a href="{{ route('equipment') }}" class="section-menu-item {{ Route::currentRouteName() == 'equipment' ? 'section-menu-active' : '' }}">Equipo recomendado</a></li>
                        <li><a href="{{ route('fees') }}" class="section-menu-item {{ Route::currentRouteName() == 'fees' ? 'section-menu-active' : '' }}">Tarifas</a></li>
                        <li><a href="{{ route('whales') }}" class="section-menu-item {{ Route::currentRouteName() == 'whales' ? 'section-menu-active' : '' }}">La Ballena Gris</a></li>
                        {{--<li><a href="" class="section-menu-item {{ Route::currentRouteName() == 'migration' ? 'section-menu-active' : '' }}">Ruta migratoria</a></li>--}}
                    </ul>
                </li>
                <li><a href="{{ route('otherTours') }}" class="section-menu-item {{ Route::currentRouteName() == 'otherTours' ? 'section-menu-active' : '' }}">Otros Tours y Servicios</a>
                    <ul class="sub-section-menu">
                        <li><a href="{{ route('otherFees') }}" class="section-menu-item {{ Route::currentRouteName() == 'otherFees' ? 'section-menu-active' : '' }}">"Rutas cochimies" Excursiones a las Pinturas Rupestres</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Dinamic content -->
        <article class="{{ isset($sectionContentClass) ? $sectionContentClass : 'section-content-article' }}">
            @yield('toursContent')
        </article>

    </div>

@endsection