<?php

namespace Malarrimo\Repositories;


class News extends Base
{

    public function __construct()
    {
        $this->entityName = 'Malarrimo\Entities\News';
    }

    public function getLast($perPage = 6)
    {
        $class = $this->entityName;
        return $class::orderBy('id', 'DESC')->paginate($perPage);
    }

} 