<?php

namespace Malarrimo\Marshallers;


use Malarrimo\Dto\BookingServices;
use Malarrimo\Entities\Booking;

class MarshallBookingToServicesList implements Marshaller
{

    /**
     * @param Booking $booking
     * @return array
     */
    public function marshall($booking)
    {
        $services = array();

        if (!empty($booking))
        {
            $services[] = $this->marshallWhales($booking);
            $services[] = $this->marshallHotel($booking);

            dd($services);
            $services = array_filter($services);
        }

        return $services;
    }

    /**
     * @param Booking $booking
     * @return BookingServices|null
     */
    private function marshallHotel($booking)
    {
        if ($booking->hotelCheckIn && $booking->hotelCheckOut &&
            ($booking->hotelSingleRooms || $booking->hotelDoubleRooms) &&
            $booking->hotelAdults)
        {
            $description = '';
            if ($booking->hotelDoubleRooms)
            {
                $description .= $booking->hotelDoubleRooms . ' habitaciones dobles';
            }

            if ($booking->hotelSingleRooms)
            {
                $description .= empty($description) ? '' : ' y ';
                $description .= $booking->hotelSingleRooms . ' habitaciones sencillas, ';
            }

            $description .= $booking->hotelAdults . ' adultos';
            if ($booking->hotelChildren)
            {
                $description .= ' y '. $booking->hotelChildren . ' niños';
            }

            $dates = date('d-m-Y', $booking->hotelCheckIn) . ' - ' . date('d-m-Y', $booking->hotelCheckOut);

            $service = $this->createService($booking->id, $description, $dates);
            return $service;
        }

        return null;
    }

    /**
     * @param Booking $booking
     * @return BookingServices|null
     */
    private function marshallWhales($booking)
    {
        if ($booking->whalesDate && $booking->whalesAdults)
        {
            $description = 'Tour Ballena Gris - ' . $booking->whalesAdults . ' Adultos';
            if ($booking->whalesChildren)
            {
                $description .= ' y ' . $booking->whalesChildren . ' Niños';
            }
            $dates = date('d-m-Y', strtotime($booking->whalesDate)) . ' a las ' . $booking->whalesTime;
            $service = $this->createService($booking->id, $description, $dates);
            return $service;
        }

        return null;
    }

    /**
     * @param int $bookingId
     * @param string $description
     * @param string $dates
     * @return BookingServices
     */
    private function createService($bookingId, $description, $dates)
    {
        $service = new BookingServices();
        $service->setBookingId($bookingId);
        $service->setDescription($description);
        $service->setDates($dates);
        return $service;
    }

}