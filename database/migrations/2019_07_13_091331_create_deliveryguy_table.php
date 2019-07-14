<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeliveryguyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('deliveryguy', function(Blueprint $table)
		{
			$table->integer('DeliveryGuy_Id')->primary();
			$table->integer('Deguy_Schedule_id')->index('fk_schedule_id_to_deguy');
			$table->integer('User_Id');
			$table->string('vehicle_type', 20);
			$table->date('date_of_start')->nullable();
			$table->boolean('active')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('deliveryguy');
	}

}
