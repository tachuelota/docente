<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassroomsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('aulas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('turno_id')->unsigned()->index();
			$table->string('grado','10');
			$table->string('grupo','1');
			$table->timestamps();
			$table->foreign('turno_id')->references('id')->on('turnos')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
		Schema::drop('aulas');
	}

}
