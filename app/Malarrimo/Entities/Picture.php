<?php

namespace Malarrimo\Entities;

class Picture extends \Eloquent
{

	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'pictures';

    /**
     * @var array
     */
    protected $fillable = array('gallery_id', 'file_name');

    public function gallery()
    {
        return $this->belongsTo('Malarrimo\Entities\Gallery');
    }

}
