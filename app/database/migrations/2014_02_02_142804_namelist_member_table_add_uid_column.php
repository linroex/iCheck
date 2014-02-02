<?php

use Illuminate\Database\Migrations\Migration;

class NamelistMemberTableAddUidColumn extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('namelist_member',function($table){
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
		Schema::table('namelist_member',function($table){
			$table->dropColumn('uid');
		});
	}
}