<?php

use Illuminate\Database\Migrations\Migration;

class EquipHistoryTableAddColumn extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('equip_history',function($table){
			$table->text('type');
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
			$table->dropColumn('type');
		});
	}

}