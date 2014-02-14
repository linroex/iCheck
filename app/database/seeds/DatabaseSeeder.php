<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		User::addUser(array(
			'username'=>'admin',
			'password'=>'123456789',
			'password_confirmation'=>'123456789',
			'name'=>'管理員',
			'email'=>'admin@email.com',
			'department'=>'預設',
			'type'=>'admin'
		));
		$this->command->info('User Added');
	}

}