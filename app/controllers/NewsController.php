<?php

use Malarrimo\Repositories\News;

class NewsController extends BaseController
{

    /**
     * @var News
     */
    protected $newsRepo;

    public function __construct(News $newsRepo)
    {
        parent::__construct();
        $this->newsRepo = $newsRepo;
    }

    public function index()
    {
        $data = array(
            'title' => 'Noticias | ',
            'headerClass' => 'news-header',
            'news' => $this->newsRepo->getLast(6),
        );

        return View::make('news', $data);
    }

}