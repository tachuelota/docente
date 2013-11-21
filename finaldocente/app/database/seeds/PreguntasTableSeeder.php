<?php

class PreguntasTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		 DB::table('preguntas')->delete();

		$preguntas = array(
			['pregunta'=>'Explica de manera clara los contenidos de la asignatura','created_at'=>new DateTime,'updated_at'=>new DateTime],
			['pregunta'=>'Relaciona los contenidos de la asignatura con los contenidos de otras','created_at'=>new DateTime,'updated_at'=>new DateTime],
			['pregunta'=>'Resuelve las dudas relacionadas con los contenidos de la asignatura','created_at'=>new DateTime,'updated_at'=>new DateTime],
			['pregunta'=>'Propone ejemplos o ejercicios que vinculan la asignatura con la practica profecional','created_at'=>new DateTime,'updated_at'=>new DateTime],
			['pregunta'=>'Durante el curso establece las estrategias adecuadas necesarias para lograr el aprendizaje deseado','created_at'=>new DateTime,'updated_at'=>new DateTime],
			['pregunta'=>'Organiza actividades que me permiten ejercitar mi exprecion oral y escrita','created_at'=>new DateTime,'updated_at'=>new DateTime],
			['pregunta'=>'Promueve actividades que me permitan colaborar con mis compañeros','created_at'=>new DateTime,'updated_at'=>new DateTime],
			['pregunta'=>'Hace interesante la asignatura','created_at'=>new DateTime,'updated_at'=>new DateTime],
			['pregunta'=>'Asiste a clases regular y puntualmente','created_at'=>new DateTime,'updated_at'=>new DateTime],
			['pregunta'=>'Es accesible y esta dispuesto a brindarte ayuda académica','created_at'=>new DateTime,'updated_at'=>new DateTime],
			['pregunta'=>'Considera los resultados de los examenes para realizar mejoras en el aprendizaje ','created_at'=>new DateTime,'updated_at'=>new DateTime],
			['pregunta'=>'Da a conocer las calificaciones en el plazo establecido','created_at'=>new DateTime,'updated_at'=>new DateTime],
			['pregunta'=>'En general, pienso que es un buen docente','created_at'=>new DateTime,'updated_at'=>new DateTime],
			['pregunta'=>'Estoy satisfecho/a por mi nivel de desempeño logrado gracias a la labor del docente','created_at'=>new DateTime,'updated_at'=>new DateTime],
			['pregunta'=>'Yo recomendaria a este docente','created_at'=>new DateTime,'updated_at'=>new DateTime],
		);

		// Uncomment the below to run the seeder
		 DB::table('preguntas')->insert($preguntas);
	}

}
