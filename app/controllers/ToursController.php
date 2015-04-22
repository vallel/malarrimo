<?php

class ToursController extends BaseController
{

    public function index()
    {
        $data = [
            'title' => 'Tours &raquo; ' . Lang::get('tours.whales') . ' | ',
            'headerClass' => 'tours-header',
            'toursBanner' => 'tours-banner',
        ];

        return View::make('tours/' . Lang::getLocale() . '/tours', $data);
    }

    public function equipment()
    {
        $data = [
            'title' => 'Tours &raquo; ' . Lang::get('tours.recommendedEquipment') . ' | ',
            'headerClass' => 'tours-header',
            'toursBanner' => 'tours-banner',
        ];

        return View::make('tours/' . Lang::getLocale() . '/equipment', $data);
    }

    public function fees()
    {
        $data = [
            'title' => 'Tours &raquo; ' . Lang::get('tours.fees') . ' | ',
            'headerClass' => 'tours-header',
            'toursBanner' => 'tours-banner',
        ];

        return View::make('tours/' . Lang::getLocale() . '/fees', $data);
    }

    public function whales()
    {
        $data = [
            'title' => Lang::get('tours.grayWhale') . ' | ',
            'headerClass' => 'tours-header',
            'sectionContentClass' => '',
            'toursBanner' => 'whales-info-banner',
        ];

        return View::make('tours/' . Lang::getLocale() . '/whales', $data);
    }

    public function other()
    {
        $data = [
            'title' => 'Tours | ',
            'headerClass' => 'tours-header',
            'toursBanner' => 'other-tours-banner',
        ];

        return View::make('tours/' . Lang::getLocale() . '/other', $data);
    }

    public function otherFees()
    {
        $data = [
            'title' => 'Tours | ',
            'headerClass' => 'tours-header',
            'toursBanner' => 'cave-paintings-banner',
        ];

        return View::make('tours/' . Lang::getLocale() . '/otherFees', $data);
    }

}
