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
        return $class::orderBy('id', 'DESC')->paginate(15);
    }

    public function getLastGalleries($limit)
    {
    	$class = $this->getEntity();
    	return $class::has('Pictures')
                    ->orderBy('id', 'DESC')
                    ->take($limit)
                    ->get();
    }

    public function getLastGalleriesPaginated($perPage)
    {
        $class = $this->getEntity();
        return $class::has('Pictures')
            ->orderBy('id', 'DESC')
            ->paginate($perPage);
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function getById($id)
    {
        $class = $this->getEntity();
        return $class::find($id);
    }

} 