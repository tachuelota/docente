<?php

class RolesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		 DB::table('roles')->delete();

		$roles = array(
			['rol'=>'administrador','created_at'=> new DateTime,'updated_at'=>new DateTime],
			['rol'=>'alumno','created_at'=>new DateTime,'updated_at'=>new DateTime]
		);

		// Uncomment the below to run the seeder
		DB::table('roles')->insert($roles);
	}

}
