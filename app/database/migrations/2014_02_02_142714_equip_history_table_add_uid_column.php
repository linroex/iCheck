<?php

use Illuminate\Database\Migrations\Migration;

class EquipHistoryTableAddUidColumn extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('equip_history',function($table){
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
		Schema::table('equip_history',function($table){
			$table->dropColumn('uid');
		});
	}

}