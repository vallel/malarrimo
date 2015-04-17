<?php

use Malarrimo\Repositories\Gallery;
use Malarrimo\Repositories\News;

class HomeController extends BaseController
{

	/**
	 * @var News
	 */
	protected $newsRepo;

	/** @var  Gallery */
	protected $galleryRepo;

	/**
	 * @param News $newsRepo
	 * @param Gallery $galleryRepo
	 */
	public function __construct(News $newsRepo, Gallery $galleryRepo)
	{
		parent::__construct();
		$this->newsRepo = $newsRepo;
		$this->galleryRepo = $galleryRepo;
	}

	public function index()
	{
		$lang = App::getLocale();

		$data = [
			'headerClass' => 'home-header',
			'lastNews' => $this->newsRepo->getLast($lang, 3),
			'galleries' => $this->galleryRepo->getLastGalleries(4),
		];

		return View::make('home', $data);
	}

}
