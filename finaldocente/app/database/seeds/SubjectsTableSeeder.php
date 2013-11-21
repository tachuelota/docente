<?php

class SubjectsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
	 DB::table('materias')->delete();

		$subjects = array(
['materia'=>'ESPAÑOL I','created_at'=>new DateTime,'updated_at'=>new DateTime],
['materia'=>'INGLES I','created_at'=>new DateTime,'updated_at'=>new DateTime],
['materia'=>'MATEMATICAS I','created_at'=>new DateTime,'updated_at'=>new DateTime],
['materia'=>'CIENCIAS I (BIOLOGIA)','created_at'=>new DateTime,'updated_at'=>new DateTime],
['materia'=>'TECNOLOGIA I','created_at'=>new DateTime,'updated_at'=>new DateTime],
['materia'=>'GEOGRAFIA DE MEXICO Y DEL MUNDO','created_at'=>new DateTime,'updated_at'=>new DateTime],
['materia'=>'ASIGNATURA ESTATAL','created_at'=>new DateTime,'updated_at'=>new DateTime],
['materia'=>'EDUCACION FISICA I','created_at'=>new DateTime,'updated_at'=>new DateTime],
['materia'=>'ARTES I','created_at'=>new DateTime,'updated_at'=>new DateTime],
['materia'=>'ORIENTACION O TUTORIA','created_at'=>new DateTime,'updated_at'=>new DateTime],
['materia'=>'ESPAÑOL II','created_at'=>new DateTime,'updated_at'=>new DateTime],
['materia'=>'INGLES II','created_at'=>new DateTime,'updated_at'=>new DateTime],
['materia'=>'MATEMATICAS II','created_at'=>new DateTime,'updated_at'=>new DateTime],
['materia'=>'CIENCIAS II (FISICA)','created_at'=>new DateTime,'updated_at'=>new DateTime],
['materia'=>'TECNOLOGIA II','created_at'=>new DateTime,'updated_at'=>new DateTime],
['materia'=>'HISTORIA I','created_at'=>new DateTime,'updated_at'=>new DateTime],
['materia'=>'FORMACION CIVICA Y ETICA I','created_at'=>new DateTime,'updated_at'=>new DateTime],
['materia'=>'EDUCACION FISICA II','created_at'=>new DateTime,'updated_at'=>new DateTime],
['materia'=>'ARTES II','created_at'=>new DateTime,'updated_at'=>new DateTime],
['materia'=>'ESPAÑOL III','created_at'=>new DateTime,'updated_at'=>new DateTime],
['materia'=>'INGLES III','created_at'=>new DateTime,'updated_at'=>new DateTime],
['materia'=>'MATEMATICAS III','created_at'=>new DateTime,'updated_at'=>new DateTime],
['materia'=>'CIENCIAS III (QUIMICA)','created_at'=>new DateTime,'updated_at'=>new DateTime],
['materia'=>'TECNOLOGIA III','created_at'=>new DateTime,'updated_at'=>new DateTime],
['materia'=>'HISTORIA II','created_at'=>new DateTime,'updated_at'=>new DateTime],
['materia'=>'FORMACION CIVICA Y ETICA II','created_at'=>new DateTime,'updated_at'=>new DateTime],
['materia'=>'EDUCACION FISICA III','created_at'=>new DateTime,'updated_at'=>new DateTime],
['materia'=>'ARTES III','created_at'=>new DateTime,'updated_at'=>new DateTime]
		);

		// Uncomment the below to run the seeder
	 DB::table('materias')->insert($subjects);
	}

}
