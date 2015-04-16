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
        return $class::with('User')->orderBy('id', 'desc')->paginate($perPage);
    }

    /**
     * @param string $lang
     * @param int $perPage
     * @return mixed
     */
    public function getLast($lang, $perPage = 6)
    {
        $class = $this->entityName;
        return $class::where('language', $lang)->orderBy('id', 'DESC')->simplePaginate($perPage);
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