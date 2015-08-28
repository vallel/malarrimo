@extends('tours.layout')

@section('toursContent')

    <h1 class="section-content-title">Cochimie trails - Cave painting tours</h1>

    <h2 class="section-content-subtitle">COCHIMIE 1 (8 HOUR DAY EXCURSION)</h2>

    <p>An exploration of Cueva La Monumental on Mesa del Carmen in Sierra de San Francisco with stopovers in El Arco, the Valley of Giant Cactus and Pozo Aleman, plus lunch.</p>

    <p>Tours depart from Malarrimo Eco-Tours office at 9:00 a.m. (Mountain Time) and include:</p>

    <ul class="section-content-list">
        <li>Luxury van transportation</li>
        <li>Visit to the old copper mining town of El Arco</li>
        <li>Visit to the Cactus and Cirio Valley</li>
        <li>Visit to Cueva La Monumental (The Monumental Cave)</li>
        <li>Visit to old ranch of El Aleman</li>
    </ul>

    <table class="table fees-grid">
        @foreach($fees as $fee)
            <tr>
                <td>{{Lang::get('fees.'.$fee->name).' '.$fee->min_person_number.' - '.$fee->max_person_number.' Pax'}}</td>
                <td>${{$fee->dollars_fee > 0 ? $fee->dollars_fee.' dlls' : $fee->pesos_fee.' pesos'}} x Person</td>
            </tr>
        @endforeach
    </table>


    <h2 class="section-content-subtitle">COCHIMIE 2 (8 HOUR DAY EXCURSION)</h2>

    <p>For the hardy, an exploration of Cueva El Raton and the spectacular mountain and desert flora of Sierra de San Francisco (elevation 1000 meters), plus lunch.</p>

    <p>Tours depart from Malarrimo Eco-Tours office at 9:00 a.m. (Mountain Time) and include:</p>

    <ul class="section-content-list">
        <li>Luxury van transportation</li>
        <li>Stopovers at observation points with panoramic views of deep canyons, the Vizcaino Desert and San Ignacio Lagoon</li>
        <li>Stopover at Rancho San Francisco (for registration)</li>
        <li>Visit to Cueva El Raton (Cave of the Rat)</li>
        <li>Snacks, sodas and specially prepared gourmet lunch</li>
        <li>Bilingual guide</li>
    </ul>

    <table class="table fees-grid">
        @foreach($fees as $fee)
            <tr>
                <td>{{Lang::get('fees.'.$fee->name).' '.$fee->min_person_number.' - '.$fee->max_person_number.' Pax'}}</td>
                <td>${{$fee->dollars_fee > 0 ? $fee->dollars_fee.' dlls' : $fee->pesos_fee.' pesos'}} x Person</td>
            </tr>
        @endforeach
    </table>


    <h2 class="section-content-subtitle">COCHIMIE PLUS (3 DAY BAJA PACK TRIP)</h2>

    <p>For the adventurous, a muleback excursion to Cueva de las Flechas and Cueva La Pintada in the Sierra de San Francisco. Of Level Two difficulty, hiking experience is necessary.</p>

    <p>Tour groups have the option of departing from either Guerrero Negro or San Ignacio.</p>

    <p>Visit us, we take care of the rest!</p>

    <p>Included Services:</p>

    <ul class="section-content-list">
        <li>Bilingual guide</li>
        <li>Monitor and cook</li>
        <li>Luxury van transportation Mules, burros and packers</li>
        <li>Drinking water, snacks and meals in the outdoors</li>
        <li>Tents</li>
        <li>Sleeping bags (optional) and foam mattresses</li>
        <li>Basic first aid supplies</li>
        <li>Permits from the National Institute of Anthropology and History (INAH)</li>
    </ul>

    <table class="table fees-grid">
        <tr>
            <td>
                Mínimo 4 Pax<br>
                Máximo 8 pax
            </td>
            <td style="vertical-align: middle">$150.00 US x Person x Day</td>
        </tr>
    </table>

    <h3 class="section-content-subtitle">Description</h3>

    <p><strong>Day 1</strong><br>
        Travel by van to picturesque San Ignacio for mandatory registration at the National Institute of Anthropology and History (INAH) office next to the mission and museum. We head back north on the highway, then east on a graded road to Rancho San Francisco in the Sierra de San Francisco. Sturdy mules are the next mode of transportation as we ride 3-4 hours to our base camp in Canon de Santa Teresa, where we relax, savor a special gourmet dinner packed by Restaurant Malarrimo and camp overnight. Here we can begin to experience the true pioneer flavor of an untouched land, the Baja of John Steinbeck, Erle Stanley Gardner and Ray Cannon.</p>

    <p><strong>Day 2</strong><br>
        After a high-energy trail breakfast, we mount up for a 1-11/2 hour mule ride, followed by a 40-minute hike to Cueva de las Flechas (Cave of the Arrows), named after the pictographs of monos (human figures) pierced with arrows. We trek across the arroyo and enjoy a light lunch near the awesome Cueva La Pintada (The Painted Cave) with its numerous, extremely well preserved images of men, women, deer, bighorn sheep and other animals. This cave reputedly was discovered by Erle Stanley Gardner (creator of Perry Mason) in 1962.
        Good hiking boots are mandatory because of the rocky terrain and uphill climb, similar to hiking to Vernal Falls in Yosemite National Park. Anyone in good physical condition can do it with ease. After admiring the caves, we hike and ride back to our base camp for a gourmet dinner.</p>

    <p><strong>Day 3</strong><br>
        After breakfast we break camp and ride back to Rancho San Francisco, where we enjoy a light lunch before returning to San Ignacio or Guerrero Negro. We make stops at observation points with panoramic views of deep canyons, the Vizcaino Desert and San Ignacio Lagoon.</p>

    <p>The thrill doesn't end with your arrival in Guerrero Negro. When everyone is gathered around the water cooler at work, you can spin an impressive tale of your pack trip experiences in Baja California, You can be assured you will not hear "Been there-Done that" from your co-workers or friends!</p>


    <div class="alert alert-warning" role="alert">
        <p><strong>Very important</strong></p>

        <p>Visitors should be in good health and physical condition since much of the terrain is rural and most of the time rugged.</p>

        <p>Persons under medical treatment should carry sufficient medication. Foreigners should bring medical prescription and formula for the equivalents in Mexico.</p>

        <p>No one under 16 years old or over 65 years old is permitted on the Cochimie Plus Tour. Minors must be under strict supervision and are the responsibility of their parents.</p>

        <p>Maximum weight per person is 220 lbs. (100 kilos).</p>

        <p>Maximum luggage weight per person is 22 lbs. (10 kilos) including day pack with camera and personal items.</p>
    </div>

    <h2 class="section-content-subtitle">What To Wear and Bring:</h2>

    <ul class="section-content-list">
        <li>Hiking boots</li>
        <li>Jeans (shorts not recommended)</li>
        <li>Jacket or windbreaker</li>
        <li>Small knapsack or day pack</li>
        <li>Sunglasses and sunscreen</li>
        <li>Camera, flash and film (560 pesos INAH fee per camera NOT included)</li>
    </ul>

@endsection
