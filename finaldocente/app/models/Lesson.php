<?php use LaravelBook\Ardent\Ardent;

class Lesson extends Ardent{
	protected $table = 'clases';


	public function classroom(){
		return $this->belongsTo('Classroom');
	}

	public function subject(){
		return $this->belongsTo('Subject');
	}

	public function teacher(){
		return $this->belongsTo('Teacher');
	}
}

