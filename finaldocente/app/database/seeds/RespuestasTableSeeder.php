<?php

class RespuestasTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		 DB::table('respuestas')->delete();

		$respuestas = array(
			['respuesta'=>'Totalmente de acuerdo','created_at'=>new DateTime,'updated_at'=>new DateTime],
			['respuesta'=>'De acuerdo','created_at'=>new DateTime,'updated_at'=>new DateTime],
			['respuesta'=>'En desacuerdo','created_at'=>new DateTime,'updated_at'=>new DateTime],
		);

		// Uncomment the below to run the seeder
		 DB::table('respuestas')->insert($respuestas);
	}

}
