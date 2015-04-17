@extends('layout')

@section('content')

    <header class="section-header">

        <h1>{{ Lang::get('contact.contact') }}</h1>

    </header>

    <div class="section-content">

        <nav class="section-menu">
            <ul>
                <li class="section-menu-item">
                    <p>
                        {{ Lang::get('contact.phoneFax') }}:<br>
                        (615) 157-01-00
                    </p>
                    <p>
                        {{ Lang::get('contact.email') }}:<br>
                        info@malarrimo.com
                    </p>
                    <p>
                        {{ Lang::get('contact.address') }}:<br>
                        Blvd. Emiliano Zapata S/N<br>
                        Fundo Legal, C.P. 23940<br>
                        Guerrero Negro, Baja California Sur
                    </p>
                    <div id="contact-map"></div>
                </li>
            </ul>
        </nav>

        <article class="section-content-article">

            {{ Form::open(['route' => 'contactMessage', 'class' => 'contact-form', 'role' => 'form']) }}

            @if (Session::has('msg'))
                {{ Session::get('msg') }}
            @endif

            {{ Field::text('name', Lang::get('contact.name') . ':') }}

            {{ Field::text('email', Lang::get('contact.email') . ':') }}

            {{ Field::textarea('messageBody', Lang::get('contact.message') . ':') }}

            <input type="submit" value="{{ Lang::get('contact.send') }}" class="btn btn-info btn-lg pull-right clearfix">

            {{ Form::close() }}

        </article>

    </div>

@endsection