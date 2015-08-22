<?php

namespace Malarrimo\Entities;


use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FeeConcept extends \Eloquent
{

    const WHALES_ADULT = 'whales_adult';
    const WHALES_CHILD = 'whales_child';
    const CAVE_PAINTING_ADULT = 'painting_adults';
    const CAVE_PAINTING_CHILD = 'painting_child';
    const SALT_MINE_ADULT = 'salt_adult';
    const SALT_MINE_CHILD = 'salt_children';
    const HOTEL_SINGLE = 'single_room';
    const HOTEL_DOUBLE = 'double_room';
    const HOTEL_DOUBLE_AC = 'double_room_ac';
    const HOTEL_MEX = 'mex_room';
    const HOTEL_MEX_AC = 'mex_room_ac';
    const RV_FIFTH_WHEEL = 'fifth_wheel';
    const RV_CAMPER_VAN = 'camper_van';
    const RV_CAMPING = 'camping';
    const RV_MOTOR_HOME = 'motor_home';

    /** @var string  */
    protected $table = 'fee_concepts';

    /** @var bool  */
    public $timestamps = false;

    /**
     * @return HasMany
     */
    public function fee()
    {
        return $this->hasMany('Malarrimo\Entities\Fee', 'concept_id');
    }

    /**
     * @return BelongsTo
     */
    public function group()
    {
        return $this->belongsTo('Malarrimo\Entities\FeeConceptGroup');
    }

}