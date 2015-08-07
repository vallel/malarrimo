<?php

class LocationController extends BaseController
{

	public function index()
	{
		$data = [
			'title' => Lang::get('location.location') . ' | ',
			'headerClass' => 'location-header',
			'description' => Lang::get('location.headerText'),
		];

		return View::make('location/' . Lang::getLocale() . '/location', $data);
	}

	public function briefHistory()
	{
		$data = [
			'title' => Lang::get('location.briefHistory') . ' | ',
			'headerClass' => 'location-header',
			'description' => Lang::get('location.headerText'),
		];

		return View::make('location/' . Lang::getLocale() . '/briefHistory', $data);
	}

}
