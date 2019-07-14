<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUsersAddressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users_addresses', function(Blueprint $table)
		{
			$table->foreign('Address_id', 'fk_address_id_to_user_address')->references('Address_id')->on('addresses')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('Address_Type_Code', 'fk_user_address_to_address_type')->references('Address_Type_Code')->on('address_type')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users_addresses', function(Blueprint $table)
		{
			$table->dropForeign('fk_address_id_to_user_address');
			$table->dropForeign('fk_user_address_to_address_type');
		});
	}

}
