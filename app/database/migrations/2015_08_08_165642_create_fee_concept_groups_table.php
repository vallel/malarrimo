<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFeeConceptGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fee_concept_groups', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('short_name')->unique();
			$table->boolean('high_season_fees');
			$table->boolean('by_person_number_fees');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fee_concept_groups');
	}

}
