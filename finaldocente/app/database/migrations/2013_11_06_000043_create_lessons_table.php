<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clases', function(Blueprint $table)
		{
		$table->increments('id');
			$table->integer('aula_id')->index()->unsigned();
			$table->integer('materia_id')->index()->unsigned();
			$table->integer('maestro_id')->index()->unsigned();
			$table->foreign('aula_id')->references('id')->on('aulas')->onDelete('cascade');
			$table->foreign('materia_id')->references('id')->on('materias')->onDelete('cascade');
			$table->foreign('maestro_id')->references('id')->on('maestros')->onDelete('cascade');
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
		Schema::table('clases',function(Blueprint $table){
			$table->dropForeign('clases_aula_id_foreign');
			$table->dropForeign('clases_materia_id_foreign');
			$tabel->dropForeign('clases_maestro_id_foreign');
		});
		Schema::drop('clases');
	}

}
