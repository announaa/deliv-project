<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeguyScheduleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('deguy_schedule', function(Blueprint $table)
		{
			$table->integer('Schedule_id')->primary();
			$table->string('mondate', 200)->nullable();
			$table->string('tuesdate', 200)->nullable();
			$table->string('wednesdate', 200)->nullable();
			$table->string('thursdate', 200)->nullable();
			$table->string('fridate', 200)->nullable();
			$table->string('saturdate', 200)->nullable();
			$table->string('sundate', 200)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('deguy_schedule');
	}

}
