<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->integer('Product_Id')->unique('Product_id_UNIQUE');
			$table->integer('Suppliers_Id')->index('fk_Product_Suppliers1_idx');
			$table->integer('Category_Id')->index('fk_Product_Categories1_idx');
			$table->string('Product_Name', 45);
			$table->decimal('Product_Unit_Price');
			$table->integer('Product_Unit_InStock');
			$table->enum('Product_Availability_Status', array('Y','N'))->nullable();
			$table->integer('Sold_Per_Week')->default(0);
			$table->boolean('IsNew')->default(1);
			$table->enum('rating', array('1','2','3','4','5'))->default('1');
			$table->primary(['Product_Id','Suppliers_Id','Category_Id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}
