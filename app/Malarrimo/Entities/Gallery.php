<?php

namespace Malarrimo\Entities;

class Gallery extends \Eloquent
{

	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'galleries';

    /**
     * @var array
     */
    protected $fillable = array('title', 'date');

    public function pictures()
    {
        return $this->hasMany('Malarrimo\Entities\Picture');
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = date('Y-m-d', strtotime($value));
    }

}
