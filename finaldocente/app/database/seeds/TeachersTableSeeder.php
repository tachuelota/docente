maestros<?php

class TeachersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		 DB::table('maestros')->delete();

		$teachers = array(
		['nombre'=>'ARTEMIO GARCIA VICTORIA','created_at'=>new DateTime,'updated_at'=>new DateTime],
		['nombre'=>'EFREN CASAS D.','created_at'=>new DateTime,'updated_at'=>new DateTime],
		['nombre'=>'LUIS GERMAN VILCHIS CORTES','created_at'=>new DateTime,'updated_at'=>new DateTime],
		['nombre'=>'ESTHER GUADARRAMA TAVIRA','created_at'=>new DateTime,'updated_at'=>new DateTime],
		['nombre'=>'MARIA DE LOURDES TEODORO F.','created_at'=>new DateTime,'updated_at'=>new DateTime],
		['nombre'=>'SALVADOR GARCIA GARCIA','created_at'=>new DateTime,'updated_at'=>new DateTime],
		['nombre'=>'TITO MANUEL GARCIA MARTINEZ','created_at'=>new DateTime,'updated_at'=>new DateTime],
		['nombre'=>'MARIA CONCEPCION SANCHEZ','created_at'=>new DateTime,'updated_at'=>new DateTime],
		['nombre'=>'MARIA DE JESUS JARAMILLO','created_at'=>new DateTime,'updated_at'=>new DateTime],
		['nombre'=>'JOSE PLIEGO VILCHIS','created_at'=>new DateTime,'updated_at'=>new DateTime],
		['nombre'=>'ROBERTO GARCIA VALDEZ','created_at'=>new DateTime,'updated_at'=>new DateTime],
		['nombre'=>'FRANCISCA CANO BERNAL','created_at'=>new DateTime,'updated_at'=>new DateTime],
		['nombre'=>'VERONICA GOMEZ RODRIGUEZ','created_at'=>new DateTime,'updated_at'=>new DateTime],
		['nombre'=>'ESMERALDA GARDUÑO ROBLES','created_at'=>new DateTime,'updated_at'=>new DateTime],
		['nombre'=>'FERNANDO LORETO LUIS','created_at'=>new DateTime,'updated_at'=>new DateTime],
		['nombre'=>'JUAN ANGEL DIAZ SALAZAR','created_at'=>new DateTime,'updated_at'=>new DateTime],
		['nombre'=>'ADELA GUADARRAMA MORALES','created_at'=>new DateTime,'updated_at'=>new DateTime],
		['nombre'=>'DELIA MARIA BALBUENA','created_at'=>new DateTime,'updated_at'=>new DateTime]
		);

		// Uncomment the below to run the seeder
	DB::table('maestros')->insert($teachers);
	}

}
