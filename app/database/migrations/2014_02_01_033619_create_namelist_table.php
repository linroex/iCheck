<?php

use Illuminate\Database\Migrations\Migration;

class CreateNamelistTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('namelist',function($table){
			$table->increments('nid')->unique();
			$table->integer('uid');
			$table->text('namelist_name');
			$table->text('namelist_desc');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('namelist');
	}

}