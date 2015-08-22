<?php


use Malarrimo\Entities\Fee;
use Malarrimo\Entities\FeeConcept;

class FeesTableSeeder extends Seeder {

	public function run()
	{
        DB::table('fees')->delete();

		$fees = $this->getFees();

        foreach ($fees as $fee)
        {
            Fee::create($fee);
        }
	}

    /**
     * @return array
     */
    private function getFees()
    {
        $concepts = $this->getIndexedConcepts();

        return array(
            array(
                'concept_id' => $concepts[FeeConcept::HOTEL_SINGLE],
                'pesos_fee' => 450,
                'pesos_fee_high' => 474,
            ),
            array(
                'concept_id' => $concepts[FeeConcept::HOTEL_DOUBLE],
                'pesos_fee' => 500,
                'pesos_fee_high' => 526,
            ),
            array(
                'concept_id' => $concepts[FeeConcept::HOTEL_DOUBLE_AC],
                'pesos_fee' => 550,
                'pesos_fee_high' => 580,
            ),
            array(
                'concept_id' => $concepts[FeeConcept::HOTEL_MEX],
                'pesos_fee' => 550,
                'pesos_fee_high' => 580,
            ),
            array(
                'concept_id' => $concepts[FeeConcept::HOTEL_MEX_AC],
                'pesos_fee' => 580,
                'pesos_fee_high' => 610,
            ),

            array(
                'concept_id' => $concepts[FeeConcept::RV_CAMPING],
                'pesos_fee' => 160,
                'pesos_fee_high' => 160,
            ),
            array(
                'concept_id' => $concepts[FeeConcept::RV_CAMPER_VAN],
                'pesos_fee' => 185,
                'pesos_fee_high' => 185,
            ),
            array(
                'concept_id' => $concepts[FeeConcept::RV_MOTOR_HOME],
                'pesos_fee' => 215,
                'pesos_fee_high' => 215,
            ),
            array(
                'concept_id' => $concepts[FeeConcept::RV_FIFTH_WHEEL],
                'pesos_fee' => 240,
                'pesos_fee_high' => 240,
            ),

            array(
                'concept_id' => $concepts[FeeConcept::CAVE_PAINTING_ADULT],
                'min_person_number' => 2,
                'max_person_number' => 3,
                'pesos_fee' => 975,
            ),
            array(
                'concept_id' => $concepts[FeeConcept::CAVE_PAINTING_ADULT],
                'min_person_number' => 4,
                'max_person_number' => 6,
                'pesos_fee' => 805,
            ),
            array(
                'concept_id' => $concepts[FeeConcept::CAVE_PAINTING_ADULT],
                'min_person_number' => 7,
                'max_person_number' => 9,
                'pesos_fee' => 750,
            ),
            array(
                'concept_id' => $concepts[FeeConcept::CAVE_PAINTING_CHILD],
                'min_person_number' => 1,
                'max_person_number' => 4,
                'pesos_fee' => 750,
            ),
            array(
                'concept_id' => $concepts[FeeConcept::CAVE_PAINTING_CHILD],
                'min_person_number' => 5,
                'max_person_number' => 8,
                'pesos_fee' => 690,
            ),

            array(
                'concept_id' => $concepts[FeeConcept::WHALES_ADULT],
                'pesos_fee' => 650,
            ),
            array(
                'concept_id' => $concepts[FeeConcept::WHALES_CHILD],
                'pesos_fee' => 520,
            ),
        );
    }

    /**
     * @return array
     */
    private function getIndexedConcepts()
    {
        $indexedConcepts = array();
        $concepts = DB::table('fee_concepts')->get(['id', 'short_name']);

        foreach ($concepts as $concept)
        {
            $indexedConcepts[$concept->short_name] = $concept->id;
        }

        return $indexedConcepts;
    }

}