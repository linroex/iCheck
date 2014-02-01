<?php

use Illuminate\Database\Migrations\Migration;

class CreateEquipHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('equip_history',function($table){
			$table->increments('bid')->unique();	//Borrow ID
			$table->text('student_id');
			$table->text('equip_name');
			$table->timestamp('borrow_time');
			$table->timestamp('estimate_return_time');
			$table->timestamp('return_time');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('equip_history');
	}

}