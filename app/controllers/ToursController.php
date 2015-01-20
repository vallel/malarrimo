<?php

class ToursController extends BaseController
{

    public function index()
    {
        $data = [
            'title' => 'Tours | ',
            'headerClass' => 'tours-header',
        ];

        return View::make('tours/index', $data);
    }

}
