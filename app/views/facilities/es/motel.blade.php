@extends('facilities.layout')

@section('facilities.content')

    <h1 class="section-content-title">Motel Malarrimo</h1>
    <p>Embellecido con pequeños jardines de flores, el hotel ofrece 10 confortables habitaciones estándar y 8
        habitaciones Mex Room para quienes gustan de mayor confort. Todas las habitaciones cuentan con:</p>

    <ul class="section-content-list">
        <li>Baño privado</li>
        <li>TV a color</li>
        <li>Cafetera</li>
        <li>Agua embotellada</li>
        <li>Jabones y shampoo</li>
        <li>Servicio de internet inalámbrico gratis</li>
        <li>Y un personal dispuesto y amable para servirle</li>
    </ul>

    <p>*Lo sentimos, no se aceptan mascotas en las habitaciones</p>

    <h2 class="section-content-subtitle">Tarifas vigentes ({{$feesSeason}}):</h2>

    <table class="table fees-grid">
        @foreach($fees as $fee)
            <tr>
                <td>{{$fee->name}}</td>
                <td>${{$fee->pesos_fee or $fee->dollars_fee}} {{$fee->pesos_fee ? ' pesos' : ' dolares'}}</td>
            </tr>
        @endforeach
    </table>

@endsection