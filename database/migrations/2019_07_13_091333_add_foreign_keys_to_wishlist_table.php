<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToWishlistTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('wishlist', function(Blueprint $table)
		{
			$table->foreign('product_id', 'fk_wish_product_prodcut')->references('Product_Id')->on('products')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id', 'fk_wish_user_user')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('wishlist', function(Blueprint $table)
		{
			$table->dropForeign('fk_wish_product_prodcut');
			$table->dropForeign('fk_wish_user_user');
		});
	}

}
