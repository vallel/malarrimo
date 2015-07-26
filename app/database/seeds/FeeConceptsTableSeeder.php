<?php

use Malarrimo\Entities\FeeConcept;

class FeeConceptsTableSeeder extends Seeder {

	public function run()
	{
        DB::table('fee_concepts')->delete();

        foreach ($this->getConcepts() as $concept)
        {
            FeeConcept::create($concept);
        }
	}

    /**
     * @return array
     */
    private function getConcepts()
    {
        $concepts = array(
            array(
                'name' => 'Ballenas - adultos',
                'short_name' => 'whales_adult',
            ),
            array(
                'name' => 'Ballenas - niños',
                'short_name' => 'whales_children',
            ),
            array(
                'name' => 'Pinturas rupestres - adultos',
                'short_name' => 'painting_adults',
            ),
            array(
                'name' => 'Pinturas rupestres - niños',
                'short_name' => 'painting_children',
            ),
            array(
                'name' => 'Salinas - adultos',
                'short_name' => 'salt_adults',
            ),
            array(
                'name' => 'Salinas - niños',
                'short_name' => 'salt_childrens',
            ),
            array(
                'name' => 'Hotel - habitación sencilla',
                'short_name' => 'single_room',
            ),
            array(
                'name' => 'Hotel - habitación doble',
                'short_name' => 'double_room',
            ),
            array(
                'name' => 'Hotel - mex room',
                'short_name' => 'mex_room',
            ),
            array(
                'name' => 'RV - motor home',
                'short_name' => 'motor_home',
            ),
            array(
                'name' => 'RV - fifth wheel',
                'short_name' => 'fifth_wheel',
            ),
            array(
                'name' => 'RV - camper o van',
                'short_name' => 'camper_van',
            ),
            array(
                'name' => 'RV - camping',
                'short_name' => 'camping',
            ),
        );

        return $concepts;
    }

}