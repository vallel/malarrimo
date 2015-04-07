<?php

namespace Malarrimo\Repositories;

class Gallery extends Base
{

    public function __construct()
    {
        $this->entityName = 'Malarrimo\Entities\Gallery';
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        $class = $this->entityName;
        return $class::with('Pictures')->orderBy('id', 'DESC')->paginate(15);
    }

    /**
     * @param int $limit
     * @return mixed
     */
    public function getLastGalleries($limit)
    {
    	$class = $this->getEntity();
    	return $class::with('Pictures')
                    ->has('Pictures')
                    ->orderBy('id', 'DESC')
                    ->take($limit)
                    ->get();
    }

    /**
     * @param int $perPage
     * @return \Illuminate\Pagination\Paginator
     */
    public function getLastGalleriesPaginated($perPage)
    {
        $class = $this->getEntity();
        return $class::with('Pictures')
            ->has('Pictures')
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