<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->integer('Order_Id')->unique('Order_id_UNIQUE');
			$table->integer('Customer_Id')->index('fk_Orders_Customers1_idx');
			$table->integer('Payment_Method_Id')->index('fk_Orders_Payment_Method1_idx');
			$table->dateTime('Order_Date');
			$table->dateTime('Shipping_Date');
			$table->string('Ship_Name', 45);
			$table->string('Ship_Address', 60);
			$table->string('Ship_City', 15);
			$table->string('Ship_State', 15);
			$table->string('Ship_Postal_Code', 10);
			$table->string('Ship_Country', 15);
			$table->boolean('Order_Confirmed')->default(0);
			$table->primary(['Order_Id','Customer_Id','Payment_Method_Id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orders');
	}

}
