<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		
		$this->call('RolesTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('ShiftsTableSeeder');
		$this->call('ClassroomsTableSeeder');
		$this->call('SubjectsTableSeeder');
		$this->call('TeachersTableSeeder');
		$this->call('PreguntasTableSeeder');
		$this->call('RespuestasTableSeeder');
	}

}