<?php

class NewsController extends BaseController
{

    public function index()
    {
        $data = array(
            'title' => 'Noticias | ',
            'headerClass' => 'news-header',
        );

        return View::make('news', $data);
    }

}