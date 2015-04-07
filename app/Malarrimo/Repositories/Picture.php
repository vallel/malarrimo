<?php

namespace Malarrimo\Repositories;

class Picture extends Base
{

    public function __construct()
    {
        $this->entityName = 'Malarrimo\Entities\Picture';
    }

    /**
     * @param int $galleryId
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getGalleryPictures($galleryId)
    {
    	$class = $this->getEntity();
    	return $class::with('Gallery')->where('gallery_id', $galleryId)->get();
    }

} 