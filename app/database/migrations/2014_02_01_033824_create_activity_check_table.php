<?php

use Illuminate\Database\Migrations\Migration;

class CreateActivityCheckTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('activity_check',function($table){
			$table->increments('cid')->unique();	
			$table->integer('aid');
			$table->text('name');
			$table->text('student_id');
			$table->timestamp('check_time');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('activity_check');
	}

}