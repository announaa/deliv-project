<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSuppliersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('suppliers', function(Blueprint $table)
		{
			$table->integer('Suppliers_id')->unique('Suppliers_id_UNIQUE');
			$table->string('Company_Name', 45);
			$table->string('Contact_Name', 45);
			$table->string('img', 100)->nullable()->default('\shopaavatar.jpg');
			$table->string('Address', 60);
			$table->string('City', 15);
			$table->string('State', 15);
			$table->string('Postal_Code', 10);
			$table->string('Country', 15);
			$table->string('Supplier_Phone', 12);
			$table->string('Supplier_Fax', 12)->nullable();
			$table->string('Supplier_EMail', 45);
			$table->boolean('adv')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('suppliers');
	}

}
