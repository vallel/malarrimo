<?php

namespace Malarrimo\Entities;


use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fee extends \Eloquent
{

    /**
     * @return BelongsTo
     */
    public function feeConcept()
    {
        return $this->belongsTo('Malarrimo\Entities\FeeConcept', 'concept_id');
    }

}