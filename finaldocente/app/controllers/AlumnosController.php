<?php
class AlumnosController extends BaseController{
	public function getIndex(){
		if(Request::ajax()){
			$matutino = Classroom::select('id',DB::raw('concat(grado, " " ,grupo) as aula'))->where('turno_id',1)->orderBy('grado')->orderBy('grupo')->get();

			$vespertino = Classroom::select('id',DB::raw('concat(grado, " " ,grupo) as aula'))->where('turno_id',2)->orderBy('grado')->orderBy('grupo')->get();
			return View::make('administrador.alumnos.index',array('matutino'=>$matutino,'vespertino'=>$vespertino));
		}else{
			return Redirect::to('administrador');
		}
		
	}

	public function getAlumnos(){
		if(Request::ajax()){
			$idaula = Input::get('aulaid');
			$alumnos = Classroom::find($idaula)->students;
			return View::make('administrador.alumnos.showalumnos',array('alumnos'=>$alumnos));
		}else{
			return Redirect::to('administrador');
		}
			}


	public function deleteAlumnos()
	{
		if(Request::ajax()){
			$alumno = Student::find(Input::get('idalumno'));
			if($alumno->delete()){
				return 'Alumno Eliminado Correctamente';
			}else{
				return 'Ocurrio un error, intenta de nuevo';
			}
		}else{
			return Redirect::to('administrador');
		}
	}
}