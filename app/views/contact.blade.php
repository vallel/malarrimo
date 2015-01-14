@extends('layout')

@section('content')

    <header class="section-header">

        <h1>Contacto</h1>

    </header>

    <div class="section-content">

        <nav class="section-menu">
            <ul>
                <li class="section-menu-item">
                    <p>
                        Télefono/Fax:<br>
                        (615) 157-01-00
                    </p>
                    <p>
                        Correo electrónico:<br>
                        info@malarrimo.com
                    </p>
                    <p>
                        Dirección:<br>
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

            {{ Field::text('name', 'Nombre:') }}

            {{ Field::text('email', 'Correo electrónico:') }}

            {{ Field::textarea('messageBody', 'Mensaje:') }}

            <input type="submit" value="Enviar" class="btn btn-primary btn-lg contact-button">

            {{ Form::close() }}

        </article>

    </div>

@endsection