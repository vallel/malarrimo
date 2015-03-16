<?php

class LocationController extends BaseController
{

	public function index()
	{
		$data = [
			'title' => 'Ubicación | ',
			'headerClass' => 'location-header',
		];

		return View::make('location/location', $data);
	}

	public function briefHistory()
	{
		$data = [
			'title' => 'Breve historia de Guerrero Negro | ',
			'headerClass' => 'location-header',
		];

		return View::make('location/briefHistory', $data);
	}

}
