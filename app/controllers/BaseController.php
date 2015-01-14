<?php

class BaseController extends Controller
{

	public function __construct()
	{
		$currentDateTime = new DateTime('now', new DateTimeZone('America/Denver'));
		$currentTime = $currentDateTime->format('g:i A');

		View::share('currentTime', $currentTime);
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
