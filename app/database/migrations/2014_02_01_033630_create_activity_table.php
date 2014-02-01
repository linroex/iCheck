<?php

use Illuminate\Database\Migrations\Migration;

class CreateActivityTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('activity', function($table){
			$table->increments('aid')->unique();
			$table->text('activity_name');
			$table->text('activity_desc');
			$table->timestamp('activity_date');
			$table->text('activity_type');
			$table->integer('nid');
			$table->text('activity_organize');
			$table->text('activity_note');
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
		Schema::drop('activity');
	}

}