<?php

namespace Malarrimo\Repositories;


use DB;

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

    /**
     * @param string $shortName
     * @return array|static[]
     */
    public function getByGroup($shortName)
    {
        return DB::table('fees')
            ->select(
                'fees.*',
                'concepts.name',
                'concepts.short_name',
                'groups.high_season_fees',
                'groups.by_person_number_fees')
            ->join('fee_concepts as concepts', 'fees.concept_id', '=', 'concepts.id')
            ->join('fee_concept_groups as groups', 'concepts.group_id', '=', 'groups.id')
            ->where('groups.short_name', $shortName)
            ->get();
    }

}