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
    protected $fillable = array('title', 'autor');

    public function pictures()
    {
        return $this->hasMany('Malarrimo\Entities\Picture');
    }

}
