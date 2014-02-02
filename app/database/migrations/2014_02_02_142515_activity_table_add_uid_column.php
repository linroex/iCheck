<?php

use Illuminate\Database\Migrations\Migration;

class ActivityTableAddUidColumn extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('activity',function($table){
			$table->integer('uid')->unsigned();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('activity',function($table){
			$table->dropColumn('uid');
		});
	}

}