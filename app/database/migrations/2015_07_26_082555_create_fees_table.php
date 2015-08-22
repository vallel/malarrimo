<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFeesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fees', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('concept_id');
			$table->integer('min_person_number');
			$table->integer('max_person_number');
			$table->decimal('pesos_fee');
			$table->decimal('dollars_fee');
			$table->decimal('pesos_fee_high');
			$table->decimal('dollars_fee_high');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fees');
	}

}
