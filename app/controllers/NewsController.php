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
            'news' => $this->newsRepo->getLast(),
            'mostVisited' => $this->newsRepo->getMostVisited(),
        );

        return View::make('news/news', $data);
    }

    public function get($id, $title)
    {
        if (empty($id))
        {
            return Redirect::route('news/news');
        }

        $post = $this->newsRepo->find($id);

        if (empty($post))
        {
            return Redirect::route('news/news');
        }

        $data = array(
            'title' => $post->title . ' &raquo; Noticias | ',
            'headerClass' => 'news-header',
            'mostVisited' => $this->newsRepo->getMostVisited(),
            'post' => $post,
        );

        return View::make('news/post', $data);
    }

}