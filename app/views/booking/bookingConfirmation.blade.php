@extends('layout')

@section('content')

    <header class="section-header">

        <h1>{{ Lang::get('booking.booking') }}</h1>
        {{ Lang::get('booking.headerText') }}

    </header>

    <div class="section-content">

        <article class="booking-container">

            {{ Lang::get('booking.confirmMessage') }}

        </article>

    </div>

@endsection