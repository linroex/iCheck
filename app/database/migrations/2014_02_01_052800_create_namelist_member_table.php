<?php

use Illuminate\Database\Migrations\Migration;

class CreateNamelistMemberTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('namelist_member', function($table){
			$table->increments('nmid')->unique();	//namelist_member_id
			$table->integer('nid');
			$table->text('name');
			$table->text('student_id');
			$table->text('department')->nullable();
			$table->text('job')->nullable();
			$table->text('phone')->nullable();
			$table->text('email')->nullable();
			
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('namelist_member');
	}

}