<?php

use Illuminate\Database\Migrations\Migration;

class CreateLoginHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('login_history', function($table){
			$table->integer('uid')->unsigned();
			$table->text('login_ip');
			$table->text('login_os');
			$table->timestamp('login_time');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('login_history');
	}

}