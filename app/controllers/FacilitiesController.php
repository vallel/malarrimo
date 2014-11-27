<?php

class FacilitiesController extends BaseController
{

    public function restaurant()
    {
        $data = [
            'title' => 'Comodidades | ',
            'headerClass' => 'facilities-header',
        ];

        return View::make('facilities/restaurant', $data);
    }

}
