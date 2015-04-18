<?php

$confirmMessage = <<<HTML
<p class="alert alert-info">
    Su solicitud de reservación ha sido enviada, en breve nuestro personal revisará
    disponibilidad y se pondrá en contacto con usted para confirmar su reservación. Si desea más información
    puede contactarnos al correo electrónico <strong><a href="mailto:info@malarrimo.com">info@malarrimo.com</a></strong>
    o al teléfono <strong>+52 (615) 157 01 00</strong>.
</p>
HTML;

return array(
    'booking' => 'Reservaciones',
    'headerText' => '<p>Reserva, cotiza y arma tu paquete</p>',

    'generalData' => 'Datos Generales',
    'name' => 'Nombre',
    'email' => 'Correo electrónico',
    'emailConfirmation' => 'Confirmar correo electrónico',
    'phone' => 'Teléfono',
    'fax' => 'Fax',
    'address' => 'Dirección',
    'city' => 'Ciudad',
    'country' => 'País',

    'hotel' => 'Hotel',
    'checkIn' => 'Fecha de entrada',
    'checkOut' => 'Fecha de salida',
    'singleRooms' => 'Habitaciones sencillas',
    'doubleRooms' => 'Habitaciones dobles',
    'adults' => 'Adultos',
    'children' => 'Niños',

    'whales' => 'Tour Ballena Gris',
    'date' => 'Fecha',
    'schedule' => 'Horario',
    'childrenAge' => '(hasta 11 años)',

    'cavePainting' => 'Tour Pinturas Rupestres',

    'saltMint' => 'Tour Salinas',

    'rv' => 'RV Parking',
    'camping' => 'Tienda de campaña',
    'van' => 'Van',
    'camper' => 'Camper',
    'fifthWheel' => 'Fifth wheel',

    'banquet' => 'Banquetes',
    'numberPersons' => 'Número de personas',

    'reserve' => 'Reservar',

    'yourBooking' => 'Tu reservación',

    'confirmMessage' => $confirmMessage,
);