@extends('layout')

@section('content')

    <header class="section-header">

        <h1>Reservaciones</h1>
        <p>Reserva, cotiza y arma tu paquete</p>

    </header>

    <div class="section-content">

        <article class="booking-container clearfix">

            {{ Form::open(['route' => 'storeBooking', 'role' => 'form', 'class' => ' col-sm-8 form-horizontal booking-form']) }}

            {{-- General data --}}
            <fieldset>
                <legend class="section-content-subtitle">Datos generales:</legend>

                {{ Field::text('name', 'Nombre:', null, ['placeholder' => 'Nombre', 'required' => ''], ['template' => 'horizontal']) }}

                {{ Field::email('email', 'Correo electrónico:', null, ['placeholder' => 'Correo electrónico', 'required' => ''], ['template' => 'horizontal']) }}
                {{ Field::email('email_confirmation', 'Confirmar correo electrónico:', null, ['placeholder' => 'Correo electrónico', 'required' => ''], ['template' => 'horizontal']) }}

                <div class="form-group">
                    {{ Form::label('phone', 'Teléfono:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Teléfono', 'required' => '']) }}
                    </div>

                    {{ Form::label('fax', 'Fax:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('fax', null, ['class' => 'form-control', 'placeholder' => 'Fax']) }}
                    </div>
                </div>

                {{ Field::text('address', 'Dirección:', null, ['placeholder' => 'Dirección', 'required' => ''], ['template' => 'horizontal']) }}

                <div class="form-group">
                    {{ Form::label('city', 'Ciudad:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('city', null, ['class' => 'form-control', 'placeholder' => 'Ciudad', 'required' => '']) }}
                    </div>

                    {{ Form::label('country', 'País:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('country', null, ['class' => 'form-control', 'placeholder' => 'País', 'required' => '']) }}
                    </div>
                </div>

            </fieldset>

            {{-- Hotel --}}
            <fieldset>
                <legend class="section-content-subtitle">Hotel</legend>

                <div class="form-group">
                    {{ Form::label('hotelCheckIn', 'Fecha de entrada:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('hotelCheckIn', null, ['class' => 'form-control datepicker hotel-input', 'placeholder' => 'dd/mm/aaaa']) }}
                    </div>

                    {{ Form::label('hotelCheckOut', 'Fecha de salida:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('hotelCheckOut', null, ['class' => 'form-control datepicker hotel-input', 'placeholder' => 'dd/mm/aaaa']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('hotelSingleRooms', 'Habitaciones sencillas:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('hotelSingleRooms', null, ['class' => 'form-control hotel-input']) }}
                    </div>

                    {{ Form::label('hotelDoubleRooms', 'Habitaciones dobles:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('hotelDoubleRooms', null, ['class' => 'form-control hotel-input']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('hotelAdults', 'Adultos:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('hotelAdults', null, ['class' => 'form-control hotel-input']) }}
                    </div>

                    {{ Form::label('hotelChildren', 'Niños:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('hotelChildren', null, ['class' => 'form-control hotel-input']) }}
                    </div>
                </div>

            </fieldset>

            {{-- Whale watching tours --}}
            <fieldset>
                <legend class="section-content-subtitle">Tour Ballena Gris</legend>

                <div class="form-group">
                    {{ Form::label('whalesDate', 'Fecha:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('whalesDate', null, ['class' => 'form-control datepicker whales-input', 'placeholder' => 'dd/mm/aaaa']) }}
                    </div>

                    {{ Form::label('whalesTime', 'Horario:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::select('whalesTime',
                            ['8:00 a.m.' => '8:00 a.m. - 12:00 p.m.',
                             '11:00 a.m.' => '11:00 a.m. - 3:00 p.m.'],
                            null, ['class' => 'form-control whales-input']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('whalesAdults', 'Adultos:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('whalesAdults', null, ['class' => 'form-control whales-input']) }}
                    </div>

                    {{ Form::label('whalesChildren', 'Niños (hasta 11 años):', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('whalesChildren', null, ['class' => 'form-control whales-input']) }}
                    </div>
                </div>

            </fieldset>

            {{-- Cave paintings tours --}}
            <fieldset>
                <legend class="section-content-subtitle">Tour Pinturas Rupestres</legend>

                <div class="form-group">
                    {{ Form::label('cavePaintingDate', 'Fecha:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('cavePaintingDate', null, ['class' => 'form-control datepicker', 'placeholder' => 'dd/mm/aaaa']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('cavePaintingAdults', 'Adultos:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('cavePaintingAdults', null, ['class' => 'form-control']) }}
                    </div>

                    {{ Form::label('cavePaintingChildren', 'Niños (hasta 11 años):', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('cavePaintingChildren', null, ['class' => 'form-control']) }}
                    </div>
                </div>
            </fieldset>

            {{-- Salt mine tours --}}
            <fieldset>
                <legend class="section-content-subtitle">Tour Salinas</legend>

                <div class="form-group">
                    {{ Form::label('saltMineDate', 'Fecha:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('saltMineDate', null, ['class' => 'form-control datepicker', 'placeholder' => 'dd/mm/aaaa']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('saltMineAdults', 'Adultos:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('saltMineAdults', null, ['class' => 'form-control']) }}
                    </div>

                    {{ Form::label('saltMineChildren', 'Niños (hasta 11 años):', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('saltMineChildren', null, ['class' => 'form-control']) }}
                    </div>
                </div>
            </fieldset>

            {{-- RV Parking --}}
            <fieldset>
                <legend class="section-content-subtitle">RV Parking</legend>

                <div class="form-group">
                    {{ Form::label('rvCheckIn', 'Fecha de entrada:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('rvCheckIn', null, ['class' => 'form-control datepicker', 'placeholder' => 'dd/mm/aaaa']) }}
                    </div>

                    {{ Form::label('rvCheckOut', 'Fecha de salida:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('rvCheckOut', null, ['class' => 'form-control datepicker', 'placeholder' => 'dd/mm/aaaa']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('rvAdults', 'Adultos:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('rvAdults', null, ['class' => 'form-control']) }}
                    </div>

                    {{ Form::label('rvChildren', 'Niños:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('rvChildren', null, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group">
                    <label class="checkbox-inline col-sm-4 col-sm-push-1">
                        {{ Form::checkbox('rvCamping') }} Tienda de campaña
                    </label>
                    <label class="checkbox-inline col-sm-2 col-sm-push-1">
                        {{ Form::checkbox('rvVan') }} Van
                    </label>
                    <label class="checkbox-inline col-sm-2 col-sm-push-1">
                        {{ Form::checkbox('rvCamper') }} Camper
                    </label>
                    <label class="checkbox-inline col-sm-3 col-sm-push-1">
                        {{ Form::checkbox('rvFifthWheel') }} Fifth wheel
                    </label>
                </div>

            </fieldset>

            {{-- Banquet --}}
            <fieldset>
                <legend class="section-content-subtitle">Banquetes</legend>

                <div class="form-group">
                    {{ Form::label('banquetDate', 'Fecha:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('banquetDate', null, ['class' => 'form-control datepicker', 'placeholder' => 'dd/mm/aaaa']) }}
                    </div>

                    {{ Form::label('banquetSchedule', 'Horario:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('banquetSchedule', null, ['class' => 'form-control', 'placeholder' => 'hh:mm']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('banquetPersons', 'Número de personas:', ['class' => 'col-sm-8 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('banquetPersons', null, ['class' => 'form-control']) }}
                    </div>
                </div>

            </fieldset>

            <button type="submit" class="btn btn-lg btn-info pull-right col-sm-4">Reservar</button>

            {{ Form::close() }}

            <aside class="col-sm-4 booking-summary">
                <div class="panel panel-default">
                    <div class="panel-heading">Tu reservación</div>
                    <div class="panel-body">
                        <article class="booking-summary-hotel"></article>
                        <article class="booking-summary-whales"></article>
                        <article class="booking-summary-paintings"></article>
                        <article class="booking-summary-salt"></article>
                        <article class="booking-summary-rv"></article>
                        <article class="booking-summary-restaurant"></article>
                    </div>
                </div>
            </aside>

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