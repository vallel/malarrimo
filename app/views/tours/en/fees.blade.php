@extends('tours.layout')

@section('toursContent')

    <h1 class="section-content-title">Rates</h1>

    <p>Scheduled tours: 8:00 a.m. to 12:00 p.m. Mountain Standard Time 11:00 a.m. to 3:00 p.m. Mountain Standard Time.</p>

    <ul class="section-content-list">
        <li>MAXIMUM 10 PASSENGERS PER BOAT</li>
        <li>Children under 6 year will not be permitted on tour without signed waiver from parent.</li>
    </ul>

    <h2 class="section-content-subtitle">The rates for the next whale-whatching season {{$feesSeason}} are:</h2>

    <table class="table fees-grid">
        @foreach($fees as $fee)
            <tr>
                <td>{{Lang::get('fees.'.$fee->name)}}</td>
                <td>${{$fee->dollars_fee > 0 ? $fee->dollars_fee . ' USD' : $fee->pesos_fee . ' pesos'}} <span class="small">(*plus National Park Fee)</span></td>
            </tr>
        @endforeach
    </table>

    <p>Dated on November 10, 2005, the Mexican Government have apply the new National Park Fee in $40.00 ps. for most
        of the National Resource Areas, including El Vizcaíno Biosphere Reserve in wich extension are included
        Scammon's Lagoon and San Ignacio Lagoon. This charge will not apply for children under 6 years and/or
        handicapped. This is a federal charge that have to be paid with the tour company giving services in the
        national resource to visit and will apply from January 2006.</p>

    <p>National Park fee may change according to government tabulation made by the Mexican Government every year in
        Rights Law, Art. 198 and Art. 198-A.</p>

    <p>Prices include:</p>

    <ul class="section-content-list">
        <li>Round trip transportation from Restaurant Malarrimo to Scammon's Lagoon</li>
        <li>Bilingual guide</li>
        <li>Boat excursion 3-hour</li>
        <li>Light box lunch and beverage</li>
    </ul>

@endsection