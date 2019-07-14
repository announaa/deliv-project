<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeletedProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('deleted_product', function(Blueprint $table)
		{
			$table->integer('Product_Id')->primary();
			$table->string('Product_Name', 45);
			$table->dateTime('Delete_Date')->nullable();
			$table->string('Delete_By', 45)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('deleted_product');
	}

}
