<?php use LaravelBook\Ardent\Ardent;
class Classroom extends Ardent{

protected $table = 'aulas';

public function shift(){
	return $this->belongsTo('Shift');
}

public function lessons(){
return $this->hasMany('Lesson','aula_id');
}

public function students(){
	return $this->hasMany('Student','aula_id');
}




}