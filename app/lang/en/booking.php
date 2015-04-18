<?php

$confirmMessage = <<<HTML
<p class="alert alert-info">
    Your reservation request has been sent, our staff will in short check for availability and will contact you to
    confirm your reservation. For more info, you can contact us by email to
    <strong><a href="mailto:info@malarrimo.com">info@malarrimo.com</a></strong> or by phone to <strong>+52 (615) 157 01 00</strong>.
</p>
HTML;

return array(
    'booking' => 'Booking',
    'headerText' => '',

    'generalData' => 'General Data',
    'name' => 'Name',
    'email' => 'Email',
    'emailConfirmation' => 'Confirm your email',
    'phone' => 'Phone',
    'fax' => 'Fax',
    'address' => 'Address',
    'city' => 'City',
    'country' => 'Country',

    'hotel' => 'For Hotel',
    'checkIn' => 'Check in',
    'checkOut' => 'Check out',
    'singleRooms' => 'Single rooms',
    'doubleRooms' => 'Double rooms',
    'adults' => 'Adults',
    'children' => 'Children',

    'whales' => 'For Whales',
    'date' => 'Date',
    'schedule' => 'Hour',
    'childrenAge' => '(up to 11 years)',

    'cavePainting' => 'For Cave Paintings',

    'saltMint' => 'For Salt Mines',

    'rv' => 'RV Parking',
    'camping' => 'Tent',
    'van' => 'Van',
    'camper' => 'Camper',
    'fifthWheel' => 'Fifth wheel',

    'banquet' => 'Banquets',
    'numberPersons' => 'Amount of people',

    'reserve' => 'Reserve',

    'yourBooking' => 'Your booking',

    'confirmMessage' => $confirmMessage,
);