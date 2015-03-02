<?php

namespace Malarrimo\Repositories;


class News extends Base
{

    public function __construct()
    {
        $this->entityName = 'Malarrimo\Entities\News';
    }

    /**
     * @param int $perPage
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll($perPage = 15)
    {
        $class = $this->entityName;
        return $class::orderBy('id', 'desc')->paginate($perPage);
    }

    /**
     * @param int $perPage
     * @return mixed
     */
    public function getLast($perPage = 6)
    {
        $class = $this->entityName;
        return $class::orderBy('id', 'DESC')->simplePaginate($perPage);
    }

    /**
     * @param int $limit
     * @return mixed
     */
    public function getMostVisited($limit = 3)
    {
        $class = $this->entityName;
        return $class::orderBy('visits', 'DESC')->take($limit)->get();
    }

} 