@extends('layout')

@section('content')

    <header class="section-header">

        <h1>Reservaciones</h1>
        <p>Reserva, cotiza y arma tu paquete</p>

    </header>

    <div class="section-content">

        <article class="booking-container">

            <p class="alert alert-info">Su solicitud de reservación ha sido enviada, en breve nuestro personal revisará
                disponibilidad y se pondrá en contacto con usted para confirmar su reservación. Si desea más información
                puede contactarnos al correo electrónico <strong><a href="mailto:info@malarrimo.com">info@malarrimo.com</a></strong>
                o al teléfono <strong>+52 (615) 157 01 00</strong>.
            </p>

            <h2 class="section-content-subtitle">Su reservación:</h2>
            <table class="table">
                <tr>
                    <th>Servicio</th>
                    <th>Fecha</th>
                </tr>
                @foreach ($services as $service)
                    <tr>
                        <td>{{ $service->getDescription() }}</td>
                        <td>{{ $service->getDates() }}</td>
                    </tr>
                @endforeach
            </table>

        </article>

    </div>

@endsection

@section('appendHead')
    {{ HTML::style('css/datepicker.css') }}
@endsection

@section('scripts')
    {{ HTML::script('js/bootstrap-datepicker.js') }}
    {{ HTML::script('js/booking.js') }}
@endsection