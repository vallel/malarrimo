<?php

namespace Malarrimo\Dto;


class BookingServices
{

    /** @var  int */
    private $bookingId;

    /** @var  string */
    private $description;

    /** @var  string */
    private $dates;

    /**
     * @return int
     */
    public function getBookingId()
    {
        return $this->bookingId;
    }

    /**
     * @param int $bookingId
     */
    public function setBookingId($bookingId)
    {
        $this->bookingId = $bookingId;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDates()
    {
        return $this->dates;
    }

    /**
     * @param string $dates
     */
    public function setDates($dates)
    {
        $this->dates = $dates;
    }

}