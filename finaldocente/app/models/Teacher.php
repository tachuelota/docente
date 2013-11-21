<?php use LaravelBook\Ardent\Ardent;
class Teacher extends Ardent{
	protected $table = 'maestros';
	protected $softDelete = true;

	public static $rules = array(
		'nombre'=>'required'
		);
	public static $customMessages = array(
		'required'=>'este campo es requerido'
		);

	public function lessons(){
		return $this->hasMany('Lesson','maestro_id');
	}
}