<?php

namespace Malarrimo\Entities;


use Illuminate\Database\Eloquent\Relations\HasMany;

class FeeConceptGroup extends \Eloquent
{

    const WHALES = 'whales';
    const SALT_MINE = 'salt_mine';
    const CAVE_PAINTING = 'cave_painting';
    const HOTEL = 'hotel';
    const RV = 'rv';

    /** @var string  */
    protected $table = 'fee_concept_groups';

    /** @var bool  */
    public $timestamps = false;

    /**
     * @return HasMany
     */
    public function feeConcepts()
    {
        return $this->hasMany('Malarrimo\Entities\FeeConcept', 'group_id');
    }

}