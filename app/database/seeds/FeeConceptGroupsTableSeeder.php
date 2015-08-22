<?php


use Malarrimo\Entities\FeeConceptGroup;

class FeeConceptGroupsTableSeeder extends Seeder {

	public function run()
	{
        DB::table('fee_concept_groups')->delete();

        $groups = $this->getGroups();
        FeeConceptGroup::insert($groups);
	}

	/**
	 * @return array
	 */
	private function getGroups()
	{
		return array(
            array(
                'name' => 'Ballenas',
                'short_name' => FeeConceptGroup::WHALES,
                'high_season_fees' => false,
                'by_person_number_fees' => false,
            ),
            array(
                'name' => 'Pinturas rupestres',
                'short_name' => FeeConceptGroup::CAVE_PAINTING,
                'high_season_fees' => false,
                'by_person_number_fees' => true,
            ),
            array(
                'name' => 'Salinas',
                'short_name' => FeeConceptGroup::SALT_MINE,
                'high_season_fees' => false,
                'by_person_number_fees' => true,
            ),
            array(
                'name' => 'Hotel',
                'short_name' => FeeConceptGroup::HOTEL,
                'high_season_fees' => true,
                'by_person_number_fees' => false,
            ),
            array(
                'name' => 'RV',
                'short_name' => FeeConceptGroup::RV,
                'high_season_fees' => true,
                'by_person_number_fees' => false,
            ),
		);
	}

}