<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderDeliveryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_delivery', function(Blueprint $table)
		{
			$table->integer('Order_Id')->index('fk_Order_Delivery_Order_Details1_idx');
			$table->dateTime('Order_Date');
			$table->integer('Delivery_Status_id')->index('fk_Order_Delivery_Delivery_Status1_idx');
			$table->primary(['Order_Id','Order_Date']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_delivery');
	}

}
