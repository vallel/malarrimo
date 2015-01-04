<?php

class LocationController extends BaseController
{

	public function flights()
	{
		$data = [
			'title' => 'Ubicación | ',
			'headerClass' => 'location-header',
		];

		return View::make('location/flights', $data);
	}

}
