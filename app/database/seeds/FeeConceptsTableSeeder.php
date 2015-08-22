<?php

use Malarrimo\Entities\FeeConcept;
use Malarrimo\Entities\FeeConceptGroup;

class FeeConceptsTableSeeder extends Seeder {

	public function run()
	{
        DB::table('fee_concepts')->delete();

        $groups = $this->getIndexedGroups();
        $concepts = $this->getConcepts($groups);

        FeeConcept::insert($concepts);
	}

    /**
     * @param array $groups
     * @return array
     */
    private function getConcepts($groups)
    {
        $concepts = array(
            array(
                'name' => 'Adultos',
                'short_name' => FeeConcept::WHALES_ADULT,
                'group_id' => $groups[FeeConceptGroup::WHALES],
            ),
            array(
                'name' => 'Niños',
                'short_name' => FeeConcept::WHALES_CHILD,
                'group_id' => $groups[FeeConceptGroup::WHALES],
            ),
            array(
                'name' => 'Adultos',
                'short_name' => FeeConcept::CAVE_PAINTING_ADULT,
                'group_id' => $groups[FeeConceptGroup::CAVE_PAINTING],
            ),
            array(
                'name' => 'Niños',
                'short_name' => FeeConcept::CAVE_PAINTING_CHILD,
                'group_id' => $groups[FeeConceptGroup::CAVE_PAINTING],
            ),
            array(
                'name' => 'Adultos',
                'short_name' => FeeConcept::SALT_MINE_ADULT,
                'group_id' => $groups[FeeConceptGroup::SALT_MINE],
            ),
            array(
                'name' => 'Niños',
                'short_name' => FeeConcept::SALT_MINE_CHILD,
                'group_id' => $groups[FeeConceptGroup::SALT_MINE],
            ),
            array(
                'name' => 'Habitación sencilla STD',
                'short_name' => FeeConcept::HOTEL_SINGLE,
                'group_id' => $groups[FeeConceptGroup::HOTEL],
            ),
            array(
                'name' => 'Habitación doble STD',
                'short_name' => FeeConcept::HOTEL_DOUBLE,
                'group_id' => $groups[FeeConceptGroup::HOTEL],
            ),
            array(
                'name' => 'Habitación doble STD A/C',
                'short_name' => FeeConcept::HOTEL_DOUBLE_AC,
                'group_id' => $groups[FeeConceptGroup::HOTEL],
            ),
            array(
                'name' => 'Mex room',
                'short_name' => FeeConcept::HOTEL_MEX,
                'group_id' => $groups[FeeConceptGroup::HOTEL],
            ),
            array(
                'name' => 'Mex room A/C',
                'short_name' => FeeConcept::HOTEL_MEX_AC,
                'group_id' => $groups[FeeConceptGroup::HOTEL],
            ),
            array(
                'name' => 'RV - motor home',
                'short_name' => 'motor_home',
                'group_id' => $groups[FeeConceptGroup::RV],
            ),
            array(
                'name' => 'RV - fifth wheel',
                'short_name' => FeeConcept::RV_FIFTH_WHEEL,
                'group_id' => $groups[FeeConceptGroup::RV],
            ),
            array(
                'name' => 'RV - camper o van',
                'short_name' => FeeConcept::RV_CAMPER_VAN,
                'group_id' => $groups[FeeConceptGroup::RV],
            ),
            array(
                'name' => 'RV - camping',
                'short_name' => FeeConcept::RV_CAMPING,
                'group_id' => $groups[FeeConceptGroup::RV],
            ),
        );

        return $concepts;
    }

    /**
     * @return array
     */
    private function getIndexedGroups()
    {
        $indexedGroups = array();
        $groups = DB::table('fee_concept_groups')->get(['id', 'short_name']);

        foreach ($groups as $group)
        {
            $indexedGroups[$group->short_name] = $group->id;
        }

        return $indexedGroups;
    }

}