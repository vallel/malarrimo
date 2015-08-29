@extends('layout')

@section('content')

    <header class="section-header">

        <h1>{{ Lang::get('booking.booking') }}</h1>
        {{ Lang::get('booking.headerText') }}

    </header>

    <div class="section-content">

        <article class="booking-container clearfix">

            @if ($errors->any())
                <ul class="alert alert-danger">
                @foreach ($errors->all('<li>:message</li>') as $message)
                    {{ $message }}
                @endforeach
                </ul>
            @endif

            {{ Form::open(['route' => 'storeBooking', 'role' => 'form', 'class' => ' col-sm-8 form-horizontal booking-form']) }}

            {{-- General data --}}
            <fieldset>
                <legend class="section-content-subtitle">{{ Lang::get('booking.generalData') }}</legend>

                {{ Field::text('name', Lang::get('booking.name').':', null, ['placeholder' => Lang::get('booking.name'), 'required' => ''], ['template' => 'horizontal']) }}

                {{ Field::email('email', Lang::get('booking.email').':', null, ['placeholder' => Lang::get('booking.email'), 'required' => ''], ['template' => 'horizontal']) }}
                {{ Field::email('email_confirmation', Lang::get('booking.emailConfirmation').':', null, ['placeholder' => Lang::get('booking.emailConfirmation'), 'required' => ''], ['template' => 'horizontal']) }}

                <div class="form-group">
                    {{ Form::label('phone', Lang::get('booking.phone').':', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => Lang::get('booking.phone'), 'required' => '']) }}
                    </div>

                    {{ Form::label('fax', Lang::get('booking.fax').':', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('fax', null, ['class' => 'form-control', 'placeholder' => Lang::get('booking.fax')]) }}
                    </div>
                </div>

                {{ Field::text('address', Lang::get('booking.address').':', null, ['placeholder' => Lang::get('booking.address'), 'required' => ''], ['template' => 'horizontal']) }}

                <div class="form-group">
                    {{ Form::label('city', Lang::get('booking.city').':', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('city', null, ['class' => 'form-control', 'placeholder' => Lang::get('booking.city'), 'required' => '']) }}
                    </div>

                    {{ Form::label('country', Lang::get('booking.country').':', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('country', null, ['class' => 'form-control', 'placeholder' => Lang::get('booking.country'), 'required' => '']) }}
                    </div>
                </div>

            </fieldset>

            {{-- Hotel --}}
            <fieldset>
                <legend class="section-content-subtitle">{{ Lang::get('booking.hotel') }}</legend>

                <div class="form-group">
                    {{ Form::label('hotelCheckIn', Lang::get('booking.checkIn').':', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('hotelCheckIn', null, [
                            'class' => 'form-control datepicker start-date hotel-input',
                            'placeholder' => 'dd/mm/aaaa',
                            'data-end' => 'hotelCheckOut'
                        ]) }}
                    </div>

                    {{ Form::label('hotelCheckOut', Lang::get('booking.checkOut').':', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('hotelCheckOut', null, [
                            'class' => 'form-control datepicker end-date hotel-input',
                            'placeholder' => 'dd/mm/aaaa',
                            'data-start' => 'hotelCheckIn'
                        ]) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('hotelSingleRooms', Lang::get('booking.singleRooms').':', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('hotelSingleRooms', null, ['class' => 'form-control hotel-input numeric-input']) }}
                    </div>

                    {{ Form::label('hotelDoubleRooms', Lang::get('booking.doubleRooms').':', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('hotelDoubleRooms', null, ['class' => 'form-control hotel-input numeric-input']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('hotelAdults', Lang::get('booking.adults').':', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('hotelAdults', null, ['class' => 'form-control hotel-input numeric-input']) }}
                    </div>

                    {{ Form::label('hotelChildren', Lang::get('booking.children').':', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('hotelChildren', null, ['class' => 'form-control hotel-input numeric-input']) }}
                    </div>
                </div>

            </fieldset>

            {{-- Whale watching tours --}}
            <fieldset>
                <legend class="section-content-subtitle">{{ Lang::get('booking.whales') }}</legend>

                <div class="form-group">
                    {{ Form::label('whalesDate', Lang::get('booking.date').':', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('whalesDate', null,
                            ['class' => 'form-control datepicker start-date whales-input',
                            'placeholder' => 'dd/mm/aaaa']) }}
                    </div>

                    {{ Form::label('whalesTime', Lang::get('booking.schedule').':', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::select('whalesTime',
                            ['8:00 a.m.' => '8:00 a.m. - 12:00 p.m.',
                             '11:00 a.m.' => '11:00 a.m. - 3:00 p.m.'],
                            null, ['class' => 'form-control whales-input']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('whalesAdults', Lang::get('booking.adults').':', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('whalesAdults', null, ['class' => 'form-control whales-input numeric-input']) }}
                    </div>

                    {{ Form::label('whalesChildren', Lang::get('booking.children').' '.Lang::get('booking.childrenAge').':', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('whalesChildren', null, ['class' => 'form-control whales-input numeric-input']) }}
                    </div>
                </div>

            </fieldset>

            {{-- Cave paintings tours --}}
            <fieldset>
                <legend class="section-content-subtitle">{{ Lang::get('booking.cavePainting') }}</legend>

                <div class="form-group">
                    {{ Form::label('cavePaintingDate', Lang::get('booking.date').':', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('cavePaintingDate', null, [
                            'class' => 'form-control datepicker start-date cave-painting-input', 'placeholder' => 'dd/mm/aaaa']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('cavePaintingAdults', Lang::get('booking.adults').':', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('cavePaintingAdults', null, ['class' => 'form-control cave-painting-input numeric-input']) }}
                    </div>

                    {{ Form::label('cavePaintingChildren', Lang::get('booking.children').' '.Lang::get('booking.childrenAge').':', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('cavePaintingChildren', null, ['class' => 'form-control cave-painting-input numeric-input']) }}
                    </div>
                </div>
            </fieldset>

            {{-- Salt mine tours --}}
            <fieldset>
                <legend class="section-content-subtitle">{{ Lang::get('booking.saltMine') }}</legend>

                <div class="form-group">
                    {{ Form::label('saltMineDate', Lang::get('booking.date').':', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('saltMineDate', null, ['class' => 'form-control datepicker start-date salt-mine-input', 'placeholder' => 'dd/mm/aaaa']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('saltMineAdults', Lang::get('booking.adults').':', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('saltMineAdults', null, ['class' => 'form-control salt-mine-input numeric-input']) }}
                    </div>

                    {{ Form::label('saltMineChildren', Lang::get('booking.children').' '.Lang::get('booking.childrenAge').':', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('saltMineChildren', null, ['class' => 'form-control salt-mine-input numeric-input']) }}
                    </div>
                </div>
            </fieldset>

            {{-- RV Parking --}}
            <fieldset>
                <legend class="section-content-subtitle">{{ Lang::get('booking.rv') }}</legend>

                <div class="form-group">
                    {{ Form::label('rvCheckIn', Lang::get('booking.checkIn').':', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('rvCheckIn', null, [
                            'class' => 'form-control datepicker start-date rv-input',
                            'placeholder' => 'dd/mm/aaaa',
                            'data-end' => 'rvCheckOut'
                        ]) }}
                    </div>

                    {{ Form::label('rvCheckOut', Lang::get('booking.checkOut').':', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('rvCheckOut', null, [
                            'class' => 'form-control datepicker end-date rv-input',
                            'placeholder' => 'dd/mm/aaaa',
                            'data-start' => 'rvCheckIn'
                        ]) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('rvAdults', Lang::get('booking.adults').':', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('rvAdults', null, ['class' => 'form-control rv-input numeric-input']) }}
                    </div>

                    {{ Form::label('rvChildren', Lang::get('booking.children').':', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('rvChildren', null, ['class' => 'form-control rv-input numeric-input']) }}
                    </div>
                </div>

                <div class="form-group">
                    <label class="checkbox-inline col-sm-4 col-sm-push-1">
                        {{ Form::checkbox('rvCamping', 1, null, ['id' => 'rvCamping', 'class' => 'rv-input']).' '.Lang::get('booking.camping') }}
                    </label>
                    <label class="checkbox-inline col-sm-2 col-sm-push-1">
                        {{ Form::checkbox('rvVan', 1, null, ['id' => 'rvVan', 'class' => 'rv-input']).' '.Lang::get('booking.van') }}
                    </label>
                    <label class="checkbox-inline col-sm-2 col-sm-push-1">
                        {{ Form::checkbox('rvCamper', 1, null, ['id' => 'rvCamper', 'class' => 'rv-input']).' '.Lang::get('booking.camper') }}
                    </label>
                    <label class="checkbox-inline col-sm-3 col-sm-push-1">
                        {{ Form::checkbox('rvFifthWheel', 1, null, ['id' => 'rvFifthWheel', 'class' => 'rv-input']).' '.Lang::get('booking.fifthWheel') }}
                    </label>
                </div>

            </fieldset>

            {{-- Banquet --}}
            <fieldset>
                <legend class="section-content-subtitle">{{ Lang::get('booking.banquet') }}</legend>

                <div class="form-group">
                    {{ Form::label('banquetDate', Lang::get('booking.date').':', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('banquetDate', null, ['class' => 'form-control datepicker start-date banquet-input', 'placeholder' => 'dd/mm/aaaa']) }}
                    </div>

                    {{ Form::label('banquetSchedule', Lang::get('booking.schedule').':', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('banquetSchedule', null, ['class' => 'form-control banquet-input', 'placeholder' => 'hh:mm']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('banquetPersons', Lang::get('booking.numberPersons').':', ['class' => 'col-sm-8 control-label']) }}
                    <div class="col-sm-4">
                        {{ Form::text('banquetPersons', null, ['class' => 'form-control banquet-input numeric-input']) }}
                    </div>
                </div>

            </fieldset>

            <button type="submit" class="btn btn-lg btn-info pull-right col-sm-4">{{ Lang::get('booking.reserve') }}</button>

            {{ Form::close() }}

            <aside class="col-sm-4 booking-summary">
                <div class="panel panel-default booking-summary-panel">
                    <div class="panel-heading">{{ Lang::get('booking.yourBooking') }}</div>
                    <div class="panel-body">
                        <article class="booking-summary-element booking-summary-hotel"></article>
                        <article class="booking-summary-element booking-summary-whales"></article>
                        <article class="booking-summary-element booking-summary-cave-painting"></article>
                        <article class="booking-summary-element booking-summary-salt-mine"></article>
                        <article class="booking-summary-element booking-summary-rv"></article>
                        <article class="booking-summary-element booking-summary-restaurant"></article>
                    </div>
                </div>
            </aside>

        </article>

    </div>

@endsection

@section('appendHead')
    {{ HTML::style('css/datepicker.css') }}
    <script>
        var fees = {{$fees}};
    </script>
@endsection

@section('scripts')
    {{ HTML::script('js/bootstrap-datepicker.js') }}
    {{ HTML::script('js/booking.js') }}
@endsection