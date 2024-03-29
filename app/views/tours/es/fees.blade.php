@extends('tours.layout')

@section('toursContent')

    <h1 class="section-content-title">Tarifas</h1>

    <p>Viajes diarios de 8:00 a.m. a 12:00 p.m. y de 11:00 a.m. a 3:00 p.m. (horario estándar de la montaña).</p>

    <ul class="section-content-list">
        <li>Cupo máximo de 10 pasajeros por embarcación</li>
        <li>Niños menores de 6 años bajo responsabilidad de sus padres</li>
        <li>Temporada oficial del 15 de diciembre al 15 de abril</li>
    </ul>

    <h2 class="section-content-subtitle">Tarifas vigentes para la temporada {{$feesSeason}}:</h2>

    <table class="table fees-grid">
        @foreach($fees as $fee)
            <tr>
                <td>{{$fee->name}}</td>
                <td>${{$fee->pesos_fee > 0 ? $fee->pesos_fee . ' pesos' : $fee->dollars_fee . ' USD'}} <span class="small">(no incluye pago de área protegida)</span></td>
            </tr>
        @endforeach
    </table>

    <p>*El pago de derechos por visitar un área protegida es obligatorio. Este pago no aplica para menores de 6 años
        y/o discapacitados.</p>

    <p>*El pago por Área Natural Protegida puede variar de acuerdo a los cambios en la Ley federal de Derechos
        publicada anualmente en el Diario Oficial de la Federación en su Artículo 198 y 198-A.</p>

    <p class="alert alert-warning" role="alert">
        <strong>NACIONALES CON IFE</strong> preguntar por tarifa <strong>PLAN VIVE MEXICO</strong> para una tarifa más baja
        (presentar credencial IFE obligatoria)
    </p>

    <p>Los viajes incluyen:</p>

    <ul class="section-content-list">
        <li>Transporte a la laguna (1 hora viaje redondo)</li>
        <li>Guía bilingüe</li>
        <li>3 horas en lancha</li>
        <li>Box lunch y bebida</li>
        <li>Seguro de Responsabilidad Civil</li>
    </ul>

@endsection