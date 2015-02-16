<?php

namespace Malarrimo\Entities;

class Booking extends \Eloquent
{

	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'bookings';

    /**
     * @param string $value
     */
    public function setWhalesDateTimeAttribute($value)
    {
        $this->attributes['whalesDateTime'] = $value;
    }

    /**
     * @param string $value
     */
    public function setBanquetDateTimeAttribute($value)
    {
        $this->attributes['banquetDateTime'] = $value;
    }

}