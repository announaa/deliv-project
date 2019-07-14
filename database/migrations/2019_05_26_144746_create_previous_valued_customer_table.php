<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePreviousValuedCustomerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('previous_valued_customer', function(Blueprint $table)
		{
			$table->integer('Previous_Customer_Id')->primary();
			$table->string('Previous_Customer_FirstName', 45)->nullable();
			$table->string('Previous_Customer_LastName', 45)->nullable();
			$table->string('Previous_Customer_Phone', 45)->nullable();
			$table->string('Previous_Customer_Email', 45)->nullable();
			$table->dateTime('Delete_On')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('previous_valued_customer');
	}

}
