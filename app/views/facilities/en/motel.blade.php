@extends('facilities.layout')

@section('facilities.content')

    <h1 class="section-content-title">Motel Malarrimo</h1>
    <p>Landscaped with small, colorful flower gardens, the attractive hotel features 10 clean and comfortable rooms
        and 8 mexrooms for all those looking for more comfort. Each room in Malarrimo is equiped and supplied with:</p>

    <ul class="section-content-list">
        <li>Private bath with hot shower</li>
        <li>Color T.V.</li>
        <li>Cofee maker</li>
        <li>Bottled water</li>
        <li>Soaps and shampoo</li>
        <li>Free wireless internet service</li>
        <li>And friendly staff ready to assist you, most of them bilingual.</li>
    </ul>

    <p>*We are sorry, pets are not allowed in the rooms</p>

    <h2 class="section-content-subtitle">Current rates ({{$feesSeason}}):</h2>

    <table class="table fees-grid">
        @foreach($fees as $fee)
            <tr>
                <td>{{Lang::get('fees.' . $fee->short_name)}}</td>
                <td>${{$fee->dollars_fee > 0 ? $fee->dollars_fee . ' USD' : $fee->pesos_fee . ' pesos'}}</td>
            </tr>
        @endforeach
    </table>

@endsection