@extends('facilities.layout')

@section('facilities.content')

    <h1 class="section-content-title">RV Parking (Estacionamiento de casas rodantes)</h1>
    <p>El RV Parking (estacionamiento de casas rodantes) ofrece 45 espacios con servicios completos de agua, drenaje,
        conexiones eléctricas de 110 volts/30 amps, baños con agua caliente en las regaderas y un área para
        casas de campaña.</p>

    <p>*Se permiten mascotas bajo responsabilidad de los dueños</p>

    <h2 class="section-content-subtitle">Tarifas vigentes ({{$feesSeason}}):</h2>

    <table class="table fees-grid">
        @foreach($fees as $fee)
            <tr>
                <td>{{$fee->name}}</td>
                <td>${{$fee->pesos_fee > 0 ? $fee->pesos_fee . ' pesos' : $fee->dollars_fee . ' USD'}}</td>
            </tr>
        @endforeach
    </table>

@endsection