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
        $bookingList = $this->repository->getList();
        return View::make('admin/booking')->with('bookingList', $bookingList);
    }

    public function changeStatus($id, $status)
    {
        if (empty($id))
        {
            return Redirect::route('adminBooking');
        }

        $book = $this->repository->find($id);

        if (empty($book))
        {
            return Redirect::route('adminBooking');
        }

        $newStatus = $status;
        $book->status = ($newStatus == $book->status) ? 'P' : $newStatus;
        $book->save();

        return Redirect::route('adminBooking')->with('msg', '<p class="alert alert-success">Reservación actualizada</p>');
    }

    public function getDetails($id)
    {
        if (!empty($id))
        {
            $booking = $this->repository->find($id);

            if (!empty($booking))
            {
                return View::make('admin/bookingDetails', ['data' => $booking]);
            }
        }
    }

} 