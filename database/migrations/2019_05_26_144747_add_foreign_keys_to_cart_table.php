<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCartTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cart', function(Blueprint $table)
		{
			$table->foreign('Product_Id', 'fk_product_id_to_products_id')->references('Product_Id')->on('products')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('User_Id', 'fk_user_id_to_users_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cart', function(Blueprint $table)
		{
			$table->dropForeign('fk_product_id_to_products_id');
			$table->dropForeign('fk_user_id_to_users_id');
		});
	}

}
