<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersAddressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_addresses', function(Blueprint $table)
		{
			$table->integer('Customer_id')->unsigned()->index('fk_Customers_has_Addresses_Customers_idx');
			$table->integer('Address_id')->unsigned()->index('fk_Customers_has_Addresses_Addresses1_idx');
			$table->integer('Address_Type_Code')->index('fk_Customers_Addresses_Address_Type1_idx');
			$table->timestamp('Date_From')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->primary(['Customer_id','Address_id','Address_Type_Code']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users_addresses');
	}

}
