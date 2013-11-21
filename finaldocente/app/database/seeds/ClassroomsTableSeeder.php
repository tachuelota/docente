<?php

class ClassroomsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
	 DB::table('aulas')->delete();

		$classrooms = array(
			['turno_id'=>'1','grado'=>'primero','grupo'=>'A','created_at'=>new DateTime,'updated_at'=>new DateTime],
			['turno_id'=>'1','grado'=>'primero','grupo'=>'B','created_at'=>new DateTime,'updated_at'=>new DateTime],
			['turno_id'=>'1','grado'=>'primero','grupo'=>'C','created_at'=>new DateTime,'updated_at'=>new DateTime],
			['turno_id'=>'1','grado'=>'segundo','grupo'=>'A','created_at'=>new DateTime,'updated_at'=>new DateTime],
			['turno_id'=>'1','grado'=>'segundo','grupo'=>'B','created_at'=>new DateTime,'updated_at'=>new DateTime],
			['turno_id'=>'1','grado'=>'segundo','grupo'=>'C','created_at'=>new DateTime,'updated_at'=>new DateTime],
			['turno_id'=>'1','grado'=>'tercero','grupo'=>'A','created_at'=>new DateTime,'updated_at'=>new DateTime],
			['turno_id'=>'1','grado'=>'tercero','grupo'=>'B','created_at'=>new DateTime,'updated_at'=>new DateTime],
			['turno_id'=>'1','grado'=>'tercero','grupo'=>'C','created_at'=>new DateTime,'updated_at'=>new DateTime],
			['turno_id'=>'2','grado'=>'primero','grupo'=>'A','created_at'=>new DateTime,'updated_at'=>new DateTime],
			['turno_id'=>'2','grado'=>'primero','grupo'=>'B','created_at'=>new DateTime,'updated_at'=>new DateTime],
			['turno_id'=>'2','grado'=>'segundo','grupo'=>'A','created_at'=>new DateTime,'updated_at'=>new DateTime],
			['turno_id'=>'2','grado'=>'segundo','grupo'=>'B','created_at'=>new DateTime,'updated_at'=>new DateTime],
			['turno_id'=>'2','grado'=>'tercero','grupo'=>'A','created_at'=>new DateTime,'updated_at'=>new DateTime],
			['turno_id'=>'2','grado'=>'tercero','grupo'=>'B','created_at'=>new DateTime,'updated_at'=>new DateTime]
			
		);

		// Uncomment the below to run the seeder
		 DB::table('aulas')->insert($classrooms);
	}

}
