<?php

class LocationController extends BaseController
{

	public function index()
	{
		$data = [
			'title' => 'Ubicación | ',
			'headerClass' => 'location-header',
		];

		return View::make('location', $data);
	}

}
