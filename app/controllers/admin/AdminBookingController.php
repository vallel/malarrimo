<?php

use Malarrimo\Repositories\Booking as BookingRepo;

class AdminBookingController extends BaseController
{

    /**
     * @var BookingRepo
     */
    protected $repository;

    /**
     * @param BookingRepo $repository
     */
    public function __construct(BookingRepo $repository)
    {
        $this->repository = $repository;
    }

    public function getList()
    {
        $bookingList = $this->repository->getAll();
        return View::make('admin/booking')->with('bookingList', $bookingList);
    }

} 