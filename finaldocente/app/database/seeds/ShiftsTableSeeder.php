<?php

class ShiftsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('turnos')->delete();

		$shifts = array(
			['turno'=>'matutino','created_at'=> new Datetime,'updated_at'=>new DateTime],
			['turno'=>'vespertino','created_at'=>new Datetime,'updated_at'=>new DateTime]
		);

		// Uncomment the below to run the seeder
	 DB::table('turnos')->insert($shifts);
	}

}
