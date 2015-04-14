<?php

use Malarrimo\Libraries\WeatherService;

class BaseController extends Controller
{

	public function __construct()
	{
		$currentDateTime = new DateTime('now', new DateTimeZone('America/Denver'));
		$currentTime = $currentDateTime->format('g:i A');

		$weatherService = new WeatherService();
		$currentTemp = $weatherService->getCurrentTemp();

		$language = App::getLocale();

		View::share('language', $language);

		View::share('currentTime', $currentTime);
		View::share('currentTemp', $currentTemp);
	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
