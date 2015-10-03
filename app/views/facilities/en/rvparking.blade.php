@extends('facilities.layout')

@section('facilities.content')

    <h1 class="section-content-title">RV Parking</h1>
    <p>Malarrimo RV Parking offers 45 sites with full water, sewage and 110 volt/30 amps. electric hookups, restrooms
        with hot showers and a tent camping area.</p>

    <p>* Pets are permitted on leash.</p>

    <h2 class="section-content-subtitle">Current rates ({{$feesSeason}}):</h2>

    <table class="table fees-grid">
        @foreach($fees as $fee)
            <tr>
                <td>{{$fee->name}}</td>
                <td>${{$fee->dollars_fee > 0 ? $fee->dollars_fee . ' USD' : $fee->pesos_fee . ' pesos'}}</td>
            </tr>
        @endforeach
    </table>

@endsection