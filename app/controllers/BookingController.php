<?php

use Malarrimo\Managers\BookingManager;
use Malarrimo\Marshallers\MarshallBookingToServicesList;
use Malarrimo\Repositories\Booking;

class BookingController extends BaseController
{

	/**
	 * @var Booking
	 */
	protected $bookingRepo;

	public function __construct(Booking $bookingRepo)
	{
		parent::__construct();
		$this->bookingRepo = $bookingRepo;
	}

	public function index()
	{
		$data = [
			'headerClass' => 'booking-header',
		];

		return View::make('booking', $data);
	}

	public function store()
	{
		$booking = $this->bookingRepo->newInstance();
		$manager = new BookingManager($booking, Input::all());

		if ($manager->save())
		{
			return Redirect::route('bookingConfirmation')->with('booking', $booking);
		}

		return Redirect::back()->withInput()->withErrors($manager->getErrors());
	}

	public function confirmation()
	{
		if (!Session::has('booking'))
		{
			return Redirect::route('booking');
		}

		$booking = Session::get('booking');

		$services = MarshallBookingToServicesList::marshall($booking);

		return View::make('bookingConfirmation')->with('services', $services);
	}

}
