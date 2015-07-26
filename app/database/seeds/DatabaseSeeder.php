<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        foreach ($this->getSeeders() as $seeder)
        {
            $this->call($seeder);
        }
	}

    /**
     * @return array
     */
    private function getSeeders()
    {
        return array(
            'UserTableSeeder',
            'FeeConceptsTableSeeder',
            'FeesTableSeeder',
        );
    }

}
