<?php

use Illuminate\Database\Migrations\Migration;

class ActivityCheckTableAddUidColumn extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('activity_check',function($table){
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
		Schema::table('activity_check',function($table){
			$table->dropColumn('uid');
		});
	}

}