<?php

namespace Malarrimo\Libraries;


class BookingHtmlBuilder
{

    public function buildAdmingDetails($booking)
    {
        $html = 'Testing';

        $html .= $this->buildGeneralInfo($booking);

        return $html;
    }

    protected function buildGeneralInfo($booking)
    {
        $html = 'general info';

        return $html;
    }

}