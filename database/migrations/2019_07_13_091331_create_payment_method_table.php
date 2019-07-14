<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentMethodTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payment_method', function(Blueprint $table)
		{
			$table->integer('Payment_Method_Id')->primary();
			$table->integer('Customer_Id')->unsigned()->index('fk_Payment_Method_Customers1_idx');
			$table->integer('Payment_Method_Type_ID')->index('fk_Payment_Method_Payment_Method_Type1_idx');
			$table->string('Card_Number', 16)->nullable();
			$table->date('Valid_From_Year')->nullable();
			$table->date('Valid_Till_Year')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('payment_method');
	}

}
