<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSuppliersContractTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('suppliers_contract', function(Blueprint $table)
		{
			$table->integer('Suppliers_id');
			$table->integer('Contract_Type_ID')->index('fk_Suppliers_Contract_Contract_Type1_idx');
			$table->string('Contract_Details', 100);
			$table->date('Date_Contract_Signed');
			$table->smallInteger('Number_Of_Months');
			$table->date('Date_Contract_Expires')->nullable();
			$table->primary(['Suppliers_id','Contract_Type_ID']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('suppliers_contract');
	}

}
