<?php

namespace Malarrimo\Entities;

class Booking extends \Eloquent
{

	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'bookings';

    public function getFullStatusAttribute()
    {
        switch ($this->attributes['status'])
        {
            case 'C':
                return 'Cancelada';
            case 'A':
                return 'Confirmada';
            case 'P':
            default:
                return 'Pendiente';
        }
    }

    public function getStatusLabelAttribute()
    {
        switch ($this->attributes['status'])
        {
            case 'C':
                return 'label-danger';
            case 'A':
                return 'label-success';
            case 'P':
            default:
                return 'label-default';
        }
    }

    public function setHotelCheckInAttribute($value)
    {
        $this->setDateFieldValue('hotelCheckIn', $value);
    }

    public function setHotelCheckOutAttribute($value)
    {
        $this->setDateFieldValue('hotelCheckOut', $value);
    }

    /**
     * @param string $value
     */
    public function setWhalesDateAttribute($value)
    {
        $this->setDateFieldValue('whalesDate', $value);
    }

    public function setCavePaintingDateAttribute($value)
    {
        $this->setDateFieldValue('cavePaintingDate', $value);
    }

    public function setSaltMineDateAttribute($value)
    {
        $this->setDateFieldValue('saltMineDate', $value);
    }

    public function setRvCheckInAttribute($value)
    {
        $this->setDateFieldValue('rvCheckIn', $value);
    }

    public function setRvCheckOutAttribute($value)
    {
        $this->setDateFieldValue('rvCheckOut', $value);
    }

    /**
     * @param string $value
     */
    public function setBanquetDateAttribute($value)
    {
        $this->setDateFieldValue('banquetDate', $value);
    }

    /**
     * @param string $field
     * @param string $value
     */
    protected function setDateFieldValue($field, $value)
    {
        $this->attributes[$field] = date('Y-m-d', strtotime($value));
    }

}