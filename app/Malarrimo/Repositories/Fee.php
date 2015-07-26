<?php

namespace Malarrimo\Repositories;


class Fee extends Base
{

    /**
     * @return mixed
     */
    public function getAll()
    {
        $entity = $this->getEntity();
        return $entity::with('feeConcept')->get();
    }

}