<?php use LaravelBook\Ardent\Ardent;
class Student extends Ardent{

protected $table = 'estudiantes';

public function user(){
	return $this->belongsTo('User');
}

public function classrooms(){
return $this->belongsTo('Classroom');
}


}