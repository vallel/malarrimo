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
    public static function marshall($booking)
    {
        $services = array();

        if (!empty($booking))
        {
            $services[] = static::marshallHotel($booking);
            $services[] = static::marshallWhales($booking);

            $services = array_filter($services);
        }

        return $services;
    }

    /**
     * @param Booking $booking
     * @return BookingServices|null
     */
    protected static function marshallHotel($booking)
    {
        if ($booking->hotelCheckIn && $booking->hotelCheckOut &&
            ($booking->hotelSingle || $booking->hotelDouble) &&
            $booking->hotelAdults)
        {
            $description = '';
            if ($booking->hotelDouble)
            {
                $description .= $booking->hotelDouble . ' habitaciones dobles';
            }

            if ($booking->hotelSingle)
            {
                $description .= empty($description) ? '' : ' y ';
                $description .= $booking->hotelDouble . ' habitaciones sencillas, ';
            }

            $description .= $booking->hotelAdults . ' adultos';
            if ($booking->hotelChildren)
            {
                $description .= ' y '. $booking->hotelChildren . ' niños';
            }

            $dates = date('d-m-Y', $booking->hotelCheckIn) . ' - ' . date('d-m-Y', $booking->hotelCheckOut);

            $service = static::createService($booking->id, $description, $dates);
            return $service;
        }

        return null;
    }

    /**
     * @param Booking $booking
     * @return BookingServices|null
     */
    protected static function marshallWhales($booking)
    {
        if ($booking->whalesDate && $booking->whalesAdults)
        {
            $description = 'Tour Ballena Gris - ' . $booking->whalesAdults . ' Adultos';
            if ($booking->whalesChildren)
            {
                $description .= ' y ' . $booking->whalesChildren . ' Niños';
            }
            $dates = date('d-m-Y', strtotime($booking->whalesDate)) . ' a las ' . $booking->whalesTime;
            $service = static::createService($booking->id, $description, $dates);
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
    protected static function createService($bookingId, $description, $dates)
    {
        $service = new BookingServices();
        $service->setBookingId($bookingId);
        $service->setDescription($description);
        $service->setDates($dates);
        return $service;
    }

}