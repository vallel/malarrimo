@extends('layout')

@section('content')

    <header class="section-header">

        <h1>Reservaciones</h1>
        <p>Reserva, cotiza y arma tu paquete</p>

    </header>

    <div class="section-content">

        <article class="booking-container">

            {{ Form::open(['route' => 'storeBooking', 'role' => 'form', 'class' => ' col-sm-8 form-horizontal booking-form']) }}

            {{-- General data --}}
            <fieldset>
                <legend class="section-content-subtitle">Datos generales:</legend>

                {{ Field::text('name', 'Nombre:', null, ['placeholder' => 'Nombre'], ['template' => 'horizontal']) }}

                {{ Field::email('email', 'Correo electrónico:', null, ['placeholder' => 'Correo electrónico'], ['template' => 'horizontal']) }}
                {{ Field::email('emailConfirmation', 'Confirmar correo electrónico:', null, ['placeholder' => 'Correo electrónico'], ['template' => 'horizontal']) }}

                <div class="form-group">
                    {{ Form::label('phone', 'Teléfono:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Teléfono']) }}
                    </div>

                    {{ Form::label('fax', 'Fax:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('fax', null, ['class' => 'form-control', 'placeholder' => 'Fax']) }}
                    </div>
                </div>

                {{ Field::email('address', 'Dirección:', null, ['placeholder' => 'Dirección'], ['template' => 'horizontal']) }}

                <div class="form-group">
                    {{ Form::label('city', 'Ciudad:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('city', null, ['class' => 'form-control', 'placeholder' => 'Ciudad']) }}
                    </div>

                    {{ Form::label('country', 'País:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('country', null, ['class' => 'form-control', 'placeholder' => 'País']) }}
                    </div>
                </div>

            </fieldset>

            {{-- Hotel --}}
            <fieldset>
                <legend class="section-content-subtitle">Hotel</legend>

                <div class="form-group">
                    {{ Form::label('checkin', 'Fecha de entrada:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('checkin', null, ['class' => 'form-control', 'placeholder' => 'dd/mm/aaaa']) }}
                    </div>

                    {{ Form::label('checkout', 'Fecha de salida:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('checkout', null, ['class' => 'form-control', 'placeholder' => 'dd/mm/aaaa']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('singleRooms', 'Habitaciones sencillas:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('singleRooms', null, ['class' => 'form-control']) }}
                    </div>

                    {{ Form::label('doubleRooms', 'Habitaciones dobles:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('doubleRooms', null, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('hotelAdults', 'Adultos:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('hotelAdults', null, ['class' => 'form-control']) }}
                    </div>

                    {{ Form::label('hotelChildren', 'Niños:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('hotelChildren', null, ['class' => 'form-control']) }}
                    </div>
                </div>

            </fieldset>

            {{-- Whale watching tours --}}
            <fieldset>
                <legend class="section-content-subtitle">Tour Ballena Gris</legend>

                <div class="form-group">
                    {{ Form::label('whalesDate', 'Fecha:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('whalesDate', null, ['class' => 'form-control', 'placeholder' => 'dd/mm/aaaa']) }}
                    </div>

                    {{ Form::label('whalesSchedule', 'Horario:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::select('whalesSchedule', ['8:00 a.m. - 12:00 p.m.', '11:00 a.m. - 3:00 p.m.'], null, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('whalesAdults', 'Adultos:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('whalesAdults', null, ['class' => 'form-control']) }}
                    </div>

                    {{ Form::label('whalesChildren', 'Niños (hasta 11 años):', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('whalesChildren', null, ['class' => 'form-control']) }}
                    </div>
                </div>

            </fieldset>

            {{-- Cave paintings tours --}}
            <fieldset>
                <legend class="section-content-subtitle">Tour Pinturas Rupestres</legend>

                <div class="form-group">
                    {{ Form::label('cavePaintDate', 'Fecha:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('cavePaintDate', null, ['class' => 'form-control', 'placeholder' => 'dd/mm/aaaa']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('cavePaintAdults', 'Adultos:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('cavePaintAdults', null, ['class' => 'form-control']) }}
                    </div>

                    {{ Form::label('cavePaintChildren', 'Niños (hasta 11 años):', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('cavePaintChildren', null, ['class' => 'form-control']) }}
                    </div>
                </div>
            </fieldset>

            {{-- Salt mine tours --}}
            <fieldset>
                <legend class="section-content-subtitle">Tour Salinas</legend>

                <div class="form-group">
                    {{ Form::label('saltDate', 'Fecha:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('saltDate', null, ['class' => 'form-control', 'placeholder' => 'dd/mm/aaaa']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('saltAdults', 'Adultos:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('saltAdults', null, ['class' => 'form-control']) }}
                    </div>

                    {{ Form::label('saltChildren', 'Niños (hasta 11 años):', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('saltChildren', null, ['class' => 'form-control']) }}
                    </div>
                </div>
            </fieldset>

            {{-- RV Parking --}}
            <fieldset>
                <legend class="section-content-subtitle">RV Parking</legend>

                <div class="form-group">
                    {{ Form::label('checkinRv', 'Fecha de entrada:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('checkinRv', null, ['class' => 'form-control', 'placeholder' => 'dd/mm/aaaa']) }}
                    </div>

                    {{ Form::label('checkoutRv', 'Fecha de salida:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('checkoutRv', null, ['class' => 'form-control', 'placeholder' => 'dd/mm/aaaa']) }}
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
                        {{ Form::checkbox('campingRv') }} Tienda de campaña
                    </label>
                    <label class="checkbox-inline col-sm-2 col-sm-push-1">
                        {{ Form::checkbox('vanRv') }} Van
                    </label>
                    <label class="checkbox-inline col-sm-2 col-sm-push-1">
                        {{ Form::checkbox('camperRv') }} Camper
                    </label>
                    <label class="checkbox-inline col-sm-3 col-sm-push-1">
                        {{ Form::checkbox('fifthWheelRv') }} Fifth wheel
                    </label>
                </div>

            </fieldset>

            {{-- Banquet --}}
            <fieldset>
                <legend class="section-content-subtitle">Banquetes</legend>

                <div class="form-group">
                    {{ Form::label('banquetDate', 'Fecha:', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('banquetDate', null, ['class' => 'form-control', 'placeholder' => 'dd/mm/aaaa']) }}
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
                        Panel content
                    </div>
                </div>
            </aside>

        </article>

    </div>

@endsection