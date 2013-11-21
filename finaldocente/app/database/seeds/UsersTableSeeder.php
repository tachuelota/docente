<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		 DB::table('users')->delete();

		$users = array(
			['role_id'=>1,'username'=>'admin1','password'=>Hash::make('administrador'),'created_at'=>new DateTime , 'updated_at'=> new DateTime]
		);

		// Uncomment the below to run the seeder
		 DB::table('users')->insert($users);
	}

}
