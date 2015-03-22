<table class="table">
    <tr>
        <td class="table-label">Nombre:</td>
        <td>{{ $data->name }}</td>
    </tr>
    <tr>
        <td class="table-label">Dirección:</td>
        <td>{{ $data->address . ', ' . $data->city . ', ' . $data->country }}</td>
    </tr>
    <tr>
        <td class="table-label">Teléfono/Fax:</td>
        <td>{{ $data->phone . ($data->fax ? ' / ' . $data->fax : '') }}</td>
    </tr>
    <tr>
        <td class="table-label">Email:</td>
        <td>{{ $data->email }}</td>
    </tr>
    <tr>
        <td class="table-label">Fecha de registro:</td>
        <td>{{ date('d/m/Y h:i:s a', strtotime($data->created_at)) }}</td>
    </tr>
</table>

<!-- HOTEL -->
@if (($data->hotelSingleRooms || $data->hotelDoubleRooms) && $data->hotelAdults && $data->hotelCheckIn)
<fieldset>
    <legend>Hotel</legend>
    <table class="table">
        <tr>
            <td class="col-md-6">
                {{ $data->hotelSingleRooms ? $data->hotelSingleRooms . ' habitaciones sencilas<br/>' : '' }}
                {{ $data->hotelDoubleRooms ? $data->hotelDoubleRooms . ' habitaciones dobles<br/>' : '' }}
                {{ '&nbsp;&nbsp;' . ($data->hotelAdults ? $data->hotelAdults . ' adultos' : '') . ($data->hotelChildren ? ', ' . $data->hotelChildren . ' niños' : '') }}
            </td>
            <td class="col-md-6">
                {{ date('d/m/Y', strtotime($data->hotelCheckIn)) . ' - ' . date('d/m/Y', strtotime($data->hotelCheckOut)) }}
            </td>
        </tr>
    </table>
</fieldset>
@endif

<!-- WHALES -->
@if ($data->whalesAdults && $data->whalesDate)
<fieldset>
    <legend>Tour Ballena Gris</legend>
    <table class="table">
        <tr>
            <td class="col-md-6">
                {{ ($data->whalesAdults ? $data->whalesAdults . ' adultos' : '') . ($data->whalesChildren ? ', ' . $data->whalesChildren . ' niños' : '') }}
            </td>
            <td class="col-md-6">
                {{ date('d/m/Y', strtotime($data->whalesDate)) . ' ' . $data->whalesTime }}
            </td>
        </tr>
    </table>
</fieldset>
@endif

<!-- CAVE PAINTINGS -->
@if ($data->cavePaintingsAdults && $data->cavePaintingDate)
<fieldset>
    <legend>Tour Pinturas Rupestres</legend>
    <table class="table">
        <tr>
            <td class="col-md-6">
                {{ ($data->cavePaintingsAdults ? $data->cavePaintingsAdults . ' adultos' : '') . ($data->cavePaintingsChildren ? ', ' . $data->cavePaintingsChildren . ' niños' : '') }}
            </td>
            <td class="col-md-6">
                {{ date('d/m/Y', strtotime($data->cavePaintingDate))}}
            </td>
        </tr>
    </table>
</fieldset>
@endif

<!-- SALT MINE -->
@if ($data->saltMineAdults && $data->saltMineDate)
<fieldset>
    <legend>Tour Salinas</legend>
    <table class="table">
        <tr>
            <td class="col-md-6">
                {{ ($data->saltMineAdults ? $data->saltMineAdults . ' adultos' : '') . ($data->saltMineChildren ? ', ' . $data->saltMineChildren . ' niños' : '') }}
            </td>
            <td class="col-md-6">
                {{ date('d/m/Y', strtotime($data->saltMineDate))}}
            </td>
        </tr>
    </table>
</fieldset>
@endif

<!-- RV PARKING -->
@if ($data->rvAdults && $data->rvCheckIn)
<fieldset>
    <legend>RV Parking</legend>
    <table class="table">
        <tr>
            <td class="col-md-6">
                {{ $data->rvCamping ? 'Tienda de campaña<br/>' : '' }}
                {{ $data->rvCamper ? 'Camper<br/>' : '' }}
                {{ $data->rvVan ? 'Van<br/>' : '' }}
                {{ $data->rvFifthWheel ? 'Fifth wheel<br/>' : '' }}
                {{ '&nbsp;&nbsp;' . ($data->rvAdults ? $data->rvAdults . ' adultos' : '') . ($data->rvChildren ? ', ' . $data->rvChildren . ' niños' : '') }}
            </td>
            <td class="col-md-6">
                {{ date('d/m/Y', strtotime($data->rvCheckIn)) . ' - ' . date('d/m/Y', strtotime($data->rvCheckOut)) }}
            </td>
        </tr>
    </table>
</fieldset>
@endif

<!-- BANQUET -->
@if ($data->banquetPersons && $data->banquetDate)
<fieldset>
    <legend>Banquetes</legend>
    <table class="table">
        <tr>
            <td class="col-md-6">
                {{ $data->banquetPersons ? $data->banquetPersons . ' personas' : '' }}
            </td>
            <td class="col-md-6">
                {{ date('d/m/Y', strtotime($data->banquetDate)) . ' ' . $data->banquetTime }}
            </td>
        </tr>
    </table>
</fieldset>
@endif