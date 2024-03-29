<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFeeConceptsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fee_concepts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('group_id');
			$table->string('name');
			$table->string('short_name')->unique();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fee_concepts');
	}

}
