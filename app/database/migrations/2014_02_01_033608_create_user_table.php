<?php

use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user',function($table){
			$table->increments('uid')->unique();
			$table->text('username');
			$table->text('password');
			$table->text('student_id')->nullable();
			$table->text('name');
			$table->text('email');
			$table->text('school_email')->nullable();
			$table->text('department');
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
		Schema::drop('user');
	}

}