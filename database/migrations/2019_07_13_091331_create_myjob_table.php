<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMyjobTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('myjob', function(Blueprint $table)
		{
			$table->integer('idu');
			$table->timestamp('daydate')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('deliverycount')->default(0);
			$table->float('gain', 10, 0)->default(0);
			$table->primary(['idu','daydate']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('myjob');
	}

}
