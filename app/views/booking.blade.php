@extends('layout')

@section('content')

    <header class="section-header">

        <h1>Reservaciones</h1>
        <p>Reserva, cotiza y arma tu paquete</p>

    </header>

    <div class="section-content">

        <article class="booking-container">

            {{ Form::open(['route' => 'storeBooking', 'role' => 'form', 'class' => ' col-sm-8 form-horizontal booking-form']) }}

            <fieldset>
                <legend class="section-content-subtitle">Datos generales:</legend>

                {{ Field::text('name', 'Nombre:', null, ['placeholder' => 'Nombre'], ['template' => 'horizontal']) }}

                {{ Field::email('email', 'Correo electrónico:', null, ['placeholder' => 'Correo electrónico'], ['template' => 'horizontal']) }}

                <div class="form-group">
                    <label for="phone" class="col-sm-2 control-label">Teléfono:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="phone" placeholder="Teléfono">
                    </div>

                    <label for="fax" class="col-sm-2 control-label">Fax:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="fax" placeholder="Fax">
                    </div>
                </div>

                {{ Field::email('address', 'Dirección:', null, ['placeholder' => 'Dirección'], ['template' => 'horizontal']) }}

                <div class="form-group">
                    <label for="city" class="col-sm-2 control-label">Ciudad:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="city" placeholder="Ciudad">
                    </div>

                    <label for="country" class="col-sm-2 control-label">País:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="country" placeholder="País">
                    </div>
                </div>

            </fieldset>

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