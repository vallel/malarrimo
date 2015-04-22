@extends('layout')

@section('content')

    <header class="section-header">

        <h1>Tours</h1>

    </header>

    <div class="section-banner {{ $toursBanner }}"></div>

    <div class="section-content">

        <nav class="section-menu">
            <ul>
                <li><a href="{{ route('tours') }}" class="section-menu-item {{ Route::currentRouteName() == 'tours' ? 'section-menu-active' : '' }}">{{ Lang::get('tours.whales') }}</a>
                    <ul class="sub-section-menu">
                        <li><a href="{{ route('equipment') }}" class="section-menu-item {{ Route::currentRouteName() == 'equipment' ? 'section-menu-active' : '' }}">{{ Lang::get('tours.recommendedEquipment') }}</a></li>
                        <li><a href="{{ route('fees') }}" class="section-menu-item {{ Route::currentRouteName() == 'fees' ? 'section-menu-active' : '' }}">{{ Lang::get('tours.rates') }}</a></li>
                        <li><a href="{{ route('whales') }}" class="section-menu-item {{ Route::currentRouteName() == 'whales' ? 'section-menu-active' : '' }}">{{ Lang::get('tours.grayWhale') }}</a></li>
                        {{--<li><a href="" class="section-menu-item {{ Route::currentRouteName() == 'migration' ? 'section-menu-active' : '' }}">Ruta migratoria</a></li>--}}
                    </ul>
                </li>
                <li><a href="{{ route('otherTours') }}" class="section-menu-item {{ Route::currentRouteName() == 'otherTours' ? 'section-menu-active' : '' }}">{{ Lang::get('tours.other') }}</a>
                    <ul class="sub-section-menu">
                        <li><a href="{{ route('otherFees') }}" class="section-menu-item {{ Route::currentRouteName() == 'otherFees' ? 'section-menu-active' : '' }}">{{ Lang::get('tours.cochimie') }}</a></li>
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