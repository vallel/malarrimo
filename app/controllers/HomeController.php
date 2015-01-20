<?php

class HomeController extends BaseController
{

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
		];

		return View::make('home', $data);
	}

}
