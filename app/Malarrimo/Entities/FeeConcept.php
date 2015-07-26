<?php

namespace Malarrimo\Entities;


use Illuminate\Database\Eloquent\Relations\HasOne;

class FeeConcept extends \Eloquent {

    protected $table = 'fee_concepts';

    public $timestamps = false;

    /**
     * @return HasOne
     */
    public function fee()
    {
        return $this->hasOne('Malarrimo\Entities\Fee', 'concept_id');
    }

}