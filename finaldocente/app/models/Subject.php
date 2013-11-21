<?php use LaravelBook\Ardent\Ardent;

class Subject extends Ardent{

protected $table = 'materias';
	
protected $softDelete = true;

public static $rules = array(
	'materia'=>'required|unique:materias|max:60'
	);
public static $customMessages = array(
	'required'=>'este campo es requerido',
	'unique'=>'esta materia ya existe',
	'max'=>'maximo 60 caracteres'
	);


public function lessons(){
	return $this->hasMany('Lesson','materia_id');
}



}