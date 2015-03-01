@extends('admin/layout')

@section('scripts')

@endsection

@section('content')

    <h1 class="page-header">Reservaciones</h1>

    @if (Session::has('msg'))
        {{ Session::get('msg') }}
    @endif

    <a href="" class="btn btn-primary tool-btn pull-right"><span class="glyphicon glyphicon-plus"></span> Registrar reservación</a>

    <table class="table table-striped">
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Fax</th>
            <th>Origen</th>
            <th>Estatus</th>
            <th style="width: 150px;"></th>
        </tr>

        @if (isset($bookingList) && $bookingList->count() > 0)
            @foreach ($bookingList as $booking)

            <tr>
                <td>{{ $booking->name }}</td>
                <td>{{ $booking->email }}</td>
                <td>{{ $booking->phone }}</td>
                <td>{{ $booking->fax }}</td>
                <td>{{ $booking->city . ', ' . $booking->country }}</td>
                <td>{{ $booking->status }}</td>
                <td>
                    <a href="" class="btn btn-default" title="Ver detalles"><span class="glyphicon glyphicon-zoom-in"></span></a>
                    <a href="" class="btn btn-danger" title="Cancelar"><span class="glyphicon glyphicon-remove-circle"></span></a>
                    <a href="" class="btn btn-success" title="Confirmar"><span class="glyphicon glyphicon-ok-circle"></span></a>
                </td>
            </tr>

            @endforeach

        @else
            <tr>
                <td colspan="5" class="text-center">No hay reservaciones registradas</td>
            </tr>
        @endif

    </table>

@endsection