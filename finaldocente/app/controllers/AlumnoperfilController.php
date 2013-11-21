<?php 
class AlumnoperfilController extends BaseController{
	public function getIndex(){
	if(Request::ajax()){
		$materias =  Lesson::join('estudiantes','clases.aula_id','=','estudiantes.aula_id')
->join('materias','materias.id','=','clases.materia_id')
->join('maestros','maestros.id','=','clases.maestro_id')
->select('materias.materia','maestros.nombre')
->where('estudiantes.user_id','=',Auth::user()->id)
->get();

$datos = Student::where('user_id',Auth::user()->id)->get();


$aulas = Student::join('aulas','aulas.id','=','estudiantes.aula_id')->
join('turnos','aulas.turno_id','=','turnos.id')->
where('estudiantes.user_id',Auth::user()->id)->
select('turnos.id','turnos.turno',DB::raw('aulas.id as aulaid'),DB::raw('concat(aulas.grado, " " ,aulas.grupo) as aula'))->get();

		return View::make('alumno.perfil.index',array('materias'=>$materias,'datos'=>$datos,'aulas'=>$aulas));
	}else{
		return Redirect::to('alumno');
	}
}




public function getAulas()
{
	if(Request::ajax()){
$aulas =  Classroom::select('id',DB::raw('concat(grado, " " ,grupo) as aula'))->where('turno_id',Input::get('idturno'))->orderBy('grado')->orderBy('grupo')->get();

	return View::make('alumno.perfil.armaaulas',array('aulas'=>$aulas));
	}else{
		return Redirect::to('alumno');
	}
	
}

public function completaPerfil(){
	if(Request::ajax()){
		$alumno = new Student;
		$alumno->user_id = Input::get('idusuario');
		$alumno->aula_id = Input::get('aula');
		$alumno->nombre = strtoupper(Input::get('nombre'));
		$alumno->curp = strtoupper(Input::get('curp'));
		$alumno->email = Input::get('correo');
		$alumno->telefono = Input::get('telefono');

		if($alumno->save()){
			return Response::json(array(
				'success'=>true
				));
		}else{
			return 'mal';
		}
	}else{
		return Redirect::to('alumno');
	}
}

public function getCompletaPerfil()
{
	$checaperfil = count(Student::where('user_id',Auth::user()->id)->get()); 
		if($checaperfil > 0){
			return Redirect::to('alumno');
		}else{
			
			return View::make('alumno.perfil.completaperfil');
		}
		
	
		
	
}

}