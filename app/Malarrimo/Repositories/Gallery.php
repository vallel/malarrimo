<?php

namespace Malarrimo\Repositories;

class Gallery extends Base
{

    public function __construct()
    {
        $this->entityName = 'Malarrimo\Entities\Gallery';
    }

    public function getAll()
    {
        $class = $this->entityName;
        return $class::paginate(15);
    }

    public function getLastGalleries($limit)
    {
    	$class = $this->getEntity();
    	return $class::has('Pictures')
                    ->orderBy('id', 'DESC')
                    ->take($limit)
                    ->get();
    }

    public function getPaginatedGalleriesByCategory($categoryId, $galleriesPerPage = 10)
    {
        $class = $this->getEntity();
        return $class::has('Pictures')
            ->where('category_id', $categoryId)
            ->orderBy('id', 'DESC')
            ->paginate($galleriesPerPage);
    }

    /**
     * @param int $categoryId
     * @param int $limit
     */
    public function getLastFromCategory($categoryId = null, $limit = 4)
    {
    	$class = $this->getEntity();
    	return $class::has('Pictures')
            ->where('category_id', $categoryId)
    		->orderBy('id', 'DESC')
    		->take($limit)
    		->get();
    }

} 