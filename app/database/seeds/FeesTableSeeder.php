<?php


use Malarrimo\Entities\Fee;
use Malarrimo\Entities\FeeConcept;

class FeesTableSeeder extends Seeder {

	public function run()
	{
        DB::table('fees')->delete();

		foreach($this->getConcepts() as $concept)
		{
			Fee::create(array(
                'concept_id' => $concept->id,
                'pesos_fee' => 0,
                'dollars_fee' => 0,
            ));
		}
	}

    /**
     * @return FeeConcept[]
     */
    private function getConcepts()
    {
        return FeeConcept::all();
    }

}