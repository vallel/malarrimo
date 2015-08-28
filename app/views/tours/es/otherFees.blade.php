@extends('tours.layout')

@section('toursContent')

    <h1 class="section-content-title">"Rutas cochimies" Excursiones a las Pinturas Rupestres</h1>

    <h2 class="section-content-subtitle">Cochimies 1 (8 horas)</h2>

    <p>Excursión con duración de un día partiendo de Guerrero Negro y adentrándose en el desierto central de la Baja California, en una atmósfera de convivencia con la naturaleza y la historia.</p>

    <p>Partiendo a las 9:00 a.m. en Van de lujo incluye:</p>

    <ul class="section-content-list">
        <li>Transportación</li>
        <li>Guía</li>
        <li>Visita al Valle de Cactus y Cirios</li>
        <li>Visita a la Cueva del Carmen (pinturas rupestres)</li>
        <li>Visita al rancho Pozo Aléman</li>
        <li>Comida, refrescos y botanas</li>
    </ul>

    <table class="table fees-grid">
        @foreach($fees as $fee)
            <tr>
                <td>{{$fee->min_person_number.' - '.$fee->max_person_number.' '.$fee->name}}</td>
                <td>${{$fee->pesos_fee}} pesos x Persona</td>
            </tr>
        @endforeach
    </table>


    <h2 class="section-content-subtitle">Cochimies 2 (8 horas)</h2>

    <p>Excursión de un día partiendo de Guerrero Negro hacia el sur, cruzando por el desierto de Vizcaíno y sus campos agrícolas para después dirigirnos a la Sierra de San Francisco. En esta sierra podemos encontrar la Cueva del Ratón que por sus pinturas rupestres, cuya edad oscila alrededor de los 10,000 años, forma parte del Patrimonio Mundial de la Humanidad decretado por la ONU.</p>

    <p>Partiendo a las 9:00 a.m. en Van de lujo incluye:</p>

    <ul class="section-content-list">
        <li>Transportación</li>
        <li>Guía</li>
        <li>Paradas en sitios panorámicos, con vistas de los cañones, desierto del Vizcaíno y los salitrales de Laguna San Ignacio</li>
        <li>Visita Rancho San Francisco para registro INAH</li>
        <li>Visita a la Cueva del Ratón (pinturas rupestres)</li>
        <li>Comida, refrescos y botanas</li>
    </ul>

    <table class="table fees-grid">
        @foreach($fees as $fee)
            <tr>
                <td>{{$fee->min_person_number.' - '.$fee->max_person_number.' '.$fee->name}}</td>
                <td>${{$fee->pesos_fee}} pesos x Persona</td>
            </tr>
        @endforeach
    </table>


    <h2 class="section-content-subtitle">Cochimie (Excursión de 3 días)</h2>

    <p>Para los aventureros, excursión en mulas a la Cueva de Las Flechas y Cueva La pintada en la Sierra de San Francisco.</p>

    <p>Visitenos, de lo demás nos encargamos nosotros!</p>

    <ul class="section-content-list">
        <li>Guías</li>
        <li>Transportación en van de lujo con chofer</li>
        <li>Bestias de transporte y carga</li>
        <li>Guías locales y arrieros</li>
        <li>Alimentación (contamos con servicio de cocinero)</li>
        <li>Tiendas de acampar</li>
        <li>Bolsas de dormir (opcional)</li>
        <li>Primeros auxilios básicos</li>
        <li>Permisos INAH (excepto de los de cámaras fotográficas o video)</li>
    </ul>

    <table class="table fees-grid">
        <tr>
            <td>
                Mínimo 4 Pax<br>
                Máximo 8 pax
            </td>
            <td style="vertical-align: middle">$150.00 US x Persona x Día</td>
        </tr>
    </table>

    <h3 class="section-content-subtitle">Descripción</h3>

    <p><strong>Día 1</strong><br>
        Transportación en van de lujo hacia el poblado de San Ignacio para el registro de visitantes ante el INAH, para después dirigirnos a la estación de carga en la Sierra de San Francisco. En la estación de carga, cambiaremos de medio de transporte, es decir cambiaremos la van por el animal de transporte más confiable jamás inventado, "la mula". Por al rededor de 4 horas y siempre bajo la supervisión de expertos guías locales, cabalgaremos a través de los cañones hasta llegar al campamento base en donde descansaremos y disfrutaremos de la cena preparada por nuestro cocinero y nos prepararemos para el día siguiente con un merecido sueño.</p>

    <p><strong>Día 2</strong><br>
        Después de tomar un desayuno energético, iniciaremos nuestro camino hacia las cuevas La Pintada* y Las Flechas**, para lo cual es necesario montar por 1 hora aproximadamente, además de realizar una caminata de 45 minutos. Después de explorar las cuevas disfrutaremos de la comida de transición que ha sido preparada para usted y escucharemos historias, relatos acerca de las pinturas y sus alrededores. Cabalgaremos hacia el campamento al rededor de las 3 de la tarde. En el campamento nos espera una deliciosa cena que ha de ser la recompensa a los esfuerzos realizados.</p>

    <p><strong>Día 3</strong><br>
        El contar con el personal adecuado a lo largo del viaje resulta de lo más cómodo. Mientras usted se prepara para montar, nuestro personal se encarga de desarmar y limpiar el campamento. Esta última cabalgada nos llevará de regreso a la estación de carga. ¿Cuántas aves pudo identificar?, ¿Vio alguna codorniz, halcón, carpintero o acaso un águila?. Una buena sugerencia es el viajar con un guía de bolsillo con la información de la flora y la fauna de la región y aunque sabemos que es difícil leer al lomo de una mula, una vez en la estación o Guerrero Negro, comience a identificar todas las extrañas y bellas flores que usted observe durante el recorrido.</p>

    <p>El viaje no termina con su arribo a Guerrero Negro. Cuando todos estén alrededor de la cafetera en el trabajo o alrededor de una hielera con los amigos, usted comentará acerca de su experiencia en Baja California Sur, es casi seguro que no habrá quien le diga de entre sus compañeros de trabajo o amigos... ¡Estuve ahí!... ¡Yo también lo hice!... y todos estarán muy atentos a su relato sobre el viaje.</p>


    <div class="alert alert-warning" role="alert">
        <p><strong>Importante</strong></p>

        <p>Los visitantes deben contar con buen estado de salud y condición física ya que los terrenos en que se llevan a cabo estas excursiones son agrestes y pueden resultar fatigados.</p>

        <p>Las personas bajo tratamiento médico deberán traer consigo suficiente medicamento que pueda ser escaso en el área. En caso de extranjeros, traer además copia de la prescripción médica o fórmula de sus medicamentos.</p>

        <p>Dado la naturaleza de estas excursiones, no se permiten menores de 16 años (viajando por su cuenta) o mayores de 65 años. En el caso de familias, los menores deberán viajar bajo la estricta supervisión, vigilancia y completa responsabilidad de sus padres.</p>

        <p>No se permiten personas que excedan de los 100 Kg.</p>

        <p>Máximo de equipaje por persona 10 Kg.</p>
    </div>

    <h2 class="section-content-subtitle">Ropa y equipo recomendable</h2>

    <ul class="section-content-list">
        <li>Botas de campismo</li>
        <li>Pantalón (shorts no recomendables para montar o caminar)</li>
        <li>Chamarra o rompevientos</li>
        <li>Mochila pequeña</li>
        <li>Lentes para sol y bloqueador</li>
        <li>Cámara con flash y película</li>
    </ul>

@endsection