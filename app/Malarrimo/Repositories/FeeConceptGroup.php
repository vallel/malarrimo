<?php

namespace Malarrimo\Repositories;


use Illuminate\Database\Eloquent\Collection;

class FeeConceptGroup extends Base
{

    /**
     * @return Collection|static[]
     */
    public function getAll()
    {
        $entity = $this->getEntity();

        return $entity::with('feeConcept')->get();
    }

}