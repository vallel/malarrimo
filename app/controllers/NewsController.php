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
        $lang = Lang::getLocale();
        $data = array(
            'title' => Lang::get('news.news') . ' | ',
            'headerClass' => 'news-header',
            'news' => $this->newsRepo->getLast($lang),
            'mostVisited' => $this->newsRepo->getMostVisited($lang),
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

        Event::fire('posts.view', $post);

        $data = array(
            'title' => $post->title . ' &raquo; ' . Lang::get('news.news') . ' | ',
            'headerClass' => 'news-header',
            'mostVisited' => $this->newsRepo->getMostVisited(Lang::getLocale()),
            'post' => $post,
        );

        return View::make('news/post', $data);
    }

}