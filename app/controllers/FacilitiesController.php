<?php

class FacilitiesController extends BaseController
{

    public function malarrimo()
    {
        $data = [
            'title' => 'Comodidades | Malarrimo',
            'headerClass' => 'facilities-header',
            'facilitiesBanner' => 'facilities-malarrimo-banner',
        ];

        return View::make('facilities/malarrimo', $data);
    }

    public function tours()
    {
        $data = [
            'title' => 'Comodidades | Eco-Tours Malarrimo',
            'headerClass' => 'facilities-header',
            'facilitiesBanner' => 'facilities-tours-banner',
        ];

        return View::make('facilities/tours', $data);
    }

    public function restaurant()
    {
        $data = [
            'title' => 'Comodidades | Restaurante Malarrimo',
            'headerClass' => 'facilities-header',
            'facilitiesBanner' => 'restaurant-banner',
        ];

        return View::make('facilities/restaurant', $data);
    }

    public function motel()
    {
        $data = [
            'title' => 'Comodidades | Motel Malarrimo',
            'headerClass' => 'facilities-header',
            'facilitiesBanner' => 'motel-banner',
        ];

        return View::make('facilities/motel', $data);
    }

    public function rvparking()
    {
        $data = [
            'title' => 'Comodidades | RV Parking',
            'headerClass' => 'facilities-header',
            'facilitiesBanner' => 'rvparking-banner',
        ];

        return View::make('facilities/rvparking', $data);
    }

    public function casaelviejocactus()
    {
        $data = [
            'title' => 'Comodidades | Casa El Viejo Cactus',
            'headerClass' => 'facilities-header',
            'facilitiesBanner' => 'cevc-banner',
        ];

        return View::make('facilities/casaelviejocactus', $data);
    }

    public function deli()
    {
        $data = [
            'title' => 'Comodidades | Malarrimo Deli',
            'headerClass' => 'facilities-header',
            'facilitiesBanner' => 'deli-banner',
        ];

        return View::make('facilities/deli', $data);
    }

}
