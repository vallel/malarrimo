<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bookings', function(Blueprint $table)
		{
			$table->increments('id');

			// general data fields
			$table->text('name');
			$table->text('email');
			$table->text('phone');
			$table->text('fax');
			$table->text('address');
			$table->text('city');
			$table->text('country');

			// hotel fields
			$table->date('hotelCheckIn');
			$table->date('hotelCheckOut');
			$table->integer('hotelSingleRooms');
			$table->integer('hotelDoubleRooms');
			$table->integer('hotelAdults');
			$table->integer('hotelChildren');

			// whale tours
			$table->dateTime('whalesDateTime');
			$table->integer('whalesAdults');
			$table->integer('whalesChildren');

			// cave painting tours
			$table->date('cavePaintingDate');
			$table->integer('cavePaintingAdults');
			$table->integer('cavePaintingChildren');

			// salt mine tours
			$table->date('saltMineDate');
			$table->integer('saltMineAdults');
			$table->integer('saltMineChildren');

			// rv parking
			$table->date('rvCheckIn');
			$table->date('rvCheckOut');
			$table->integer('rvAdults');
			$table->date('rvChildren');
			$table->integer('rvCamping');
			$table->integer('rvVan');
			$table->integer('rvCamper');
			$table->integer('rvFifthWheel');

			// banquet
			$table->dateTime('banquetDateTime');
			$table->integer('banquetPersons');

			$table->char('status');

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
		Schema::drop('bookings');
	}

}
