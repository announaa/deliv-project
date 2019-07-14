<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAddressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('addresses', function(Blueprint $table)
		{
			$table->integer('Address_id')->unsigned()->unique('Address_id_UNIQUE');
			$table->string('Address_Line1', 60);
			$table->string('Address_Line2', 60)->nullable();
			$table->string('Address_City', 15);
			$table->string('Address_State', 15);
			$table->string('Address_PostalCode', 10);
			$table->string('Address_Country', 15);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('addresses');
	}

}
