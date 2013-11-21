<?php use LaravelBook\Ardent\Ardent;
class Shift extends Ardent{
	protected $table = 'turnos';

	public function classrooms(){
		return $this->hasMany('Classroom','turno_id');
	}
}