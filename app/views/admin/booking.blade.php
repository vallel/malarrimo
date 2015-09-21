@extends('admin/layout')

@section('appendHead')
    {{ HTML::style('css/dataTables.bootstrap.css') }}
@endsection

@section('appendScripts')
    {{ HTML::script('js/vendor/jquery.dataTables.min.js') }}
    {{ HTML::script('js/vendor/dataTables.bootstrap.js') }}
    {{ HTML::script('js/admin.booking.js') }}
@endsection

@section('content')

    <h1 class="page-header">Reservaciones</h1>

    @if (Session::has('msg'))
        {{ Session::get('msg') }}
    @endif

    <!--<a href="" class="btn btn-primary tool-btn pull-right"><span class="glyphicon glyphicon-plus"></span> Registrar reservación</a>-->

    <table class="table table-striped booking-table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Fax</th>
                <th>Origen</th>
                <th>Estatus</th>
                <th class="actions-column"></th>
            </tr>
        </thead>

        <tbody>
        @if (isset($bookingList) && $bookingList->count() > 0)
            @foreach ($bookingList as $booking)

            <tr>
                <td>{{ $booking->name }}</td>
                <td>{{ $booking->email }}</td>
                <td>{{ $booking->phone }}</td>
                <td>{{ $booking->fax }}</td>
                <td>{{ $booking->city . ', ' . $booking->country }}</td>
                <td><span class="label {{ $booking->statusLabel }}">{{ $booking->fullStatus }}</span></td>
                <td>
                    <a href="#detalles" data-url="{{ route('getBookingDetails', ['id' => $booking->id]) }}" class="btn btn-default booking-details-btn" title="Ver detalles"><span class="glyphicon glyphicon-zoom-in"></span></a>
                    <a href="{{ route('changeBookingStatus', ['id' => $booking->id, 'status' => 'C']) }}" class="btn btn-default change-status-btn" title="Cancelar"><span class="glyphicon glyphicon-remove-circle"></span></a>
                    <a href="{{ route('changeBookingStatus', ['id' => $booking->id, 'status' => 'A']) }}" class="btn btn-default change-status-btn" title="Confirmar"><span class="glyphicon glyphicon-ok-circle"></span></a>
                </td>
            </tr>

            @endforeach
        @endif
        </tbody>

    </table>

    @if (isset($bookingList))
        {{ $bookingList->links() }}
    @endif

    <div class="modal fade booking-details">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Detalles de reservación</h4>
                </div>
                <div class="modal-body">
                    <div class="booking-details-content"></div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection