<?php

use Malarrimo\Repositories\Gallery;
use Malarrimo\Repositories\News;

class BookingController extends BaseController
{

	public function index()
	{
		$data = [
			'headerClass' => 'booking-header',
		];

		return View::make('booking', $data);
	}

	public function store()
	{
		return 'Guardar reservación';
	}

}
