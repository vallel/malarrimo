<?php

use Malarrimo\Managers\BookingManager;
use Malarrimo\Marshallers\MarshallFeesToDto;
use Malarrimo\Repositories\Booking;
use Malarrimo\Repositories\Fee;

class BookingController extends BaseController
{

	/**
	 * @var Booking
	 */
	private $bookingRepo;

	/**
	 * @var Fee
	 */
	private $feesRepo;

	/**
	 * @var MarshallFeesToDto
	 */
	private $marshaller;

	public function __construct(Booking $bookingRepo, Fee $feesRepo, MarshallFeesToDto $marshaller)
	{
		parent::__construct();
		$this->bookingRepo = $bookingRepo;
		$this->setFeesRepo($feesRepo);
	}

	public function index()
	{
		$fees = $this->getFeesRepo()->getAll();
		$fees = $this->marshaller->marshall($fees);
		$data = [
			'title' => Lang::get('booking.booking') . ' | ',
			'headerClass' => 'booking-header',
			'fees' => json_encode($fees),
		];

		return View::make('booking/booking', $data);
	}

	public function store()
	{
		$booking = $this->bookingRepo->newInstance();
		$booking->status = 'P';
		$manager = new BookingManager($booking, Input::all());

		if ($manager->save())
		{
			$manager->sendMail();
			return Redirect::route('bookingConfirmation');
		}

		return Redirect::back()->withInput()->withErrors($manager->getErrors());
	}

	public function confirmation()
	{
		$data = [
			'title' => Lang::get('booking.booking') . ' | ',
			'headerClass' => 'booking-header'
		];

		return View::make('booking/bookingConfirmation', $data);
	}

	/**
	 * @return Fee
	 */
	public function getFeesRepo()
	{
		return $this->feesRepo;
	}

	/**
	 * @param Fee $feesRepo
	 * @return static
	 */
	public function setFeesRepo($feesRepo)
	{
		$this->feesRepo = $feesRepo;
		return $this;
	}

}
