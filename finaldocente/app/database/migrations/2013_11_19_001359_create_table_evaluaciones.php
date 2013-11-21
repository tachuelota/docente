<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEvaluaciones extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('evaluaciones', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('fecha_evaluacion');
			$table->integer('clase_id')->unsigned()->index();
			$table->integer('user_id')->unsigned()->index();
			$table->integer('pregunta_id')->unsigned()->index();
			$table->integer('respuesta_id')->unsigned()->index();
			$table->foreign('clase_id')->references('id')->on('clases')->onDelete('cascade');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('pregunta_id')->references('id')->on('preguntas')->onDelete('cascade');
			$table->foreign('respuesta_id')->references('id')->on('respuestas')->onDelete('cascade');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('evaluaciones',function(Blueprint $table){
		$table->dropForeign('evaluaciones_clase_id_foreign');
		$table->dropForeign('evaluaciones_user_id_foreign');
		$table->dropForeign('evaluaciones_pregunta_id_foreign');
		$table->dropForeign('evaluaciones_respuesta_id_foreign');
		});
		Schema::drop('evaluaciones');
	}

}
