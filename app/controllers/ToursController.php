<?php

class ToursController extends BaseController
{

    public function index()
    {
        $data = [
            'title' => 'Tours &raquo; Avistamiento de ballenas | ',
            'headerClass' => 'tours-header',
        ];

        return View::make('tours/tours', $data);
    }

    public function equipment()
    {
        $data = [
            'title' => 'Tours &raquo; Equipo recomendado | ',
            'headerClass' => 'tours-header',
        ];

        return View::make('tours/equipment', $data);
    }

    public function fees()
    {
        $data = [
            'title' => 'Tours &raquo; Tarifas | ',
            'headerClass' => 'tours-header',
        ];

        return View::make('tours/fees', $data);
    }

    public function whales()
    {
        $data = [
            'title' => 'Ballena gris | ',
            'headerClass' => 'tours-header',
            'sectionContentClass' => '',
        ];

        return View::make('tours/whales', $data);
    }

    public function other()
    {
        $data = [
            'title' => 'Tours | ',
            'headerClass' => 'tours-header',
        ];

        return View::make('tours/other', $data);
    }

    public function otherFees()
    {
        $data = [
            'title' => 'Tours | ',
            'headerClass' => 'tours-header',
        ];

        return View::make('tours/other', $data);
    }

}
