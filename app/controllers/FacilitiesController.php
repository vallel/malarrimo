<?php

class FacilitiesController extends BaseController
{

    public function malarrimo()
    {
        $data = [
            'title' => Lang::get('facilities.facilities') . ' | Malarrimo',
            'headerClass' => 'facilities-header',
            'facilitiesBanner' => 'facilities-malarrimo-banner',
        ];

        return View::make('facilities/' . Lang::getLocale() . '/malarrimo', $data);
    }

    public function tours()
    {
        $data = [
            'title' => Lang::get('facilities.facilities') . ' | Eco-Tours Malarrimo',
            'headerClass' => 'facilities-header',
            'facilitiesBanner' => 'facilities-tours-banner',
        ];

        return View::make('facilities/' . Lang::getLocale() . '/tours', $data);
    }

    public function restaurant()
    {
        $data = [
            'title' => Lang::get('facilities.facilities') . ' | Restaurante Malarrimo',
            'headerClass' => 'facilities-header',
            'facilitiesBanner' => 'restaurant-banner',
        ];

        return View::make('facilities/' . Lang::getLocale() . '/restaurant', $data);
    }

    public function motel()
    {
        $data = [
            'title' => Lang::get('facilities.facilities') . ' | Motel Malarrimo',
            'headerClass' => 'facilities-header',
            'facilitiesBanner' => 'motel-banner',
        ];

        return View::make('facilities/' . Lang::getLocale() . '/motel', $data);
    }

    public function rvparking()
    {
        $data = [
            'title' => Lang::get('facilities.facilities') . ' | RV Parking',
            'headerClass' => 'facilities-header',
            'facilitiesBanner' => 'rvparking-banner',
        ];

        return View::make('facilities/' . Lang::getLocale() . '/rvparking', $data);
    }

    public function casaelviejocactus()
    {
        $data = [
            'title' => Lang::get('facilities.facilities') . ' | Casa El Viejo Cactus',
            'headerClass' => 'facilities-header',
            'facilitiesBanner' => 'cevc-banner',
        ];

        return View::make('facilities/' . Lang::getLocale() . '/casaelviejocactus', $data);
    }

    public function deli()
    {
        $data = [
            'title' => Lang::get('facilities.facilities') . ' | Malarrimo Deli',
            'headerClass' => 'facilities-header',
            'facilitiesBanner' => 'deli-banner',
        ];

        return View::make('facilities/' . Lang::getLocale() . '/deli', $data);
    }

}
