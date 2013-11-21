<?php use LaravelBook\Ardent\Ardent;
class Role extends Ardent{

protected $table = 'roles';

public function users(){
	return $this->hasMany('User');
}

}