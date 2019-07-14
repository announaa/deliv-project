<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDeliveryguyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('deliveryguy', function(Blueprint $table)
		{
			$table->foreign('Deguy_Schedule_id', 'fk_schedule_id_to_deguy')->references('Schedule_id')->on('deguy_schedule')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('deliveryguy', function(Blueprint $table)
		{
			$table->dropForeign('fk_schedule_id_to_deguy');
		});
	}

}
