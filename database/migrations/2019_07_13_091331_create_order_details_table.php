<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_details', function(Blueprint $table)
		{
			$table->integer('Order_Id')->index('fk_Orders_has_Products_Orders1_idx');
			$table->integer('Product_Id')->index('fk_Orders_has_Products_Products1_idx');
			$table->integer('Order_Quantity');
			$table->decimal('Order_Price')->nullable();
			$table->decimal('Order_Total')->nullable();
			$table->primary(['Order_Id','Product_Id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_details');
	}

}
