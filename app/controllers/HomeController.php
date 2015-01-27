<?php

use Malarrimo\Repositories\News;

class HomeController extends BaseController
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
		$galleries = [
			'Restaurante8.jpg',
			'Restaurante9.jpg',
			'Bar.jpg',
			'Comedor.jpg',
		];

		$data = [
			'headerClass' => 'home-header',
			'galleries' => $galleries,
			'lastNews' => $this->newsRepo->getLast(3),
		];

		return View::make('home', $data);
	}

}
