<?php

class GalleryController extends BaseController
{

    public function index()
    {
        $data = array(
            'title' => 'Galería | ',
            'headerClass' => 'gallery-header',
        );

        return View::make('gallery', $data);
    }

}