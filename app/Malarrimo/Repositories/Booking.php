<?php

namespace Malarrimo\Repositories;


class Booking extends Base
{

    public function __construct()
    {
        $this->entityName = 'Malarrimo\Entities\Booking';
    }

    public function getList($perPage = 15)
    {
        $entity = $this->getEntity();
        return $entity::orderBy('id', 'desc')->paginate($perPage);
    }

}